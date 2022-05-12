<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Document</title>
</head>

<body>
    <form class="container" action="scriptCadastrar.php" method="POST" id="container">
        <div class="header">header</div>
        <div class="nav-top" id="nav-top">
            <div class="content-top">
                <div class="left-content-top">
                    <div class="perfil">
                        <img src="./assets/euPerfil.jpg" alt="">
                        <span class="span-title">Talison Brendon</span>
                    </div>
                    <span class="span-title">Email:</span>
                    <span class="span-content">nicota1234@gmail.com</span>
                    <span class="span-title">Telefone</span>
                    <span class="span-content">(99) 99999-9999</span>
                </div>
                <div class="right-content-top">
                    <span class="span-title">Digite o nome do serviço</span>
                    <input type="text" name="nameService" id="nameService" placeholder="Nome do serviço">
                    <span class="span-title">Faça uma descrição sobre o serviço</span>
                    <textarea name="descriptionService" id="descriptionService" cols="30" rows="5" placeholder="Descrição do serviço"></textarea>
                </div>
            </div>
        </div>
        <div class="nav-bottom" id="nav-bottom">
            <div class="content-bottom">
                <div class="left-content-bottom">
                    <span class="span-title">Agendar horarios (min 3 horarios)</span>
                    <span class="span-content">Selecione o horario</span>
                    <div class="hour">
                        <input type="time" name="hourService" id="hourService">
                        <button onclick="saveHour(event)">salvar</button>
                    </div>
                    <span class="span-title">Valor do serviço</span>
                    <input type="text" name="valService" id="valService" placeholder="R$">

                </div>
                <div class="right-content-bottom">
                    <span class="span-title">Seus horários cadastrados</span>
                    <div class="horarios" id="horarios">

                        <input type="text" name="hora1" id="1" readonly>
                        <input type="text" name="hora2" id="2" readonly>
                        <input type="text" name="hora3" id="3" readonly>
                        <input type="text" name="hora4" id="4" readonly>
                        <input type="text" name="hora5" id="5" readonly>
                        <input type="text" name="hora6" id="6" readonly>


                    </div>


                </div>
            </div>
            <input type="hidden" name="horasCadastradas" id="horasCadastradas">
            <input type="submit" value="Cadastrar serviço" onclick="verificarDados(event)">
        </div>
        <div class="modal" id="modal">
            <span id="spanModal">Por favor preencha todos os dados para cadastrar o serviço!</span>
            <button onclick="closeModal(event)">OK</button>
        </div>
    </form>
</body>

</html>