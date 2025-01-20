<?php


require_once __DIR__ . '/../../php/db/connection.php';


class Slide extends Connection
{
   
    private $table;

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

    public function create($data) 
    {
        $sqlInsert = "INSERT INTO " . $this->table . " (title, description, image, button_link, created_at) VALUES (:title, :description, :image, :button_link, NOW())";
        $stmt = $this->connection->prepare($sqlInsert);
        
        try {
            $stmt->execute([
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $data['image'],
                'button_link'=> $data['link']
            ]);           

            return true;
            
        } catch (PDOException $e) {
           
            return false;
        }
    }


}
