const horarios = [];
let id = 1;
let count = 0;
let format = " (BRT) Horario de Brasilia"

function verificarDados(event) {

    // Armazenando o valor dos inputs
    let nameService = document.getElementById("nameService").value
    let descriptionService = document.getElementById("descriptionService").value
    let valService = document.getElementById("valService").value

    // Verificar se os inputs estão vazios
    if (nameService == "" || descriptionService == "" || valService == "" || horarios.length < 3) {
        event.preventDefault()
        document.getElementById("modal").style.display = "flex"
        document.getElementById("nav-top").style.display = "none" // deixando a div nav-top fora da tela
        document.getElementById("nav-bottom").style.display = "none" // deixando a div nav-bottom fora da tela
        document.getElementById("container").style.background = "rgba(0,0,0,.6)" // alterando o background do container
    }
}

function closeModal(event) {
    event.preventDefault()
    document.getElementById("modal").style.display = "none"
    document.getElementById("nav-top").style.display = "flex"
    document.getElementById("nav-bottom").style.display = "flex"
    document.getElementById("container").style.background = "#D6DAE5" // alterando o background do container
}

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