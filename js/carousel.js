// const carousel = document.getElementById('carousel')
// const carousel_left = document.getElementById('carousel-left')
// const carousel_right = document.getElementById('carousel-right')
// const slides = carousel.childElementCount
// let current_slide = 1;

// carousel_left.onclick = () => {
//     if (current_slide > 1) {
//         current_slide -= 1
//         el(`slide-${current_slide}`).scrollIntoView(false)
//     }

//     console.log(current_slide)
// }

// carousel_right.onclick = () => {
//     if (current_slide < slides) {
//         current_slide += 1
//         el(`slide-${current_slide}`).scrollIntoView(false)
//     }

//     console.log(current_slide)
// }

// window.onload = () => {
//     carousel.style.width = `${carousel.clientWidth}px`
//     const slides = document.getElementsByClassName('slide')

//     Array.from(slides).forEach(slide => {
//         console.log(`${carousel.clientWidth}px`)
//         slide.style.width = `${carousel.clientWidth}px`
//     })
// }

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName('slides');
    var dots = document.getElementsByClassName("dot");
    if (n > slides.length) {
        slideIndex = 1
    }

    if (n < 1) {
        slideIndex = slides.length
    }

    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }

    slides[slideIndex - 1].style.display = "block";
    dots[slideIndex - 1].className += " active";
}