<?php
session_start();
require __DIR__ . "/../../connection/connection.php";

$name_complete = mysqli_real_escape_string($conn, $_POST['nome']);
$cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
$photo_profile = mysqli_real_escape_string($conn, $_POST['profile']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, password_hash($_POST['senha'], PASSWORD_DEFAULT));
$telephone = mysqli_real_escape_string($conn, $_POST['telefone']);
$category_user = mysqli_real_escape_string($conn, $_POST['categoria']);

$sql = "INSERT INTO `tbl_dados_pessoais`(`cpf`, `nome`, `email`, `senha`, `telefone`, `categoria`,`foto_perfil`) VALUES ('$cpf','$name_complete','$email','$password','$telephone','$category_user''$photo_profile')";

if (mysqli_query($conn, $sql)) {
  $_SESSION["success-register"] = "<div class='alert alert-success d-flex align-items-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
    <div>
      Cadastro realizado com sucesso
    </div>
  </div>";
  header("location: index.php");
} else {
  $_SESSION["unsuccess-register"] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>
            <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
            <div>
              Usuário já cadastrado
            </div>
            </div>";
  header("location: index.php");
}

mysqli_close($conn);
?>