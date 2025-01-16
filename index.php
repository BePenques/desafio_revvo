<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

$pages = [
    'home' => 'templates/home.php',
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/header.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>LEO Cursos</title>
   
</head>
<body>

    <?php
        if (array_key_exists($page, $pages)) {
            include 'php/partials/header.php';
            include $pages[$page];
           
        } else {
         
            echo "<h1>Página não encontrada</h1>";
           
        }
    ?> 
</body>
</html>
