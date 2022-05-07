const horarios = [];
let idPlaceHour = 1;
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
        document.getElementById("containerModal").style.visibility = "visible"
    }
}

function closeModal(event) {
    event.preventDefault()
    document.getElementById("containerModal").style.visibility = "hidden"
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
                let placeHour = document.getElementById(idPlaceHour).value = hour;
                horarios.push(placeHour)
                idPlaceHour++
                count++
            }
        }
    }
    console.log(horarios)
}