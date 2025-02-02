<?php

require_once __DIR__ . '/../../admin/models/Slide.php';

class SlideController
{
    private $slideModel;

    public function __construct()
    {
        $this->slideModel = new Slide();
    }

    public function getAll()
    {
        $slides = $this->slideModel->getAll();

        return  $slides->fetchAll(PDO::FETCH_ASSOC);
        
    }
    public function create($data)
    {
        $result = $this->slideModel->create($data);
    
        return  $result;
    }
    public function findById($id)
    {
        $course = $this->slideModel->findById($id);

        return  $course->fetchAll();
        
    }

    public function update($data)
    {
        $result = $this->slideModel->update($data);

    
        return  $result;
    }

    public function delete($id)
    {
        $result = $this->slideModel->delete($id);

    
        return  $result;
    }


}

?>
