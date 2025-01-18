<?php

class Connection {
    protected $connection;

    function __construct()
    {
        $this->connectDB();
    }

    function connectDB(){

        $env = parse_ini_file(__DIR__ . '/../../.env');

        $host = $env['DB_HOST'];
        $dbname = $env['DB_NAME'];
        $username = $env['DB_USER'];
        $password = $env['DB_PASSWORD'];

        try {
            //nova conexaao usando PDO
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
        
        } catch (PDOException $e) {
            echo "Erro na conexão: " . $e->getMessage();
        }

    }
}
?>
