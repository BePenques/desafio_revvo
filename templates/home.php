<?php
    session_start();
    if (!isset($_SESSION['modalViewed'])) {
        $_SESSION['modalViewed'] = false;
    }
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
            </div>

            <div class="slide fade">
                <img src="/assets/images/slide-2.jpg" alt="Slide 2" style="width:100%">
            </div>

            <a class="prev" onclick="changeSlide(-1)"> <i class="fas fa-chevron-left"></i></a>
            <a class="next" onclick="changeSlide(1)"> <i class="fas fa-chevron-right"></i></a>
        </section>
     
        <section class="courses">
            <h2>MEUS CURSOS</h2>
            <div class="line"></div>
            <div class="course-grid">
                <div class="course-card">
                    <img src="/assets/images/curso.jpg" alt="Curso 1">
                    <div class="course-info">
                        <div class="course-txt">
                            <h3>Pellentesque Malesuada</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        </div>
                        <Button href="#" class="btn">VER CURSO</Button>
                    </div>
                </div>
                <div class="course-card">
                    <img src="/assets/images/curso.jpg" alt="Curso 1">
                    <div class="course-info">
                        <div class="course-txt">
                            <h3>Pellentesque Malesuada</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        </div>
                        <Button href="#" class="btn">VER CURSO</Button>
                    </div>
                </div>
                <div class="course-card">
                    <img src="/assets/images/curso.jpg" alt="Curso 1">
                    <div class="course-info">
                        <div class="course-txt">
                            <h3>Pellentesque Malesuada</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        </div>
                        <Button href="#" class="btn">VER CURSO</Button>
                    </div>
                </div>
                <div class="course-card">
                    <img src="/assets/images/curso.jpg" alt="Curso 1">
                    <div class="course-info">
                        <div class="course-txt">
                            <h3>Pellentesque Malesuada</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        </div>
                        <Button href="#" class="btn">VER CURSO</Button>
                    </div>
                </div>
                <div class="course-card">
                    <img src="/assets/images/curso.jpg" alt="Curso 1">
                    <div class="course-info">
                        <div class="course-txt">
                            <h3>Pellentesque Malesuada</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        </div>
                        <Button href="#" class="btn">VER CURSO</Button>
                    </div>
                </div>
                <div class="course-card">
                    <img src="/assets/images/curso.jpg" alt="Curso 1">
                    <div class="course-info">
                        <div class="course-txt">
                            <h3>Pellentesque Malesuada</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        </div>
                        <Button href="#" class="btn">VER CURSO</Button>
                    </div>
                </div>
                <div class="course-card">
                    <img src="/assets/images/curso.jpg" alt="Curso 1">
                    <div class="course-info">
                        <div class="course-txt">
                            <h3>Pellentesque Malesuada</h3>
                            <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec ullamcorper nulla non metus auctor fringilla.</p>
                        </div>
                        <Button href="#" class="btn">VER CURSO</Button>
                    </div>
                </div>
                <div class="add-course">
                    <img src="/assets/images/add-course.png" alt="Curso 1">
                    <p>ADICIONAR<p>
                    <span>CURSO</span>                  
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
