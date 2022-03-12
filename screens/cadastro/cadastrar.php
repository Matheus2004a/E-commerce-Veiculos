<?php
  session_start();
  require __DIR__ . "/../../connection/connection.php";

  $name_complete = mysqli_real_escape_string($conn, $_POST['nome-completo']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $password = mysqli_real_escape_string($conn, password_hash($_POST['senha'], PASSWORD_DEFAULT));
  $telephone = mysqli_real_escape_string($conn, $_POST['telefone']);
  $category_user = mysqli_real_escape_string($conn, $_POST['categoria']);

  $sql = "INSERT INTO `tbl_cadastro_clientes`(`nome_completo`, `email`, `senha`, `telefone`, `categoria`) VALUES ('$name_complete','$email','$password','$telephone','$category_user')";

  if (mysqli_query($conn, $sql)) {
    $_SESSION["success-register"] = "<div class='alert alert-success d-flex align-items-center'role='alert'>
      <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>
      <div>
        Cadastro feito com sucesso
      </div>
    </div>"; 
    header("location: cadastro.php");
  } else {
    $_SESSION["unsuccess-register"] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>
    <svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
      <div>
      Usuário já cadastrado
    </div>
    </div>"; 
    header("location: cadastro.php");
  }

  mysqli_close($conn);
?>