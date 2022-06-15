<?php
require __DIR__ . "/../register-products/verify-access.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de pedidos</title>
    <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmação de exclusão</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Você realmente deseja excluir esse pedido? <strong>Não será possível recuperá - lo.</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Fechar</button>
                    <button type="button" class="btn btn-danger">Excluir</button>
                </div>
            </div>
        </div>
    </div>

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

        <nav class="menu-bar d-flex flex-column">
            <ul class="menu">
                <ul class="menu-links flex flex-column justify-content-between gap-3 mt-3">
                    <li>
                        <a href="../../index.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class='bx bx-bell icon'></i>
                            <span class="text nav-text">Notificações</span>
                        </a>
                    </li>

                    <li>
                        <a href="#">
                            <i class='bx bx-pie-chart-alt icon'></i>
                            <span class="text nav-text">Últimos Pedidos</span>
                        </a>
                    </li>

                    <ul class="bottom-content">
                        <li class="mb-2">
                            <a href="../login/logout.php">
                                <i class='bx bx-log-out icon'></i>
                                <span class="text nav-text">Sair</span>
                            </a>
                        </li>

                        <li class="mode">
                            <span class="sun-moon">
                                <i class='bx bx-moon icon moon'></i>
                                <i class='bx bx-sun icon sun'></i>
                            </span>
                            <p class="mode-text text">Modo Noite</p>

                            <div class="toggle-switch">
                                <span class="switch"></span>
                            </div>
                        </li>
                    </ul>
                </ul>
            </ul>
        </nav>
    </nav>

    <main class="home">
        <h1 class="text">Lista de pedidos</h1>

        <div class="container px-0 d-flex justify-content-between ms-0 mb-4">
            <form action="" method="post">
                <input type="search" name="search-prod" placeholder="Pesquise aqui" class="rounded-1">
            </form>

            <div class="content-2 d-flex gap-3">
                <a href="../register-products/index.php">
                    <button type="submit" class="btn btn-primary bg-blue-600">
                        Adicionar produto
                        <span>
                            <i class='bx bx-add-to-queue'></i>
                        </span>
                    </button>
                </a>

                <form action="" method="post">
                    <select class="form-select" aria-label="Default select example">
                        <option selected>Filtrar por</option>
                        <option value="1">Aprovado</option>
                        <option value="2">Pendente</option>
                        <option value="3">Entregue</option>
                        <option value="4">Não entregue</option>
                    </select>
                </form>
            </div>
        </div>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Clientes</th>
                    <th scope="col">Serviço</th>
                    <th scope="col">Data do pedido</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Pagamento</th>
                    <th scope="col">Entrega</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">
                        <figure class="overflow-hidden flex align-items-center gap-2">
                            <img src="https://images.unsplash.com/photo-1491528323818-fdd1faba62cc?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <figcaption>Mark</figcaption>
                        </figure>
                    </th>
                    <td>Troca de pneu</td>
                    <td>12/12/2021</td>
                    <td>R$ 400.00</td>
                    <td>10</td>
                    <td>
                        <span class='flex w-fit align-center gap-1 text-xs text-green-600 bg-green-100 p-1 rounded'>Aprovado
                            <i class='bx bx-check text-xs'></i>
                        </span>
                    </td>
                    <td>
                        <span class='status-delivery gap-2 text-red-600 bg-red-100'>Não entregue
                            <i class='bx bxs-error-circle'></i>
                        </span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Excluir
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <figure class="overflow-hidden flex align-items-center gap-2">
                            <img src="https://images.unsplash.com/photo-1550525811-e5869dd03032?ixlib=rb-1.2.1&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                            <figcaption>Ana</figcaption>
                        </figure>
                    </th>
                    <td>Troca de pneu</td>
                    <td>12/12/2021</td>
                    <td>R$ 400.00</td>
                    <td>10</td>
                    <td>
                        <span class='status-payment gap-2 text-yellow-600 bg-yellow-100'>Pendente
                            <i class='bx bx-error'></i>
                        </span>
                    </td>
                    <td>
                        <span class='status-delivery gap-2 text-red-600 bg-red-100'>Não entregue
                            <i class='bx bxs-error-circle'></i>
                        </span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Excluir
                        </button>
                    </td>
                </tr>
                <tr>
                    <th scope="row">
                        <figure class="overflow-hidden flex align-items-center gap-2">
                            <img src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2.25&w=256&h=256&q=80" alt="">
                            <figcaption>Ronaldo</figcaption>
                        </figure>
                    </th>
                    <td>Troca de pneu</td>
                    <td>12/12/2021</td>
                    <td>R$ 400.00</td>
                    <td>10</td>
                    <td>
                        <span class='status-payment gap-2 text-red-600 bg-red-100'>Bloqueado
                            <i class='bx bxs-error-circle'></i>
                        </span>
                    </td>
                    <td>
                        <span class='status-delivery gap-2 text-red-600 bg-red-100'>Não entregue
                            <i class='bx bxs-error-circle'></i>
                        </span>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Excluir
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </main>

    <script src="./js/main.js"></script>
    <script src="../../bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>