var dia
var horario
var obs
var oldDate = new Date()
var minDay = oldDate.toLocaleDateString("pt-BR")
minDay = minDay.split('/').reverse().join('-');

function setMinDay() {
    document.getElementById("inputDate").setAttribute("min", minDay);
}

function pickDate(data) {
    document.getElementById("spanData").innerHTML = data.split('-').reverse().join('/');
    dia = data
}

function pickHour(hora) {
    document.getElementById("spanHora").innerHTML = hora
    horario = hora
}

function pickValues(event) {
    obs = document.getElementById("obs").value
    document.getElementById("hiddenData").value = dia
    document.getElementById("hiddenHora").value = horario
    document.getElementById("hiddenObs").value = obs

    let p = document.getElementById("p_modal");
    let modal = document.getElementById("myModal");
    let card_modal = document.getElementsByClassName("modal-content")[0];
    if (dia == null || hora == null) {
        event.preventDefault()
        modal.style.display = "block";
        modal.style.color = "#fff";
        card_modal.style.backgroundColor = "#F65D74";
        p.innerHTML = "Por favor preencha os dados corretamente!";
    }
}


function closeModal(event) {
    event.preventDefault()
    let modal = document.getElementById("myModal");
    modal.style.display = "none";
}

window.addEventListener("click", function (event) {
    let modal = document.getElementById("myModal");

    if (event.target == modal) {
        modal.style.display = "none";
    }
})


function resultCadastro(status) {
    let p = document.getElementById("p_modal");
    let modal = document.getElementById("myModal");
    let card_modal = document.getElementsByClassName("modal-content")[0];
    modal.style.display = "block";
    modal.style.color = "#fff";

    if (status == 1) {
        card_modal.style.backgroundColor = "#23b83e";
        p.innerHTML = "Serviço agendado com sucesso!";
    } else {
        card_modal.style.backgroundColor = "#F65D74";
        p.innerHTML = `Erro ao agendar o serviço: ${status}`;
    }

}