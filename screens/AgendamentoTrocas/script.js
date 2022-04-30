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

function pickValues() {
    obs = document.getElementById("obs").value
    document.getElementById("hiddenData").value = dia
    document.getElementById("hiddenHora").value = horario
    document.getElementById("hiddenObs").value = obs
}