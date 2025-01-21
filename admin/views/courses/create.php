<?php


require_once __DIR__ . '/../../controllers/CourseController.php';


$controller = new CourseController();

$title = "";
$description = "";
$image = null;
$isEdit = false;
$success =  null;
$course =  null;
$imageName = null;

// Verifica se é uma edição
if (isset($_GET['id'])) {
    $isEdit = true;
    $courseId = $_GET['id'];
    
    $course = $controller->findById($courseId)[0];
    $title = $course['title'];
    $description = $course['description'];
    $image = $course['image'];
  
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {

        $oldImagePath = "uploads/courses/" . $image;
        //remover img antiga
        if (file_exists($oldImagePath)) {
            unlink($oldImagePath);
        }

       $normalizedTitle = strtolower(preg_replace('/[^A-Za-z0-9]/', '_', $title));
       $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

       $imageName = $normalizedTitle . '.' . $imageExtension;

        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/courses/" . $imageName);

    }else{
        $imageName = $image;
    }

    $data = ['id'=>null,'title'=> $title,'description'=> $description,'image'=> $imageName];

    if ($isEdit) {
        $data['id'] = $courseId;
        $success = $controller->update($data);
        
    } else {
        $success = $controller->create($data);
    }

    if ($success) {
        $title = '';
        $description = '';
        $image = '';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $isEdit ? 'Editar Curso' : 'Criar Curso'; ?></title>
</head>
<body>
    <?php if ($success): ?>

        <div class="toast success"><?php echo $isEdit ? 'Curso editado com sucesso!' : 'Curso criado com sucesso!'; ?></div>

    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

        <div class="toast error">Erro ao criar o curso. Tente novamente.</div>

    <?php endif; ?>
    <main>
       
        <form action="" method="POST" enctype="multipart/form-data" class="create-form">
        <h1><?php echo $isEdit ? 'Editar Curso' : 'Criar Curso'; ?></h1>
            <div>
                <label for="title">Título</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>" required>
            </div>
            <div>
                <label for="description">Descrição</label>
                <textarea name="description" id="description" required><?php echo htmlspecialchars($description); ?></textarea>
            </div>
            <div>
                <label for="image">Imagem</label>
                <input type="file" name="image" id="image" <?php echo $isEdit ? '' : 'required'; ?>>
                <?php if ($isEdit && $image): ?>
                    <p>Imagem atual: <img src="/admin/uploads/courses/<?php echo $image; ?>" alt="Imagem do curso" style="width:80px;"></p>
                <?php endif; ?>
            </div>
            <div class="box-btn-form">
                <button type="submit" class="submit"><?php echo $isEdit ? 'Atualizar Curso' : 'Criar Curso'; ?></button>
                <button type="button" class="list"><a href="/admin/index.php?page=courses" style="text-decoration: none; color: white">Ver cursos</a></button>
            </div>
        </form>
    </main>
    <script>
        setTimeout(function() {
            const toast = document.querySelector('.toast');
            if (toast) {
                toast.style.display = 'none';
            }
        }, 3000);
    </script>
</body>
</html>