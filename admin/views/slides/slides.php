<?php

    require_once __DIR__ . '/../../controllers/SlideController.php';

    $controller = new SlideController();
    $slides = $controller->getAll();

    $success = null;

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
        $slideId = $_POST['id'];

        $success = $controller->delete($slideId);

        if($success){
            echo "<script> 
                    setTimeout(() => {
                        window.location.href = '/admin/index.php?page=slides';
                    }, 2000);
                </script>";
        }
    }

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/list.css">
    <title>Lista de Slides</title>
</head>
<body>
    <?php if ($success): ?>

        <div class="toast success"><?php echo  'Slide excluído com sucesso!'  ?></div>

    <?php elseif ($_SERVER['REQUEST_METHOD'] === 'POST'): ?>

        <div class="toast error">Erro ao excluír o slide. Tente novamente.</div>

    <?php endif; ?>
    <div class="container-list">
        <h1 class="list-title">Lista de Slides</h1>
        <div class="button-box">
            <a href="/admin/index.php?page=create-slide" class="button-slide" >Cadastrar slide</a>
        </div>
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Título</th>
                        <th>Link</th>
                        <th>Descrição</th>
                        <th>Imagem</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($slides as $slide): ?>
                        <tr>
                            <td><?= htmlspecialchars($slide['id']); ?></td>
                            <td><?= htmlspecialchars($slide['title']); ?></td>
                            <td><?= htmlspecialchars($slide['button_link']); ?></td>
                            <td><?= htmlspecialchars($slide['description']); ?></td>
                            <td>
                                <a href="#" onclick="openModal('<?= $slide['image'] ?>')">Ver Imagem</a>
                            </td>
                            <td class="btn-actions">
                                <a href="/admin/index.php?page=create-slide&id=<?= htmlspecialchars($slide['id']); ?>"><i class="fas fa-pen"></i></a>
                                <form action="" method="POST" style="display:inline;">
                                    <input type="hidden" name="id" value="<?php echo $slide['id']; ?>">
                                    <button type="submit" onclick="return confirm('Tem certeza que deseja deletar este slide?')"><i class="fas fa-trash"></i></button>
                                </form>
                               
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <div id="imageModal" class="modal">
                <a href="" class="close" onclick="closeModal()" style="text-decoration:none;">&times;</a>
                <img id="modalImage" class="modal-content">
                <div id="caption"></div>
            </div>
        </div>    
    </div>
    <script>
        function openModal(imageSrc) {
            var modal = document.getElementById("imageModal");
            var modalImg = document.getElementById("modalImage");
            
            modal.style.display = "block";
            modalImg.src = 'uploads/slides/' + imageSrc;
        }

        function closeModal() {
            var modal = document.getElementById("imageModal");
            modal.style.display = "none";
        }
    </script>
</body>
</html>
