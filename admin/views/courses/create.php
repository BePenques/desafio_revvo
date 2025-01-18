<?php
$title = $description = "";
$image = null;
$isEdit = false;

// Verifica se é uma edição
if (isset($_GET['id'])) {
    $isEdit = true;
    $courseId = $_GET['id'];
    
  
    // to do: Substituir por consulta real ao banco de dados
    $title = "Curso Exemplo"; 
    $description = "Descrição do curso exemplo";
    $image = "exemplo.jpg"; 
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    // if (!empty($_FILES['image']['name'])) {
    //     $image = $_FILES['image']['name'];
    //     move_uploaded_file($_FILES['image']['tmp_name'], "uploads/" . $image);
    // }

   
    if ($isEdit) {
      
        echo "Curso atualizado com sucesso!";
    } else {
      
        echo "Curso criado com sucesso!";
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
                    <p>Imagem atual: <img src="uploads/<?php echo $image; ?>" alt="Imagem do curso" style="width:100px;"></p>
                <?php endif; ?>
            </div>
            <div>
                <button type="submit"><?php echo $isEdit ? 'Atualizar Curso' : 'Criar Curso'; ?></button>
            </div>
        </form>
    </main>
</body>
</html>