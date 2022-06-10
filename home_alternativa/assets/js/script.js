const toggleButton = document.getElementsByClassName('toggle-button')[0]
const navbarLinks = document.getElementsByClassName('navbar-links')[0]

toggleButton.addEventListener('click', () => {
    navbarLinks.classList.toggle('active')
})

let myIndex = 0;
carousel();

function carousel() {
    let slides = document.getElementsByClassName("mySlides");
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    myIndex++;
    if (myIndex > slides.length) {
        myIndex = 1
    }
    slides[myIndex - 1].style.display = "block";
    setTimeout(carousel, 3000); // Muda a imagem a cada 3s
}