<?php
session_start();
require __DIR__ . "/../../connection/connection.php";

$extensions_allows = ["jpg", "jpeg", "png"];

$name_complete = mysqli_real_escape_string($conn, $_POST['nome']);
$cpf = mysqli_real_escape_string($conn, $_POST['cpf']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, password_hash($_POST['senha'], PASSWORD_DEFAULT));
$telephone = mysqli_real_escape_string($conn, $_POST['telefone']);
$category_user = mysqli_real_escape_string($conn, $_POST['categoria']);

$cpf = str_replace('.', '', $cpf);
$cpf = str_replace('-', '', $cpf);

if (isset($_FILES['file'])) {
  $file = $_FILES['file'];

  if ($file['error']) {
    die("Falha ao carregar arquivo");
  }

  $photo_profile = $file['name'];
  $new_photo_profile = uniqid();
  $extension_file = strtolower(pathinfo($photo_profile, PATHINFO_EXTENSION));
  $local_photo_profile = $new_photo_profile . "." . $extension_file;
  $path_file = "../../images/users/" . $new_photo_profile . "." . $extension_file;

  if (in_array($extension_file, $extensions_allows)) {
    $sql = "INSERT INTO `tbl_dados_pessoais`(`cpf`, `nome`, `email`, `senha`, `telefone`, `categoria`,`foto_perfil`) VALUES ('$cpf','$name_complete','$email','$password','$telephone','$category_user','$local_photo_profile')";
    register_user($conn, $sql, $file, $path_file);
  } else {
    die("Tipo de extensão inválida.");
  }
} else {
  echo "Arquivo não enviado";
}

function register_user($conn, $sql, $file, $path)
{
  if (mysqli_query($conn, $sql) && move_uploaded_file($file['tmp_name'], $path)) {
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
}

mysqli_close($conn);
?>