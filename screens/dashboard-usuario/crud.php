<?php
require "../../connection/connection.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seus dados</title>
    <link rel="stylesheet" href="../../bootstrap-5.1.3-dist/css/bootstrap.min.css">
</head>

<body>
    <?php
    include "../../components/messages-alerts/icons.php";
    include "../../components/header.php";

    $sql = "SELECT * FROM tbl_dados_pessoais WHERE id_dados_pessoais = " . $_SESSION['idLogado'] . " ";
    $insert = mysqli_query($conn, $sql);
    $fetch = mysqli_fetch_assoc($insert);
    ?>

    <hr>
    <main class="container bootstrap snippet">
        <h2><?php echo $fetch['nome'] ?></h2>

        <?php
        if (isset($_SESSION['success'])) {
            echo $_SESSION['success'];
            unset($_SESSION['success']);
        } else if (isset($_SESSION['error'])) {
            echo $_SESSION['error'];
            unset($_SESSION['error']);
        }
        ?>
        <div class="profile">
            <section>
                <div class="text-center">
                    <?php
                    if (isset($_SESSION['image']) && $_SESSION['image'] != null) {
                        echo "<img src='/../E-commerce-veiculos/images/users/" . $fetch['foto_perfil'] . "' alt='avatar' width='150' class='avatar img-circle img-thumbnail'>";
                    } else {
                        echo '<a href="/../E-commerce-Veiculos/screens/DashboardMecanico/">
                        <i class="bx bxs-user-circle icon-user"></i>
                        </a>';
                    }
                    ?>
                    <h6>Entre com uma foto diferente ....</h6>
                    <input type="file" class="text-center center-block file-upload">
                </div>
            </section>

            <section>
                <form class="form" action="trocaDados.php" method="post" id="registrationForm">
                    <fieldset>
                        <label for="first_name">Nome</label>
                        <input type="text" class="form-control" name="nome" id="nome" placeholder="first name" title="enter your first name if any." value="<?php echo $fetch['nome'] ?>">
                    </fieldset>

                    <fieldset>
                        <label for="phone">Telefone</label>
                        <input type="text" class="form-control" name="telefone" id="telefone" placeholder="enter phone" title="enter your phone number if any." value="<?php echo $fetch['telefone'] ?>">
                    </fieldset>

                    <fieldset>
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="email" placeholder="you@email.com" title="enter your email." value="<?php echo $fetch['email'] ?>">
                    </fieldset>

                    <fieldset>
                        <label for="cpf">CPF</label>
                        <input type="text" class="form-control" name="cpf" id="cpf" title="Entre com seu CPF." value="<?php echo $fetch['cpf'] ?>">
                    </fieldset>

                    <fieldset>
                        <label for="categoria">Categoria </label>
                        <input type="text" disabled class="form-control" name="categoria" id="categoria" title="Sua categoria." value="<?php echo $_SESSION['category'] ?>">
                    </fieldset>

                    <div class="col-xs-12">
                        <button class="btn btn-lg btn-success" type="submit"><i class="glyphicon glyphicon-ok-sign"></i>Salvar</button>
                        <button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Resetar</button>
                    </div>
                </form>
            </section>
        </div>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>