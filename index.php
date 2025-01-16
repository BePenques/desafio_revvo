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
    <title>LEO Cursos</title>
    
    <link rel="stylesheet" href="assets/css/styles.css">
   
</head>
<body>

    <?php
        if (array_key_exists($page, $pages)) {
           
            include $pages[$page];
           
        } else {
         
            echo "<h1>Página não encontrada</h1>";
           
        }
    ?> 
</body>
</html>
