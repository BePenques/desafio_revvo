<?php

require_once './admin/models/Course.php';

class courseController
{
    private $courseModel;

    public function __construct()
    {
        $this->courseModel = new Course();
    }

    public function getAll()
    {
        $courses = $this->courseModel->getAll();

        return  $courses->fetchAll(PDO::FETCH_ASSOC);
        
    }

}

?>
