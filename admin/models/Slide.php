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

    public function findById($id)
    {
        $query = "SELECT * FROM " . $this->table . " WHERE id = " . $id;

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

    public function update($data) 
    {
        $sql = "UPDATE " . $this->table . " SET title = :title, description = :description, button_link = :button_link, image = :image WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        
        try {
            $stmt->execute([
                'id'=> $data['id'],
                'title' => $data['title'],
                'description' => $data['description'],
                'image' => $data['image'],
                'button_link' => $data['button_link'],
            ]);           

            return true;
            
        } catch (PDOException $e) {
           
            return false;
        }
    }

    public function delete($id){
        if(!$this->findById($id))
        {
            return false;
        }

        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->connection->prepare($sql);
        
        try
        {
            $stmt->execute(['id'=>$id]);

            return true;
        }
        catch (PDOException $e)
        {
            return false;
        }
    }


}
