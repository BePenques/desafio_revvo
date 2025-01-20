<?php

   require_once __DIR__ . '/../../controllers/CourseController.php';

   $controller = new CourseController();
   $courses = $controller->getAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/list.css">
    <title>Lista de Cursos</title>
</head>
<body>
    <div class="container-list">
        <h1 class="list-title">Lista de Cursos</h1>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($courses as $course): ?>
                        <tr>
                            <td><?= htmlspecialchars($course['id']); ?></td>
                            <td><?= htmlspecialchars($course['title']); ?></td>
                            <td><?= htmlspecialchars($course['description']); ?></td>
                            <td>
                                <img src="../../uploads/<?= htmlspecialchars($course['image']); ?>" alt="<?= htmlspecialchars($course['title']); ?>" width="100">
                            </td>
                            <td class="btn-actions">
                                <a href="/admin/index.php?page=create&id=<?= htmlspecialchars($course['id']); ?>"><i class="fas fa-pen"></i></a>
                                <a href="delete.php?id=<?= htmlspecialchars($course['id']); ?>" onclick="return confirm('Tem certeza que deseja excluir este curso?');"> <i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>    
    </div>

</body>
</html>
