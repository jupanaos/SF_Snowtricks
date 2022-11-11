let slideIndex = 0;
let thumbnails = document.querySelectorAll(".demo.cursor");

thumbnails.forEach((thumbnail, index) => {
    thumbnail.addEventListener("click", () => {
        showSlides(slideIndex = index);
    })
});
showSlides(slideIndex);

// Next/previous controls
window.plusSlides = n => {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("slideshow-picture");
    let dots = document.getElementsByClassName("demo");
    let captionText = document.getElementById("caption");
    if (n > slides.length-1) { slideIndex = 0 }
    if (n < 0) { slideIndex = slides.length-1 }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex].style.display = "block";
    dots[slideIndex].className += " active";
    if (dots[slideIndex].alt) {
        captionText.innerHTML = dots[slideIndex].alt;
    } else {
        captionText.innerHTML = "";
    }
}