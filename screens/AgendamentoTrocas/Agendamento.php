
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Serviços</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="../../Styles/index.css">
</head>
<body>

    <div class="informacoes_mecanico">
        <div class="d-flex justify-content-start">
            <div id="imagem_mecanico">
                <img src="./Images/Ellipse 15.png" alt="">
        </div>
            <div class="d-flex flex-column bd-highlight mb-3">
                <div class="p-2 bd-highlight">
                    <h5>Lucas Azevedo</h5>
                </div>
                
                <div class="p-2 bd-highlight">
                    <p>Especializado em motores</p>
                </div><br>
            </div>
    </div>
    <!-- Informações fora do flexbox !-->

  

    
</div><br> <!-- Fim div principal (informacoes_mecanico) !-->

<div class="buttons_mecanico">
            <button type="submit" class="btn btn-secondary btn-lg">Chat</button>
            <button type="submit" class="btn btn-secondary btn-lg">Cancelar</button>
</div><br><br>
<!-- Calendário para seleção de data !-->
    <div class="imprimirDataSelecao">
        <div class="d-flex justify-content-start">
            <div id="printDate_calendar">
            <p> Oct-Nov 2022 </p> 
            </div>
            <div id="logoPrint_calendar">
                <img src="./Images/calendarLogo.png" alt="">
            </div>
        </div><!-- Fim div flexbox Calendar !-->
    </div><br><br><!-- Fim div imprimirDataSelecao !-->
    
    <!-- Date Picker !--> 
    <div class="datePicker_calendario">
        <input type="date">
    </div>
    <!-- Horários selecionados !--> 
        <!-- Flexbox 1 !-->
    <div class="teste">
        <div class="d-flex justify-content-end"">
            <div class="buttonsHorarios">
                <button type="submit" class="btn btn-secondary btn-lg">14:20</button>
            </div>
            <div class="buttonsHorarios">
                <button type="submit" class="btn btn-secondary btn-lg">09:50</button>
            </div>
            <div class="buttonsHorarios">
                <button type="submit" class="btn btn-secondary btn-lg">18:35</button>
            </div><br>
     </div>
    </div><br>
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
    </div><br>
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
    </div><br><br>
    <!-- Observações sobre o agendamento !-->
    <div class="observacoesAgendamento_servico">
        <div class="form-group">
            <textarea class="form-control"  cols="10" rows="5"></textarea>
        </div>
    </div>

    
</body>
</html>