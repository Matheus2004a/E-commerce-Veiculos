const buttonTopPage = document.querySelector(".button-top-page")

window.addEventListener("scroll", showButtonTopPage)

function showButtonTopPage() {
    scrollY >= 800 ? buttonTopPage.classList.add("show") : buttonTopPage.classList.remove("show")
}

const form = document.querySelector("#order")
const select = document.querySelector("select")

select.addEventListener("change", onSelectChange)
function onSelectChange() {
    form.submit();
}