<?php //executar php CreateCoursesTable.php no caminho php/db/migrations

require_once '../connection.php';

class CreateCoursesTable extends Connection {

    public function up() {
        $sql = "        
            CREATE TABLE courses (
                id INT AUTO_INCREMENT PRIMARY KEY,
                title VARCHAR(255) NOT NULL,
                description TEXT NOT NULL,
                image VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ";

        try {
            $this->connection->exec($sql);
            echo "Tabela 'courses' criada com sucesso.";
        } catch (PDOException $e) {
            echo "Erro ao criar a tabela 'courses': " . $e->getMessage();
        }
    }
}

$migration = new CreateCoursesTable();
$migration->up();

?>
