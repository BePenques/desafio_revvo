<?php

require_once __DIR__ . '/../../admin/models/Course.php';

class CourseController
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

    public function create($data)
    {
        $result = $this->courseModel->create($data);

    
        return  $result;
    }

    public function update($data)
    {
        $result = $this->courseModel->update($data);

    
        return  $result;
    }

    public function delete($id)
    {
        $result = $this->courseModel->delete($id);

    
        return  $result;
    }

    public function findById($id)
    {
        $course = $this->courseModel->findById($id);

        return  $course->fetchAll();
        
    }

}

?>
