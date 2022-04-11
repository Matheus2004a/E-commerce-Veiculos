<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Serviços</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <!-- <link rel="stylesheet" href="../../Styles/index.css"> -->
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>

<body>

<!-- Div container, perfil e botões chat e cancelar -->
    <div class="container">
        <div class="perfil">
            <img src="./Images/Ellipse 15.png" alt="">
            <div class="spanPerfil">
                <span id="nomeSpan">Luas Azevedo</span>
                <span id="descSpan">Mecânico para motor</span>
            </div>
            <button>
                <img src="./Images/close.png" alt="">
            </button>
        </div>

        <div class="buttonContainer">
            <button type="submit" class="btn btn-secondary btn-lg">Chat</button>
            <button type="submit" class="btn btn-secondary btn-lg">Cancelar</button>
        </div>
    </div>
<!-- Fim da div Container-->

<!-- Inicio div Calendario e datas -->
    <div class="calendario">
        <input type="date" name="date" id="date" min="2022-04-12" max="2022-04-22">
        <span>Lorem Ipsum is simply dummy text of the printing and typ
            esetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, 
            but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span>
    </div>
<!-- Fim div calendario e datas -->

    <div class="horarios">
  
            <input type="button" value="09:15">
            <input type="button" value="09:50">
            <input type="button" value="10:40">
            <input type="button" value="12:15">
            <input type="button" value="12:45">
            <input type="button" value="14:45">
            <input type="button" value="15:25">
            <input type="button" value="16:15">
            <input type="button" value="17:00">
     
        <div class="observacoes">
            <span>Observações</span>
            <textarea class="form-control" cols="10" rows="5"></textarea>
        </div>
        <input id="btnConfirm" type="button" value="Confirmar">
    </div>
    <!-- Horários selecionados !-->
<!-- <div class="teste">
<div class="d-flex justify-content-end"">
<div class=" buttonsHorarios">
<button type="submit" class="btn btn-secondary btn-lg">14:20</button>
</div>
<div class="buttonsHorarios">
<button type="submit" class="btn btn-secondary btn-lg">09:50</button>
</div>
<div class="buttonsHorarios">
<button type="submit" class="btn btn-secondary btn-lg">18:35</button>
</div><br>
</div>
<div class="teste">
<div class="d-flex justify-content-end">
<div class="buttonsHorarios">
<button type="submit" class="btn btn-secondary btn-lg">10:35</button>
</div>
<div class="buttonsHorarios">
<button type="submit" class="btn btn-secondary btn-lg">17:35</button>
</div>
<div class="buttonsHorarios">
<button type="submit" class="btn btn-secondary btn-lg">16:35</button>
</div>
</div>
</div>
<div class="teste">
<div class="d-flex justify-content-end">
<div class="buttonsHorarios">
<button type="submit" class="btn btn-secondary btn-lg">10:35</button>
</div>
<div class="buttonsHorarios">
<button type="submit" class="btn btn-secondary btn-lg">17:35</button>
</div>
<div class="buttonsHorarios">
<button type="submit" class="btn btn-secondary btn-lg">16:35</button>
</div>
</div>
</div> -->
    <!-- Observações sobre o agendamento !-->
    


</body>

</html>