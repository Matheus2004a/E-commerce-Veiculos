function loadPage() {
    const body = document.querySelector('body'),
        sidebar = body.querySelector('nav'),
        toggle = body.querySelector(".toggle"),
        searchBtn = body.querySelector(".search-box"),
        modeSwitch = body.querySelector(".toggle-switch"),
        modeText = body.querySelector(".mode-text");


    toggle.addEventListener("click", () => {
        sidebar.classList.toggle("close");
    })

    searchBtn.addEventListener("click", () => {
        sidebar.classList.remove("close");
    })

    modeSwitch.addEventListener("click", () => {
        body.classList.toggle("dark");

        if (body.classList.contains("dark")) {
            modeText.innerText = "Modo Dia";
        } else {
            modeText.innerText = "Modo Noite";

        }
    });
}

function buttonSelected(id) {
    let hora = document.getElementById(id).value
    document.getElementById("detalheHora").innerHTML = hora
}

