let currentSlideIndex = 0;

function showSlide(index) {
    let slides = document.querySelectorAll(".slide");
    if (index >= slides.length) {
        currentSlideIndex = 0;
    }
    if (index < 0) {
        currentSlideIndex = slides.length - 1;
    }
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none"; 
    }
    slides[currentSlideIndex].style.display = "block"; 
}

function changeSlide(step) {
    currentSlideIndex += step;
    showSlide(currentSlideIndex);
}


showSlide(currentSlideIndex);

//modal

document.addEventListener("DOMContentLoaded", function() {
    if (!sessionStorage.getItem('modalViewed')) {
        document.getElementById("myModal").style.display = "block";
    }
});

function closeModal() {
    document.getElementById("myModal").style.display = "none";
    sessionStorage.setItem('modalViewed', 'true');
}

