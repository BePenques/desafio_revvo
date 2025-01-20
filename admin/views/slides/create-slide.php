<?php


require_once __DIR__ . '/../../controllers/SlideController.php';


$controller = new SlideController();

$title = "";
$description = "";
$image = null;
$link = '';

$isEdit = false;
$success =  null;
$slide =  null;
$imageName = null;

// Verifica se é uma edição
// if (isset($_GET['id'])) {
//     $isEdit = true;
//     $courseId = $_GET['id'];
    
//     $course = $controller->findById($courseId)[0];
//     $title = $course['title'];
//     $description = $course['title'];
//     $image = $course['image'];
  
// }

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    if (!empty($_FILES['image']['name'])) {

       $normalizedTitle = strtolower(preg_replace('/[^A-Za-z0-9]/', '_', $title));
       $imageExtension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);

       $imageName = $normalizedTitle . '.' . $imageExtension;

        move_uploaded_file($_FILES['image']['tmp_name'], "uploads/slides/" . $imageName);
    }

    $data = ['id'=>null,'title'=> $title,'description'=> $description,'image'=> $imageName, 'link'=>$link];

    if ($isEdit) {
        // to do: fazer update
        
    } else {
        $success = $controller->create($data);
    }

    if ($success) {
        $title = '';
        $description = '';
        $image = '';
        $link = '';
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $isEdit ? 'Editar Slide' : 'Criar Slide'; ?></title>
</head>
<body>
    <?php if ($success): ?>

        <div class="toast success"><?php echo $isEdit ? 'Slide editado com sucesso!' : 'Slide criado com sucesso!'; ?></div>

    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

        <div class="toast error">Erro ao criar o slideshow. Tente novamente.</div>

    <?php endif; ?>
    <main>
       
        <form action="" method="POST" enctype="multipart/form-data" class="create-form">
            <h1><?php echo $isEdit ? 'Editar Slide' : 'Criar Slide'; ?></h1>
            <div>
                <label for="title">Título</label>
                <input type="text" name="title" id="title" value="<?php echo htmlspecialchars($title); ?>" required>
            </div>
            <div>
                <label for="title">Link</label>
                <input type="text" name="link" id="link" value="<?php echo htmlspecialchars($link); ?>" required>
            </div>
            <div>
                <label for="description">Descrição</label>
                <textarea name="description" id="description" required><?php echo htmlspecialchars($description); ?></textarea>
            </div>
            <div>
                <label for="image">Imagem</label>
                <input type="file" name="image" id="image" <?php echo $isEdit ? '' : 'required'; ?>>
                <?php if ($isEdit && $image): ?>
                    <p>Imagem atual: <img src="/admin/uploads/<?php echo $image; ?>" alt="Imagem do slideshow" style="width:80px;"></p>
                <?php endif; ?>
            </div>
            <div class="box-btn-form">
                <button type="submit" class="submit"><?php echo $isEdit ? 'Atualizar Slide' : 'Criar Slide'; ?></button>
                <button type="button" class="list"><a href="/admin/index.php?page=slides" style="text-decoration: none; color: white">Ver slides</a></button>
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