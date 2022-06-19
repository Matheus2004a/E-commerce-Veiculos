<?php session_start(); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/../E-commerce-Veiculos/home_alternativa/assets/css/main.css">
    <link rel="stylesheet" href="/../E-commerce-Veiculos/home_alternativa/assets/css/styles.css">
    <link rel="stylesheet" href="../screens/requests/style.css">
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header class="header">
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div id="google_translate_element"></div>
        <nav class="navbar">
            <figure>
                <img class="logoImage" src="/../E-commerce-Veiculos/images/icones/logo.jpg">
            </figure>
            <ul>
                <li><a href="/../E-commerce-veiculos/">Home</a></li>
                <li><a href='/../E-commerce-veiculos/screens/listService/'>Serviços</a></li>
                <li><a href='/../E-commerce-veiculos/screens/compras/'>Compras</a></li>


                <?php

                if (isset($_SESSION['category']) && $_SESSION['category'] == "cliente") {
                    echo "<li><a href='/../E-commerce-veiculos/screens/meusAgendamentos/'>Agendamentos</a></li>";
                }


                if (isset($_SESSION['category']) && $_SESSION['category'] == "mecanico") {
                    echo "<li><a href='/../E-commerce-veiculos/screens/opcoes/'>Opções</a></li>";
                }
                if (isset($_SESSION['username']) && $_SESSION['username']) {
                    echo "<li><a href='/../E-commerce-veiculos/screens/login/logout.php'>Sair</a></li>";
                } else {
                    echo "<li><a href='/../E-commerce-veiculos/screens/login/'>Login</a></li>";
                }
                ?>

                <?php


                if (isset($_SESSION['image']) && $_SESSION['category'] == "cliente") {
                    // se for mecânico não pode ir para a tela de produtos comprados e sim para o request de produtos e serviços
                    // tem que arrumar isso aqui ainda
                    if ($_SESSION['image'] != null) {
                        echo '<a href="/../E-commerce-veiculos/screens/dashboard-usuario/">
                        <li>
                            <img src="/../E-commerce-veiculos/images/users/' . $_SESSION['image']  . '" class="img_usuario" alt="">
                        </li>
                        </a>';
                    } else {
                        echo '<a href="/../E-commerce-Veiculos/screens/dashboard-usuario/">
                        <i class="bx bxs-user-circle icon-user"></i>
                        </a>';
                    }
                } elseif (isset($_SESSION['image']) && $_SESSION['category'] == "mecanico") {
                    if ($_SESSION['image'] != null) {
                        echo '<a href="/../E-commerce-veiculos/screens/dashboard-usuario/crud.php">
                        <li>
                            <img src="/../E-commerce-veiculos/images/users/' . $_SESSION['image']  . '" class="img_usuario" alt="">
                        </li>
                        </a>';
                    } else {
                        echo '<a href="/../E-commerce-Veiculos/screens/dashboard-usuario/crud.php">
                        <i class="bx bxs-user-circle icon-user"></i>
                        </a>';
                    }
                }
                ?>
            </ul>
        </nav>
    </header>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
    <script src="./components/traducao.js"></script>
</body>

</html>