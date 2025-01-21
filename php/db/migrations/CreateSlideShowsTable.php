<?php //executar php CreateSlideShowsTable.php no caminho php/db/migrations

require_once '../connection.php';

class CreateSlideshowsTable extends Connection {

    public function up() {
        $sql = "
            CREATE TABLE IF NOT EXISTS slideshows (
                id INT AUTO_INCREMENT PRIMARY KEY,
                image VARCHAR(255) NOT NULL,
                title VARCHAR(255) NOT NULL,
                description TEXT NOT NULL,
                button_link VARCHAR(255) NOT NULL,
                created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            );
        ";

        try {
            $this->connection->exec($sql);
            echo "Tabela 'slideshows' criada com sucesso.";
        } catch (PDOException $e) {
            echo "Erro ao criar a tabela 'slideshows': " . $e->getMessage();
        }
    }
}

$migration = new CreateSlideshowsTable();
$migration->up();

?>
