<!DOCTYPE html>
<html lang="pt-br">
<?php session_start() ?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../E-commerce-Veiculos/home_alternativa/assets/css/main.css">
    <link rel="stylesheet" href="/../E-commerce-Veiculos/home_alternativa/assets/css/styles.css">
</head>

<body>
    <header class="navbar">
        <figure>
            <img src="/E-commerce/images/icones/brand header.png" alt="" srcset="">
        </figure>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div id="google_translate_element"></div>
        <nav class="navbar-links">
            <ul>
                <li><a href="/../E-commerce-veiculos/">Home</a></li>
                <li><a href="/../E-commerce-veiculos/">Sobre</a></li>

                <li><a href="/../E-commerce-veiculos/screens/listService/index.php">Serviços</a></li>
                <li><a href="/../E-commerce-veiculos/screens/compras/index.php">Compras</a></li>
                <?php

                if (isset($_SESSION['category'])) {
                    if ($_SESSION['category'] == "mecânico") {
                        echo "<li><a href='/../E-commerce-veiculos/screens/CadastrarServicos/index.php'>Cadastrar Serviço</a></li>";
                    }
                }


                if (isset($_SESSION['username']) && $_SESSION['username']) { ?>
                    <li><a href="/../E-commerce-veiculos/screens/login/logout.php">Sair</a></li>
                <?php
                } else { ?>
                    <li><a href="/../E-commerce-veiculos/screens/login/index.php">Login</a></li>
                <?php
                }
                ?>

                <?php
                if (isset($_SESSION['image'])) {
                    if ($_SESSION['image'] != null) {
                        echo '<a href="/../E-commerce-veiculos/screens/DashboardMecanico/index.php"> <li> <img src="/../E-commerce-veiculos/images/users/' . $_SESSION['image']  . '" class="img_usuario" alt=""></li> </a>';
                    } else {
                        echo '<a href="../DashboardMecanico/index.php"> <li> <img src="/../E-commerce-veiculos/images/users/default-user.png" class="img_usuario" alt=""></li> </a>';
                    }
                }

                ?>
            </ul>
        </nav>
    </header>
</body>

</html>