<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Serviços</title>
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <link rel="stylesheet" href="./style/jquery-ui.css">

    <!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css"> -->

</head>

<body onload="loadPage()">

    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img src="logo.png" alt="">
                </span>

                <div class="text logo-text">
                    <span class="name">Usuário X</span>
                    <span class="profession">Em Teste</span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">

                <li class="search-box">
                    <i class='bx bx-search icon'></i>
                    <input type="text" placeholder="Pesquisar...">
                </li>

                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Página Principal</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notificações</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon'></i>
                            <span class="text nav-text">Últimos Pedidos</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-heart icon'></i>
                            <span class="text nav-text">Curtidas</span>
                        </a>
                    </li>

                    <li class="nav-link">
                        <a href="#">
                            <i class='bx bx-wallet icon'></i>
                            <span class="text nav-text">Carteira</span>
                        </a>
                    </li>

                </ul>
            </div>

            <div class="bottom-content">
                <li class="">
                    <a href="#">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Desconectar-se</span>
                    </a>
                </li>

                <li class="mode">
                    <div class="sun-moon">
                        <i class='bx bx-moon icon moon'></i>
                        <i class='bx bx-sun icon sun'></i>
                    </div>
                    <span class="mode-text text">Modo Noite</span>

                    <div class="toggle-switch">
                        <span class="switch"></span>
                    </div>
                </li>

            </div>
        </div>

    </nav>
    <div class="header">
        <header>
            <img src="../../images/icones/brand header.png" class="brand">
            <!-- <a class="brand" href="#">Logomarca</a> !-->
            <nav class="menus">
                <ul>
                    <li>
                        <a class="active" aria-current="page" href="#">Home</a>
                    </li>
                    <li>
                        <a href="#services">Todos os serviços</a>
                    </li>
                    <li>
                        <a href="#about">Sobre</a>
                    </li>
                    <li>
                        <a href="#contact">Contate - nos</a>
                    </li>
                    <li>
                        <a href="./screens/home/mapa_site.php">Mapa do Site</a>
                    </li>
                    <li>
                        <a href="./screens/login/login.php">Login</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="home">

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

        <div class="calendario">
            <input type="text" name="" id="inputdate" readonly value="Selecione uma data">
            <div id="datepicker"></div>
        </div>


        <div class="horarios">
            <span id="spanHorario">Horarios disponiveis no dia</span>

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
    </div>
    <script src="script.js"></script>
    <script>
        function getDia(date) {
            document.getElementById("date").value = date
        }
        $("#datepicker").datepicker({
            dateFormat: "dd-mm-yy",
            onSelect: function() {
                var dateSelected = $(this).datepicker("getDate");
                document.getElementById("inputdate").value = dateSelected
                getDia(dateSelected)
                console.log(dateSelected)
            }
        })
    </script>
</body>

</html>