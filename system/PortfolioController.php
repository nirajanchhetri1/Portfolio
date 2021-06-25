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


        $data = ['project_title' => $project_title, 'project_name' => $project_name, 'client' => $client, 'duration' => $duration, 'budget' => $budget, 'technology' => $technology];

        if (isset($_FILES['image']) && !empty($_FILES['image']['name'])) {
            $image = $this->uploadImage();
            $data['image'] = $image;
        }
        return  $this->create('portfolio', $data);
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
