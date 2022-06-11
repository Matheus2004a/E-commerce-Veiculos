<?php
session_start();
include "../../connection/connection.php";
$sql = "SELECT * FROM tbl_dados_pessoais WHERE id_dados_pessoais = " . $_SESSION['idLogado'] . " ";
$insert = mysqli_query($conn, $sql);
$fetch = mysqli_fetch_assoc($insert);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seus dados</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    include "../../components/messages-alerts/icons.php";
    include "../../components/header.php";
    ?>

    <hr>
    <main class="container bootstrap snippet">
        <div class="row">
            <div class="col-sm-10">
                <h2><?php echo $fetch['nome'] ?></h2>
            </div>
        </div>

        <?php
            if (isset($_SESSION['success'])) {
                echo $_SESSION['success'];
                unset($_SESSION['success']);
            } else if (isset($_SESSION['error'])) {
                echo $_SESSION['error'];
                unset($_SESSION['error']);
            }
        ?>
        <div class="row">
            <div class="col-sm-3">
                <div class="text-center">
                    <?php
                    if (isset($_SESSION['image']) && $_SESSION['image'] != null) {
                        echo "<img src='/../E-commerce-veiculos/images/users/" . $fetch['foto_perfil'] . " alt='avatar' width='150' class='avatar img-circle img-thumbnail'>";
                    } else {
                        echo '<a href="/../E-commerce-Veiculos/screens/DashboardMecanico/">
                        <i class="bx bxs-user-circle icon-user"></i>
                        </a>';
                    }
                    ?>
                    <h6>Entre com uma foto diferente ....</h6>
                    <input type="file" class="text-center center-block file-upload">
                </div>
            </div>

            <div class="col-sm-9">
                <div class="tab-content">
                    <div class="tab-pane active" id="home">
                        <hr>
                        <form class="form" action="trocaDados.php" method="post" id="registrationForm">
                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="first_name">
                                        <h4>Nome</h4>
                                    </label>
                                    <input type="text" class="form-control" name="nome" id="nome" placeholder="first name" title="enter your first name if any." value="<?php echo $fetch['nome'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="phone">
                                        <h4>Telefone</h4>
                                    </label>
                                    <input type="text" class="form-control" name="telefone" id="telefone" placeholder="enter phone" title="enter your phone number if any." value="<?php echo $fetch['telefone'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="email">
                                        <h4>Email</h4>
                                    </label>
                                    <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." value="<?php echo $fetch['email'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="cpf">
                                        <h4>CPF</h4>
                                    </label>
                                    <input type="text" class="form-control" name="cpf" id="cpf" title="Entre com seu CPF." value="<?php echo $fetch['cpf'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-6">
                                    <label for="categoria">
                                        <h4>Categoria</h4>
                                    </label>
                                    <input type="text" disabled class="form-control" name="categoria" id="categoria" title="Sua categoria." value="<?php echo $_SESSION['category'] ?>">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-xs-12">
                                    <br>
                                    <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Salvar</button>
                                    <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Resetar</button>
                                </div>
                            </div>
                        </form>

                        <hr>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>