function salvar() {
    let val = document.getElementById("hourService").value;
    let newSpan = document.createElement("span");

    let string = document.createTextNode(val);
    let divHorarios = document.getElementById("horarios")
    addValor = newSpan.appendChild(string)
    divHorarios.appendChild(addValor)

    console.log(val, " ",stringVal, " ", addValor)
}
