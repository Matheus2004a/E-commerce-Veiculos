const buttonTopPage = document.querySelector(".button-top-page")

window.addEventListener("scroll", showButtonTopPage)

function showButtonTopPage() {
    scrollY >= 800 ? buttonTopPage.classList.add("show") : buttonTopPage.classList.remove("show")
}