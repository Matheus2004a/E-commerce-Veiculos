<?php
session_start();
require "../../connection/connection.php";

$nome = mysqli_real_escape_string($conn, $_POST['nome']);
$telefone = mysqli_real_escape_string($conn, $_POST['telefone']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$cpf = mysqli_real_escape_string($conn, $_POST['cpf']);

$sql = "UPDATE tbl_dados_pessoais SET nome = '$nome', cpf = '$cpf', email = '$email', telefone = '$telefone' WHERE id_dados_pessoais = " . $_SESSION['idLogado'] . "";
$select = "SELECT `id_dados_pessoais`, `cpf`, `nome`, `email`, `senha`, `telefone`, `categoria`, `foto_perfil` FROM `tbl_dados_pessoais` WHERE WHERE id_dados_pessoais = " . $_SESSION['idLogado'] . "";

if ($result_query = mysqli_query($conn, $select)) {
    unset($_SESSION['username']);
    $rows_result = mysqli_fetch_assoc($result_query);
    $_SESSION['username'] = $rows_result['nome'];

    echo "<script>alert(". $_SESSION['username'].")</script>";

    $_SESSION['success'] = "<div class='alert alert-success' role='alert'>
    Dados atualizado com sucesso !!!
    </div>";
    header("location: crud.php");
} else {
    $_SESSION['error'] = "<div class='alert alert-danger' role='alert'>
    Erro ao atualizar dados !!!
    </div>";
    header("location: crud.php");
}
?>