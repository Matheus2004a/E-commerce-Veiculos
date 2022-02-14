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
</head>

<body>
    <div class="flex-direction-dashboard">
        <div class="sidebar">
            <a href="" class="brand">
                <figure>
                    <img src="../../dist/img/AdminLTELogo.png" alt="brand-dashboard">
                </figure>
            </a>

            <nav>
                <ul>
                    <li>
                        <span>
                            <i class="fa-solid fa-house"></i>
                        </span>
                        <a href="">Home</a>
                    </li>
                    <li>
                        <span>
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </span>
                        <a href="">Pesquisar</a>
                    </li>
                    <li>
                        <span>
                            <i class="fa-solid fa-user"></i>
                        </span>
                        <a href="">Minha conta</a>
                    </li>
                    <li>
                        <span>
                            <i class="fa-solid fa-bell"></i>
                            <span>
                                <i class="fa-solid fa-circle circle-notification"></i>
                            </span>
                        </span>
                        <a href="">Notificações</a>
                    </li>
                    <li>
                        <span>
                            <i class="fa-solid fa-truck"></i>
                        </span>
                        <a href="">Fornecedores</a>
                    </li>
                    <li>
                        <span>
                            <i class="fa-solid fa-wrench"></i>
                        </span>
                        <a href="">Manutenções</a>
                    </li>
                    <li>
                        <span>
                            <i class="fa-solid fa-credit-card"></i>
                        </span>
                        <a href="">Pagamentos</a>
                    </li>
                    <li>
                        <span>
                            <i class="fa-solid fa-message"></i>
                        </span>
                        <a href="">Conversas</a>
                    </li>
                    <li>
                        <span>
                            <i class="fa-solid fa-cart-shopping"></i>
                        </span>
                        <a href="">Pedidos</a>
                    </li>
                    <li>
                        <span>
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                        </span>
                        <a href="../login/logout.php">Logout</a>
                    </li>
                </ul>
            </nav>
        </div>

        <main>
            <header>
                <h4>Bem - vindo, <code>Nome do Mecânico</code></h4>
                <div class="input-group">
                    <input class="form-control me-2" type="search" placeholder="Pesquise aqui" aria-label="Search">
                </div>
            </header>

            <div class="main-content">
                <section class="section-analytics">
                    <h2>Análises</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed dictum quis quam ut pulvinar. Aliquam massa est, bibendum in mattis eu, varius ac diam. Donec lobortis urna consequat, tincidunt turpis sit amet, posuere mi. Aliquam congue elementum scelerisque. Vivamus a nisl ut libero blandit eleifend. Nam ac enim a neque scelerisque luctus sed laoreet lacus. Phasellus volutpat felis vitae metus viverra euismod. Proin non sapien quis nisi elementum porta. Vestibulum blandit porttitor elit, sed ornare metus convallis vel.</p>
                </section>
                
                <section class="section-statics">
                    <h2>Estatísticas</h2>
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