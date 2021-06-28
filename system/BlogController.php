<?php

require_once 'Db.php';

class BlogController extends Db
{

    public function saveData()
    {
        $title = $_POST['title'];
        $description = $_POST['description'];

        $data = ['title' => $title, 'description' => $description, 'created_at' => date('Y-m-d')];

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $image = $this->uploadImage();
            $data['image'] = $image;
        }
        return  $this->create('blogs', $data);
    }


    public function updateData()
    {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $id = $_POST['id'];

        $data = ['title' => $title, 'description' => $description, 'id' => $id];

        $sql = 'UPDATE blogs SET title = :title, description = :description';

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $image = $this->uploadImage();
            $blog = $this->getWhereData('blogs', ['id' => $id], ['image'], true);
            if ($image != 'error' && $blog) {
                $old_img = $blog->image;
                $path = '../images/blogs/';
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
            header('location: blog.php');
        }
    }

    public function deleteData($id)
    {
        $portfolio = $this->getWhereData('blogs', ['id' => $id], ['image'], true);


        $sql = 'DELETE FROM blogs  WHERE id = :id';
        $data['id'] = $id;
        $updated = $this->query($sql, $data);

        if ($updated == true) {
            if ($portfolio) {
                $old_img = $portfolio->image;
                $path = '../images/blogs/';
                if (file_exists($path . $old_img)) {
                    @unlink($path . $old_img);
                }
            }
            header('location: blog.php');
        }
    }
    private function uploadImage()
    {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        //   $extensions= array("jpeg","jpg","png");
        $directory = mkdir('../images/blogs/');
        $new_name = time() . '.' . $file_ext;
        if (move_uploaded_file($file_tmp, "./../images/blogs/" . $new_name)) {
            return $new_name;
        } else {
            return 'error';
        }
    }
}
