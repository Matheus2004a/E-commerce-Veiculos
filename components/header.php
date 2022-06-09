<!DOCTYPE html>
<html lang="pt-br">
<?php  session_start()?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../screens/home/css/style.css">
</head>

<body>
    <header class="navbar">
        <figure>
            <img src="./images/icones/brand header.png" alt="" srcset="">
        </figure>
        <a href="#" class="toggle-button">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div id="google_translate_element"></div>
        <nav class="navbar-links">
            <ul>
                <li><a href="##">Home</a></li>
                <li><a href="##">Sobre</a></li>
                <li><a href="./screens/login/index.php">Login</a></li>
                <li><a href="./screens/compras/index.php">Compras</a></li>
                <li><a href="./screens/listService/index.php">Serviços</a></li>
                <?php
                if (isset($_SESSION['username']) && $_SESSION['username']) { ?>
                    <li><a href="./screens/login/logout.php">Sair</a></li>
                <?php
                }
                ?>
            </ul>
        </nav>
    </header>
</body>

</html>