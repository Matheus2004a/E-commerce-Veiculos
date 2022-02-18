<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mecânico</title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="stylesheet" href="../../config/setup.css">
    <link rel="stylesheet" href="../../dist/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="../../dist/bootstrap/css/bootstrap.min.css">
    <!-- BoxIcons -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <div class="flex-direction-dashboard">
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
                        <input type="search" placeholder="Pesquisar...">
                    </li>
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-home-alt icon'></i>
                                <span class="text nav-text">Home</span>
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
                                <i class='bx bxs-truck icon'></i>
                                <span class="text nav-text">Fornecedores</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bxs-wrench icon'></i>
                                <span class="text nav-text">Manutenções</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-conversation icon'></i>
                                <span class="text nav-text">Mensagens</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-cart icon'></i>
                                <span class="text nav-text">Pedidos</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bottom-content">
                    <ul>
                        <li class="">
                            <a href="../login/logout.php">
                                <i class='bx bx-log-out icon'></i>
                                <span class="text nav-text">Sair</span>
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
                    </ul>
                </div>
            </div>
        </nav>

        <main>
            <header>
                <h4>Bem - vindo, <code>Nome do Mecânico</code></h4>
                <div class="input-group">
                    <input class="form-control" type="search" placeholder="Pesquise aqui" aria-label="Search">
                </div>
            </header>

            <div class="main-content">
                <section class="section-analytics mb-3">
                    <h2>Análises</h2>
                    <div class="card mb-3" style="max-width: 540px;">
                        <div class="row g-0">
                            <div class="col-md-4">
                                <canvas id="chart-analytics"></canvas>
                            </div>
                            <div class="col-md-8">
                                <div class="card-body">
                                    <h5 class="card-title">Status de vendas</h5>
                                    <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="section-statics mb-3">
                    <div class="d-flex justify-content-between">
                        <h2>Estatísticas</h2>
                        <label>
                            <input type="date" name="" id="" class="p-2 rounded form-control">
                        </label>
                    </div>
                    <div>
                        <canvas id="myChart"></canvas>
                    </div>
                </section>

                <section class="section-status-by-region">
                    <h2>Status por região</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum quis quam ut pulvinar. Aliquam massa est, bibendum in mattis eu, varius ac diam. Donec lobortis urna consequat, tincidunt turpis sit amet, posuere mi. Aliquam congue elementum scelerisque. Vivamus a nisl ut libero blandit eleifend. Nam ac enim a neque scelerisque luctus sed laoreet lacus. Phasellus volutpat felis vitae metus viverra euismod. Proin non sapien quis nisi elementum porta. Vestibulum blandit porttitor elit, sed ornare metus convallis vel.</p>
                </section>
            </div>
        </main>
    </div>

    <script src="../../dist/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../../libs/node_modules/chart.js/dist/chart.min.js"></script>
    <script src="https://kit.fontawesome.com/51dc1929bd.js" crossorigin="anonymous"></script>
    <script src="./js/chart.js"></script>
</body>

</html>