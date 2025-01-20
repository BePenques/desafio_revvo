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


}

?>
