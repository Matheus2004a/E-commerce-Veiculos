<?php

require __DIR__ . "/../../connection/connection.php";
require __DIR__ . "/../register-products/verify-access.php";

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus serviços</title>
    <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <!-- Boxicons CSS -->
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?php
    require __DIR__ . "/../../components/messages-alerts/icons.php";
    session_start();

    $filter_name = mysqli_real_escape_string($conn, $_GET['name_service']) ?? '';
    $filter_options = mysqli_real_escape_string($conn, $_POST['filter_option']) ?? '';

    if ($filter_name != '') {
        $sql = "SELECT * FROM dados_servicos WHERE nome_servico = '" . $_GET['name_service'] . "'";
    } else {
        if($filter_options != '') {
            $sql = "SELECT * FROM dados_servicos WHERE id_dados_pessoais = " . $_SESSION['idLogado'] . " ORDER BY ".$filter_options."";
        } else {
            $sql = "SELECT * FROM dados_servicos WHERE id_dados_pessoais = " . $_SESSION['idLogado'] . "";
        }
    }

    $result = mysqli_query($conn, $sql);
    ?>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <?php
                if (isset($_SESSION['image'])) {
                    echo "<figure class='image'>
                            <img src='/../E-commerce-veiculos/images/users/" . $_SESSION['image'] . "' class='photo-profile'>
                        </figure>";
                    unset($_SESSION['photo-profile']);
                } else {
                    echo "<span class='image'><i class='bx bxs-user-circle icon-user'></i></span>";
                }
                ?>
                <p class="text logo-text name"><?php echo $_SESSION['username']; ?></p>
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
                        <a href="../opcoes/index.php">
                            <i class='bx bx-menu icon'></i>
                            <span class="text nav-text">Opções</span>
                        </a>
                    </li>

                    <li>
                        <a href="../requests/index.php">
                            <i class='bx bx-box icon'></i>
                            <span class="text nav-text">Vendas</span>
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
        <h1 class="text">Lista de serviços</h1>

        <div class="container px-0 d-flex justify-content-between ms-0 mb-4">
            <form action="" method="GET">
                <input type="search" name="name_service" placeholder="Pesquise aqui" class="rounded-1">
            </form>

            <div class="content-2 d-flex gap-3">
                <a href="../CadastrarServicos/index.php">
                    <button type="submit" class="btn btn-primary bg-blue-600">
                        Adicionar Serviço
                        <span>
                            <i class='bx bx-add-to-queue'></i>
                        </span>
                    </button>
                </a>

                <form class="flex gap-2 w-2/4" action="" method="POST" id="order">
                    <select class="form-select" name="filter_option" aria-label="select">
                        <option selected disabled>Filtrar por</option>
                        <option value="nome_servico">Serviço de A à Z</option>
                        <option value="val_servico">Valor</option>
                        <option value="">Limpar filtro</option>
                    </select>
                </form>
            </div>
        </div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Serviço</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Imagem</th>
                    <th scope="col">Status</th>
                    <th scope="col">Agendamento</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $url = "../agendamentos/index.php";
                if (mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {

                        if ($row['nome_servico'] == null) {
                            $_SESSION['nome_servico'] = "<span>teste</span>";
                        } else {
                            $_SESSION['nome_servico'] = $row['nome_servico'];
                        }

                        if ($row['desc_servico'] == null) {
                            $_SESSION['desc_servico'] = "<span>-- Sem descrição --</span";
                        } else {
                            $_SESSION['desc_servico'] = $row['desc_servico'];
                        }

                        // $date = implode("/", array_reverse(explode("-", $row['data_pedido'])));
                        $_SESSION['val_servico'] = $row['val_servico'];

                        if ($row['img_servico'] == null) {
                            $_SESSION['img_servico'] = "<figure>
                            <img class='photo-client bg-slate-300' src=" . $row['img_servico'] . ">
                        </figure>";
                        } else {
                            $_SESSION['img_servico'] = "<figure>
                            <img class='photo-client bg-slate-300' src=" . $row['img_servico'] . ">
                        </figure>";
                        }
                        echo "<tr>
                        <td>" . $_SESSION['nome_servico'] . "</td>
                        <td>" . "DESCRIÇÃO AQUI" . "</td> 
                            <td>R$ " . number_format($_SESSION['val_servico'], 2, ",", ".") . "</td>
                            <td>" . $_SESSION['img_servico'] . "</td>
                            ";
                        if ($row['status'] == 0) {
                            echo "<td>
                                <span class='status-payment gap-2 text-xs text-green-600 bg-green-100 p-1 rounded'>
                                    Ativo
                                <i class='bx bx-check text-xs'></i>
                                </span>
                                <form action='status.php' method='post'>
                                    <input type='hidden' name='status'  value='1'>
                                    <input type='hidden' name='id_servico'  value='".$row['id_servico']."'>
                                    <button>Desativar</button>
                                    </form>
                                    </td>";
                                } else {
                                    echo "<td>
                                    <span class='status-payment gap-2 text-red-600 bg-red-100'>Desativado
                                    <i class='bx bxs-error-circle'></i>
                                    </span>
                                    <form action='status.php' method='post'>
                                    <input type='hidden' name='status' value='0'>
                                    <input type='hidden' name='id_servico'  value='".$row['id_servico']."'>
                                    <button>Ativar</button>
                                </form>
                                </td>";
                        }
                        echo "
                        <td><button onclick='agendamento(" . $row['id_servico'] . ")'>Abrir</button></td>
                        
                        </tr>";
                    }
                } else {
                    $_SESSION['error'] = "<div class='alert alert-warning d-flex align-items-center' role='alert'>
                        <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Warning:'><use xlink:href='#exclamation-triangle-fill'/></svg>
                        <div>
                          Usuários não encontrados
                        </div>
                    </div>";
                }

                ?>
            </tbody>
        </table>
        <?php
        if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }

        ?>
    </main>
    <script>
        function agendamento(id_servico) {
            open(`/../E-commerce-veiculos/screens/agendamentos/index.php?id_servico=${id_servico}`, "_PARENT")
        }
    </script>
    <script src="./js/main.js"></script>
    <script src="../home/js/main.js"></script>
    <script src="../../bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
mysqli_close($conn);
?>