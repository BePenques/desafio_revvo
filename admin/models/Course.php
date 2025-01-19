<?php


require_once __DIR__ . '/../../php/db/connection.php';


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

    public function create($data) 
    {
        $sqlInsert = "INSERT INTO " . $this->table . " (title, description, created_at) VALUES (:title, :description, NOW())";
        $stmt = $this->connection->prepare($sqlInsert);
        
        try {
            $stmt->execute([
                'title' => $data['title'],
                'description' => $data['description'],
            ]);           

            return true;
            
        } catch (PDOException $e) {
           
            return false;
        }
    }

}

?>
