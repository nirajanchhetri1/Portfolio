<?php

require_once 'Db.php';

class AboutController extends Db
{
    public function saveData()
    {

        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birthdate = $_POST['birthdate'];
        $nationality = $_POST['nationality'];
        $experience = $_POST['experience'];
        $address = $_POST['address'];
        $languages = $_POST['languages'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $frelance = isset($_POST['frelance']) ? $_POST['frelance'] : 0;

        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birthdate' => $birthdate,
            'nationality' => $nationality,
            'experience' => $experience,
            'address' => $address,
            'languages' => $languages,
            'phone' => $phone,
            'email' => $email,
            'frelance' => $frelance
        ];

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $image = $this->uploadImage();
            $data['image'] = $image;
        }
        return $this->create('about', $data);
    }

    public function updateData()
    {
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $birthdate = $_POST['birthdate'];
        $nationality = $_POST['nationality'];
        $experience = $_POST['experience'];
        $address = $_POST['address'];
        $languages = $_POST['languages'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $frelance = isset($_POST['frelance']) ? $_POST['frelance'] : 0;
        $id = $_POST['id'];

        $data = [
            'first_name' => $first_name,
            'last_name' => $last_name,
            'birthdate' => $birthdate,
            'nationality' => $nationality,
            'experience' => $experience,
            'address' => $address,
            'languages' => $languages,
            'phone' => $phone,
            'email' => $email,
            'frelance' => $frelance,
            'id' => $id
        ];

        $sql = 'UPDATE about SET first_name = :first_name, last_name = :last_name, birthdate = :birthdate, nationality = :nationality, experience = :experience, address = :address, languages = :languages, phone = :phone, email = :email, frelance = :frelance';

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $image = $this->uploadImage();

            $about = $this->getWhereData('about', ['id' => $id], ['image'], true);
            if ($image != 'error' && $about) {
                $old_img = $about->image;
                $path = '../images/about/';
                if (file_exists($path . $old_img)) {
                    @unlink($path . $old_img);
                }
            }
            if ($image != 'error') {
                $sql .= ", image = :image";
                if ($image !== 'error')
                    $data['image'] = $image;
            }
        }

        $sql .= ' WHERE id = :id';

        $updated = $this->query($sql, $data);
        if ($updated == true) {
            header('location: about.php');
        }
    }

    private function uploadImage()
    {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        //   $extensions= array("jpeg","jpg","png");
        $directory = mkdir('../images/about/');
        $new_name = time() . '.' . $file_ext;
        if (move_uploaded_file($file_tmp, "./../images/about/" . $new_name)) {
            return $new_name;
        } else {
            return 'error';
        }
    }
}
