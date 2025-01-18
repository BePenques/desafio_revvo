<?php

require_once('./php/db/connection.php');

class Course extends Connection
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
        $this->table = 'course';
    }

 
    public function getAll()
    {
        $query = "SELECT * FROM " . $this->table . " ORDER BY created_at DESC";

        $resultQuery = $this->connection->query($query);

        return $resultQuery;
    }

}

?>
