const horarios = [];
let id = 1;
let count = 0;
let format = " (BRT) Horario de Brasilia"

function verificarDados(event) {

    // Armazenando o valor dos inputs
    let nameService = document.getElementById("nameService").value
    let descriptionService = document.getElementById("descriptionService").value
    let valService = document.getElementById("valService").value
    let p = document.getElementById("p_modal");
    let modal = document.getElementById("myModal");
    let card_modal = document.getElementsByClassName("modal-content")[0];
    // Verificar se os inputs estão vazios
    if (nameService == "" || descriptionService == "" || valService == "" || horarios.length < 3) {
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

function saveHour(event) {
    event.preventDefault()
    if (count < 6) {
        let hour = document.getElementById("hourService").value;
        console.log("if 1")

        // VERIFICA SE INPUT ESTA VAZIO
        if (hour != "") {
            hour += format;
            console.log("if 2")
            if (horarios.indexOf(hour) == -1) { // VERIFICA SE O HORARIO JÁ FOI CADASTRADO
                console.log("if 3")
                // let placeHour = document.getElementById(idPlaceHour).value = hour;


                let inputHour = document.createElement("input")
                inputHour.setAttribute("type", "text")
                inputHour.setAttribute("readonly", true)
                inputHour.setAttribute("id", "hora" + id)
                inputHour.setAttribute("name", "hora" + id)
                inputHour.setAttribute("onfocus", "editHour(id)")
                inputHour.setAttribute("onblur", "editedHour(id)")
                inputHour.value = hour

                let divHour = document.getElementById("horarios")
                divHour.appendChild(inputHour)

                horarios.push(inputHour.value)
                id++
                count++
            }
        }
    }
    console.log(horarios)
}



function editHour(id) {
    let input = document.getElementById(id)
    let index = horarios.indexOf(input.value)
    input.type = "time"
    input.readOnly = false
    horarios.splice(index, 1)
    input.focus()
}

function editedHour(id) {
    let input = document.getElementById(id)

    if (input.value == "") {
        input.remove()
    } else {
        input.type = "text"
        input.readOnly = true
        input.value += format
        horarios.push(input.value)
    }
}


// =================== MODAL ===========================

function resultCadastro(status) {
    let p = document.getElementById("p_modal");
    let modal = document.getElementById("myModal");
    let card_modal = document.getElementsByClassName("modal-content")[0];
    modal.style.display = "block";
    modal.style.color = "#fff";
    console.log(typeof(status))
    if (status == 1) {
        card_modal.style.backgroundColor = "#23b83e";
        p.innerHTML = "Serviço cadastrado com sucesso!";
    } else if (status != Number){
        card_modal.style.backgroundColor = "#FA9F47";
        p.innerHTML = `Erro ao salvar imagem: ${status}`;
    } else {
        card_modal.style.backgroundColor = "#F65D74";
        p.innerHTML = `Erro ao cadastrar serviço: ${status}`;
    }

}