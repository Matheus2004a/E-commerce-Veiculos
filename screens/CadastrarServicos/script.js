function salvar(event) {
    event.preventDefault() // PARA QUE A TELA NÃO ATUALIZE

    let val = document.getElementById("hourService").value; // PEGAR O VALUE DO INPUT:TIME
    let newSpan = document.createElement("span"); // CRIANDO UM ELEMENTO 



    let string = document.createTextNode(val + " (BRT) Horario de Brasilia"); //TRANSFORMANDO O VALUE DO INPUT:TIME EM TEXTNODE PARA COLOCAR ELE NO SPAN CRIADO
    newSpan.appendChild(string) // COLOCANDO O TEXTO DO INPUT:TIME NO SPAN
    
    let divHorarios = document.getElementById("horarios") // PEGANDO A DIV ONDE FICARÁ OS SPANS E SALVANDO EM UMA VARIAVEL
    divHorarios.appendChild(newSpan) // COLOCANDO O SPAN COM O TEXTO DENTRO DA DIV
    limparFocar()
}

function limparFocar() {
    document.getElementById("hourService").value = ""
    document.getElementById("hourService").focus()
}