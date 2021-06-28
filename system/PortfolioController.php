<?php

require_once 'Db.php';

class PortfolioController extends Db
{


    public function all()
    {
        return $this->getData('portfolio');
    }


    public function saveData()
    {
        $project_title = $_POST['project_title'];
        $project_name = $_POST['project_name'];
        $client = $_POST['client'];
        $duration = $_POST['duration'];
        $budget = $_POST['budget'];
        $technology = $_POST['technology'];
        $preview = $_POST['preview'];


        $data = ['project_title' => $project_title, 'project_name' => $project_name, 'client' => $client, 'duration' => $duration, 'budget' => $budget, 'technology' => $technology, 'preview' => $preview];

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $image = $this->uploadImage();
            $data['image'] = $image;
        }
        return  $this->create('portfolio', $data);
    }

    public function updateData()
    {
        $project_title = $_POST['project_title'];
        $project_name = $_POST['project_name'];
        $client = $_POST['client'];
        $duration = $_POST['duration'];
        $budget = $_POST['budget'];
        $technology = $_POST['technology'];
        $preview = $_POST['preview'];
        $id = $_POST['id'];


        $data = ['project_title' => $project_title, 'project_name' => $project_name, 'client' => $client, 'duration' => $duration, 'budget' => $budget, 'technology' => $technology, 'preview' => $preview, 'id' => $id];

        $sql = 'UPDATE portfolio SET project_title = :project_title, project_name = :project_name, client = :client, duration = :duration, budget = :budget, technology = :technology, preview = :preview';

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $image = $this->uploadImage();
            $portfolio = $this->getWhereData('portfolio', ['id' => $id], ['image'], true);
            if ($image != 'error' && $portfolio) {
                $old_img = $portfolio->image;
                $path = '../images/portfolio/';
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
            header('location: portfolio.php');
        }
    }

    public function deleteData($id)
    {
        $portfolio = $this->getWhereData('portfolio', ['id' => $id], ['image'], true);


        $sql = 'DELETE FROM portfolio  WHERE id = :id';
        $data['id'] = $id;
        $updated = $this->query($sql, $data);

        if ($updated == true) {
            if ($portfolio) {
                $old_img = $portfolio->image;
                $path = '../images/portfolio/';
                if (file_exists($path . $old_img)) {
                    @unlink($path . $old_img);
                }
            }
            header('location: portfolio.php');
        }
    }

    private function uploadImage()
    {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

        //   $extensions= array("jpeg","jpg","png");
        $directory = mkdir('../images/portfolio/');
        $new_name = time() . '.' . $file_ext;
        if (move_uploaded_file($file_tmp, "./../images/portfolio/" . $new_name)) {
            return $new_name;
        } else {
            return 'error';
        }
    }
}
