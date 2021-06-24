<?php

require_once 'Db.php';

class PageController extends Db
{

    public function saveData()
    {

        $page = $_POST['page'];

        $description = $_POST['description'];
        $extra_description = $_POST['extra_description'];

        $data = ['page' => $page, 'description' => $description];

        if (isset($extra_description) && !empty($extra_description))
            $data['extra_description'] = $extra_description;

        return  $this->create('page_detail', $data);
    }

    public function updateData()
    {
        $page = $_POST['page'];

        $description = $_POST['description'];
        $id = $_POST['id'];
        $extra_description = $_POST['extra_description'];

        $data = ['page' => $page, 'description' => $description, 'id' => $id];


        $sql = 'UPDATE page_detail SET page = :page, description = :description';

        if (isset($extra_description) && !empty($extra_description)) {
            $sql .= ", extra_description = :extra_description";
            $data['extra_description'] = $extra_description;
        }

        $sql .= " WHERE id=:id";

        $updated = $this->query($sql, $data);

        return $updated;
    }
}
