<?php
require_once './Db.php';

class HomePageController extends Db
{

    public function saveData()
    {

        $name = $_POST['name'];
        $profession = $_POST['profession'];
        $detail = $_POST['detail'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        $linkedin = $_POST['linkedin'];
        $twitter = $_POST['twitter'];
        $youtube = $_POST['youtube'];
        $git = $_POST['git'];
        $status = isset($_POST['status']) ? 'active' : 'inactive';

        $data = ['name' => $name, 'profession' => $profession, 'detail' => $detail, 'status' => $status];

        $data['contact'] = isset($contact) && !empty($contact) ? $contact : null;
        $data['email'] = isset($email) && !empty($email) ? $email : null;
        $data['facebook'] = isset($facebook) && !empty($facebook) ? $facebook : null;
        $data['instagram'] = isset($instagram) && !empty($instagram) ? $instagram : null;
        $data['linkedin'] = isset($linkedin) && !empty($linkedin) ? $linkedin : null;
        $data['twitter'] = isset($twitter) && !empty($twitter) ? $twitter : null;
        $data['youtube'] = isset($youtube) && !empty($youtube) ? $youtube : null;
        $data['git'] = isset($git) && !empty($git) ? $git : null;

        if (isset($_FILES['image'])) {
            $image = $this->uploadImage();
            $data['image'] = $image;
        }


        $result = $this->create('home_page', $data);
        if ($result) {
            if ($result->status == 'active') {
                $q = "UPDATE home_page SET status = :status WHERE id <> :id";
                $this->query($q, ['status' => 'inactive', 'id' => $result->id]);
            }
        }
        return $result;
    }


    public function updateData()
    {
        $name = $_POST['name'];
        $profession = $_POST['profession'];
        $detail = $_POST['detail'];

        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $facebook = $_POST['facebook'];
        $instagram = $_POST['instagram'];
        $linkedin = $_POST['linkedin'];
        $twitter = $_POST['twitter'];
        $youtube = $_POST['youtube'];
        $git = $_POST['git'];
        $id = $_POST['id'];
        $status = isset($_POST['status']) ? 'active' : 'inactive';


        $sql = 'UPDATE home_page SET name = :name, profession = :profession, detail = :detail, status = :status';

        $udata = ['name' => $name, 'profession' => $profession, 'detail' => $detail, 'status' => $status];

        if (isset($contact) && !empty($contact)) {
            $sql .= ", contact = :contact";
            $udata['contact'] = $contact;
        } else {
            $sql .= ", contact = :contact";
            $udata['contact'] = NULL;
        }

        if (isset($email) && !empty($email)) {
            $sql .= ", email = :email";
            $udata['email'] = $email;
        } else {
            $sql .= ", email = :email";
            $udata['email'] = NULL;
        }

        if (isset($facebook) && !empty($facebook)) {
            $sql .= ", facebook = :facebook";
            $udata['facebook'] = $facebook;
        } else {
            $sql .= ", facebook = :facebook";
            $udata['facebook'] = NULL;
        }

        if (isset($instagram) && !empty($instagram)) {
            $sql .= ", instagram = :instagram";
            $udata['instagram'] = $instagram;
        } else {
            $sql .= ", instagram = :instagram";
            $udata['instagram'] = NULL;
        }

        if (isset($linkedin) && !empty($linkedin)) {
            $sql .= ", linkedin = :linkedin";
            $udata['linkedin'] = $linkedin;
        } else {
            $sql .= ", linkedin = :linkedin";
            $udata['linkedin'] = NULL;
        }

        if (isset($twitter) && !empty($twitter)) {
            $sql .= ", twitter = :twitter";
            $udata['twitter'] = $twitter;
        } else {
            $sql .= ", twitter = :twitter";
            $udata['twitter'] = NULL;
        }

        if (isset($youtube) && !empty($youtube)) {
            $sql .= ", youtube = :youtube";
            $udata['youtube'] = $youtube;
        } else {
            $sql .= ", youtube = :youtube";
            $udata['youtube'] = NULL;
        }

        if (isset($git) && !empty($git)) {
            $sql .= ", git = :git";
            $udata['git'] = $git;
        } else {
            $sql .= ", git = :git";
            $udata['git'] = NULL;
        }

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $image = $this->uploadImage();
            $sql .= ", image = :image";
            $udata['image'] = $image;
        }

        $sql .= '  WHERE id = :id';
        $udata['id'] = $id;

        $updated = $this->query($sql, $udata);

        if ($status == 'active') {
            $q = "UPDATE home_page SET status = :status WHERE id <> :id";
            $this->query($q, ['status' => 'inactive', 'id' => $id]);
        }


        if ($updated == true) {
            header('location: dashboard.php');
        }
    }

    private function uploadImage()
    {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        //   $extensions= array("jpeg","jpg","png");
        // mkdir('../images/');
        $new_name = time() . '.' . $file_ext;
        if (move_uploaded_file($file_tmp, "./../images/" . $new_name)) {
            return $new_name;
        } else {
            return 'error';
        }
    }
}
