<?php
session_start();
include "../../connection/connection.php";

$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$email = $_POST['email'];
$cpf = $_POST['cpf'];

$sql = "UPDATE tbl_dados_pessoais SET nome = '.$nome.', cpf = '.$cpf.', email = '.$email.', telefone = '.$telefone.' WHERE id_dados_pessoais = " . $_SESSION['idLogado'] . " ";


?>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <?php
    if (mysqli_query($conn, $sql)) {
        echo '
        <div class="alert alert-success" role="alert">
         Atualizado com sucesso !!!
        </div>';
    } else {
        echo '
        <div class="alert alert-danger" role="alert">
            Erro ao atualizar !!!
        </div>';
    }

    ?>
</body>
    <script>
        setTimeout(function(){
            window.location.href('../index.php');
        },5000);
    </script>
</html>