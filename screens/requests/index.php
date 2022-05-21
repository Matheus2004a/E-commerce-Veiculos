<?php
session_start();
require __DIR__ . "/../register-products/verify-access.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de pedidos</title>
    <link rel="stylesheet" href="style.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <i class='bx bxs-user-circle icon-user'></i>
                </span>

                <div class="text logo-text">
                    <span class="name"><?php echo $_SESSION['username']; ?></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <nav class="menu-bar">
            <ul class="menu">
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
            </ul>

            <div class="bottom-content">
                <li class="">
                    <a href="../login/logout.php">
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
        </nav>
    </nav>

    <section class="home">
        <div class="text">Pedidos</div>
    </section>

    <script src="./js/main.js"></script>

</body>

</html>