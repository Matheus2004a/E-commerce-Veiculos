<?php
require __DIR__ . "/../../connection/connection.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes agendados</title>
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


    $filter_name = mysqli_real_escape_string($conn, $_POST['search']) ?? '';
    $filter_options = mysqli_real_escape_string($conn, $_POST['filter_option']) ?? '';

    $sql_idCliente = "SELECT id_cliente from tbl_clientes WHERE fk_id_dados_pessoais = " . $_SESSION['idLogado'] . "";
    $cliente = mysqli_query($conn, $sql_idCliente);
    $dados_cliente = mysqli_fetch_array($cliente);

    if ($filter_name != '') {
        $sql = "SELECT * FROM servicos_agendados WHERE fk_id_cliente = " . $dados_cliente['id_cliente'] . " AND nome_servico LIKE '%" . $_POST['search'] . "%'";
    } else {
        if ($filter_options != '') {
            $sql = "SELECT * FROM servicos_agendados WHERE fk_id_cliente = " . $dados_cliente['id_cliente'] . " ORDER BY " . $filter_options . "";
        } else {
            $sql = "SELECT * FROM servicos_agendados WHERE fk_id_cliente = " . $dados_cliente['id_cliente'] . "";
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
                        <a href="../dashboard-usuario/index.php">
                            <i class='bx bx-user icon'></i>
                            <span class="text nav-text">Perfil</span>
                        </a>
                    </li>

                    <li>
                        <a href="../listService/index.php">
                            <i class='bx bx-arrow-back icon'></i>
                            <span class="text nav-text">Voltar para serviços</span>
                        </a>
                    </li>

                    <li>
                        <a href="../compras/index.php">
                            <i class='bx bx-store icon'></i>
                            <span class="text nav-text">Compras</span>
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
        <h1 class="text">Serviços agendados</h1>

        <div class="container px-0 d-flex justify-content-between ms-0 mb-4">
            <form action="" method="POST">
                <input type="search" name="search" placeholder="Pesquise o seviço" class="rounded-1">
            </form>

            <div class="content-3 d-flex gap-3">
                <a href="../listService/index.php">
                    <button type="submit" class="btn btn-primary bg-blue-600">
                        Agendar novo serviço
                        <span>
                            <i class='bx bx-add-to-queue'></i>
                        </span>
                    </button>
                </a>

                <form class="flex gap-2 w-2/4" action="" method="POST" id="order">
                    <select class="form-select" name="filter_option" aria-label="select">
                        <option selected disabled>Filtrar por</option>
                        <option value="nome_servico">Serviço de A à Z</option>
                        <option value="data_agend">Data</option>
                        <option value="hora_agend">Hora</option>
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
                    <th scope="col">Data do serviço</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Mecânico</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    
                    $data = implode("/", array_reverse(explode("-", $row['data_agend'])));
                    $hora = substr($row['hora_agend'], 0, 5);
                    echo '<tr>
                        <th scope="row">' . $row['nome_servico'] . '</th>
                        <td>' . $data . '</td>
                        <td>' . $hora . '</td>
                        <td>R$' . $row['val_servico'] . '</td>
                        <td>' . $row['mecanico'] . '</td>
                    </tr>';
                }

                ?>


            </tbody>
        </table>
    </main>

    <script src="./js/main.js"></script>
    <script src="../home/js/main.js"></script>
    <script src="../../bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>
</body>
<?php mysqli_close($conn) ?>

</html>