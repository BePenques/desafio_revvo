<?php
    session_start();
    if (!isset($_SESSION['modalViewed'])) {
        $_SESSION['modalViewed'] = false;
    }

    require_once './admin/controllers/CourseController.php';

    $controller = new CourseController();
    $courses = $controller->getAll();
    
    
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <?php if (!$_SESSION['modalViewed']): ?>
        <script>
            sessionStorage.removeItem('modalViewed');
        </script>
    <?php endif; ?>
    <main class="home">

        <section class="slideshow-container">
            <div class="slide fade">
                <img src="/assets/images/slide.jpg" alt="Slide 1" style="width:100%">
                <div class="slide-content">
                    <h2>Lorem Ipsum</h2>
                    <p>Anenim liberatmend axolu condis asectetur. Cum soceis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin massa est, porta ac consectetur ac, vestibulum at eros.</p>
                    <button href="#" class="btn">VER CURSO</button>
                </div>
            </div>

            <div class="slide fade">
                <img src="/assets/images/slide-2.jpg" alt="Slide 2" style="width:100%">
                <div class="slide-content">
                    <h2>Lorem Ipsum</h2>
                    <p>Anenim liberatmend axolu condis asectetur. Cum soceis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Proin massa est, porta ac consectetur ac, vestibulum at eros.</p>
                    <button href="#" class="btn">VER CURSO</button>
                </div>
            </div>

            <a class="prev" onclick="changeSlide(-1)"> <i class="fas fa-chevron-left"></i></a>
            <a class="next" onclick="changeSlide(1)"> <i class="fas fa-chevron-right"></i></a>
        </section>
     
        <section class="courses">
            <h2>MEUS CURSOS</h2>
            <div class="line"></div>
            <div class="course-grid">
                <?php foreach ($courses as $course): ?>
                    <div class="course-card">
                        <img src='/admin/uploads/<?php echo htmlspecialchars($course['image']); ?>' alt="imagem do curso">
                        <div class="course-info">
                            <div class="course-txt">
                                <h3><?php echo htmlspecialchars($course['title']); ?></h3>
                                <p><?php echo htmlspecialchars($course['description']); ?></p>
                            </div>
                            <Button href="#" class="btn">VER CURSO</Button>
                        </div>
                    </div>  
                <?php endforeach; ?>  
                <div class="add-course">
                    <a href="admin/index.php">
                        <img src="/assets/images/add-course.png" alt="Curso 1">
                        <div class="add-course-txt">
                            <p>ADICIONAR<p>
                            <span>CURSO</span>  
                        </div>
                    </a>                
                </div> 
            </div>
        </section>

        <div class="modal-overlay"></div>
        <div id="myModal" class="modal">
            <div class="modal-content">
                <div class="modal-header">
                    <span class="close" onclick="closeModal()">
                        <i class="fas fa-times close-icon"></i>
                    </span>
                    <img src="/assets/images/modal-image.jpg" alt="Modal Image">
                </div>
                <div class="modal-text">
                    <h2>EGESTAS TORTOR VULPUTATE</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Optio quod incidunt rem officia nam accusamus blanditiis magnam iste nemo asperiores.</p>
                    <button class="btn-register" onclick="closeModal()">INSCREVA-SE</button>
                </div>
            </div>
        </div>

    </main>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            if (!sessionStorage.getItem('modalViewed')) {
                document.getElementById("myModal").style.display = "block";
            }
        });

        function closeModal() {
            document.getElementById("myModal").style.display = "none";
            sessionStorage.setItem('modalViewed', 'true');
            <?php $_SESSION['modalViewed'] = true; ?>
        }
    </script>
</body>
</html>
