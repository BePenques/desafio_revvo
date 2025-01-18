<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';

$pages = [
    'dashboard' => '../admin/views/dashboard.php',     
];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="../assets/css/header.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
    <link rel="stylesheet" href="../assets/css/footer.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

    <script src="../assets/js/slideshow.js" defer></script>

    <title>Admin - LEO Cursos</title>
</head>
<body>
    <?php
        if (array_key_exists($page, $pages)) {
            include '../php/partials/header.php'; 
            include $pages[$page];
            include '../php/partials/footer.php'; 
        } else {
            echo "<h1>Página não encontrada</h1>";
        }
    ?>
</body>
</html>
