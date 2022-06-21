<?php
require __DIR__ . "/../register-products/verify-access.php";
require __DIR__ . "/../../connection/connection.php";
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
    <?php
    include "../../components/messages-alerts/icons.php";
    $search_user = $_POST['search'] ?? '';
    $sql = "SELECT * FROM vw_dados_pedidos WHERE nome LIKE '%$search_user%' ORDER BY nome";

    $filter = $_POST['filter-status'] ?? "";
    echo $filter;

    if ($filter == 1) {
        $sql = "SELECT * FROM `vw_dados_pedidos` WHERE status_pagto = 1";
    } elseif ($filter == 2) {
        $sql = "SELECT * FROM `vw_dados_pedidos` WHERE status_pagto = 2";
    } elseif ($filter == 3) {
        $sql = "SELECT * FROM `vw_dados_pedidos` WHERE status_entrega = 2";
    } elseif ($filter == 4) {
        $sql = "SELECT * FROM `vw_dados_pedidos` WHERE status_entrega = 3";
    } else {
        $sql = "SELECT * FROM vw_dados_pedidos WHERE nome LIKE '%$search_user%' ORDER BY nome";
    }

    $result_requests = mysqli_query($conn, $sql);
    ?>

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
                    </ul>
                </ul>
            </ul>
        </nav>
    </nav>

    <main class="home">
        <h1 class="text">Lista de pedidos</h1>

        <div class="container px-0 d-flex justify-content-between ms-0 mb-4">
            <form action="" method="post">
                <input type="search" name="search" placeholder="Pesquise aqui" class="rounded-1">
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

                <form action="" method="post" id="order">
                    <select class="form-select" name="filter-status" aria-label="Default select example">
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
                </tr>
            </thead>
            <tbody>
                <?php
                if (mysqli_num_rows($result_requests) > 0) {
                    while ($row = mysqli_fetch_assoc($result_requests)) { ?>
                        <tr>
                            <th scope="row">
                                <figure class="overflow-hidden flex align-items-center gap-2">
                                    <?php
                                    if (isset($row['foto_perfil'])) {
                                        echo "<a href='/../E-commerce-Veiculos/screens/dashboard-usuario/'>
                                            <i class='bx bxs-user-circle icon-user'></i>
                                            </a>";
                                    } else {
                                        echo "<a href='/../E-commerce-Veiculos/screens/dashboard-usuario/'>
                                            <img src=" . $row['foto_perfil'] . "></img>
                                            </a>";
                                    }
                                    ?>
                                    <figcaption><?php echo $row['nome'] ?></figcaption>
                                </figure>
                            </th>
                            <td>Troca de pneu</td>
                            <td><?php echo implode("/", array_reverse(explode("-", $row['data_pedido']))) ?></td>
                            <td><?php echo "R$ " . $row['total_preco_prod'] ?></td>
                            <td><?php echo $row['qtd_prod'] ?></td>
                            <td>
                                <?php
                                if ($row['status_pagto'] == 1) {
                                    echo "<span class='status-payment gap-2 text-green-600 bg-green-100'>
                                        Aprovado
                                        <i class='bx bx-check'></i>
                                    </span>";
                                } else if ($row['status_pagto'] == 2) {
                                    echo "<span class='status-payment gap-2 text-yellow-600 bg-yellow-100'>
                                        Pendente
                                        <i class='bx bx-error'></i>
                                    </span>";
                                } else {
                                    echo "<span class='status-payment gap-2 text-red-600 bg-red-100'>
                                        Bloqueado
                                        <i class='bx bx-error'></i>
                                    </span>";
                                }
                                ?>
                            </td>
                            <td>
                                <?php
                                if ($row['status_entrega'] == 1) {
                                    echo "<span class='status-delivery gap-2 text-red-600 bg-red-100'>Não entregue
                                        <i class='bx bxs-error-circle'></i>
                                    </span>";
                                } else if ($row['status_entrega'] == 2) {
                                    echo "<span class='status-delivery gap-2 text-green-600 bg-green-100'>Entregue
                                        <i class='bx bx-check'></i>
                                    </span>";
                                } else {
                                    echo "<span class='status-delivery gap-2 text-yellow-600 bg-yellow-100'>Pendente
                                        <i class='bx bx-error'></i>
                                    </span>";
                                }
                                ?>
                            </td>
                        </tr>
                    <?php
                    }
                } else { ?>
                    <div class='alert alert-warning flex items-center w-full' role='alert'>
                        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'>
                            <use xlink:href='#exclamation-triangle-fill' />
                        </svg>
                        <div>
                            Nenhum pedido realizado
                        </div>
                    </div>
                <?php
                }
                mysqli_close($conn);
                ?>
            </tbody>
        </table>
    </main>

    <script src="./js/main.js"></script>
    <script src="../home/js/main.js"></script>
    <script src="../../bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>