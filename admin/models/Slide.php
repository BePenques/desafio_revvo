<?php


require_once __DIR__ . '/../../php/db/connection.php';


class Slide extends Connection
{
   
    private $table;

    public $id;
    public $title;
    public $description;
    public $image;
    public $created_at;
    public $updated_at;

    public function __construct()
    {
        parent::__construct();
        $this->table = 'slideshow';
    }

 
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";

        $resultQuery = $this->connection->query($query);

        return $resultQuery;
    }


}
