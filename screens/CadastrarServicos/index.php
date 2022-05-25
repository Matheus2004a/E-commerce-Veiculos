<!DOCTYPE html>
<html lang="en">
<?php
session_start();
include "../../connection/connection.php";
$verificaDadosMecanico = 'SELECT email,telefone,foto_perfil FROM tbl_dados_pessoais WHERE nome = "' . $_SESSION['username'] . '"';
$realizaConsultaDados = mysqli_query($conn, $verificaDadosMecanico);

$fetchDadod = mysqli_fetch_assoc($realizaConsultaDados);



?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
    <title>Document</title>
    <link rel="stylesheet" href="../../home_alternativa/assets/css/styles.css">
</head>

<body>
    <form class="container" action="scriptCadastrar.php" method="POST" id="container">
        <div class="header">
            <header>
                <nav class="navbar">
                    <figure>
                        <img src="../images/icones/brand header.png" alt="" srcset="">
                    </figure>
                    <a href="#" class="toggle-button">
                        <span class="bar"></span>
                        <span class="bar"></span>
                        <span class="bar"></span>
                    </a>
                    <div class="navbar-links">
                        <ul>
                            <li><a href="../../#">Home</a></li>
                            <li><a href="#">Sobre</a></li>
                            <li><a href="../login/index.php">Login</a></li>
                            <li><a href="../compras/index.php">Compras</a></li>

                            <li><a href="../listService/index.php">Serviços</a></li>
                            <li><a href="../contact/contato.php">Contato</a></li>
                            <li><a href="../login/logout.php">Sair</a></li>
                            <?php

                            if (isset($_SESSION['image'])) {
                                echo '<a href="../DashboardMecanico/index.php"> <li> <img src="./images/Usuarios/' . $_SESSION['image']  . '" class="img_usuario" alt=""></li> </a>';
                            } else {
                                unset($_SESSION['image']);
                            }

                            ?>
                        </ul>
                    </div>
                </nav>
            </header>
        </div>
        <div class="nav-top" id="nav-top">
            <div class="content-top">
                <div class="left-content-top">
                    <div class="perfil">

                        <?php echo ' <img src="../../images/Usuarios/' . $_SESSION['image'] . '" alt="">'; ?>

                        <?php echo ' <span class="span-title">' . $_SESSION['username'] . '</span> ' ?>
                    </div>
                    <span class="span-title">Email:</span>
                    <?php echo ' <span class="span-content">' . $fetchDadod['email'] . '</span> ' ?>
                    <span class="span-title">Telefone</span>
                    <?php echo ' <span class="span-content">' . $fetchDadod['telefone'] . '</span> ' ?>
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

                    <fieldset>
                        <label for="">Foto de perfil</label>
                        <input type="file" class="form-control" name="file">
                    </fieldset>
                    <?php
                    include "../../components/preview.php"
                    ?>
                </div>
                <div class="right-content-bottom">
                    <span class="span-title">Seus horários cadastrados</span>
                    <div class="horarios" id="horarios">

                        <!-- INPUTS GERADOS DINAMICAMENTE NO JS FICAM AQUI -->

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
    <script src="https://kit.fontawesome.com/51dc1929bd.js" crossorigin="anonymous"></script>
    <script src="../../components/password.js"></script>
    <script src="../../validations/forms.js"></script>
    <script src="../../components/preview-image.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script type="text/javascript">
        document.querySelector("#uploadPreviewTemplate > div > div > div > div:nth-child(3) > a > button").setAttribute("type", "button")
    </script>
</body>

</html>