<?php
session_start();
require __DIR__ . "/../../connection/connection.php";

if (empty($_POST['email']) && empty($_POST['senha']) && empty($_POST['submit'])) {
	$_SESSION['nao_autenticado'] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>
		<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
		<div>
		Campos inválidos ou vazios
		</div>
	</div>";
	header('location: login.php');
	exit();
}

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['senha']);

$sql = "SELECT `email`, `senha` FROM `cadastro_clientes` WHERE email = '$email' AND senha = '$password'";

$result = mysqli_query($conn, $sql);

$row = mysqli_num_rows($result);

if ($row == 1) {
	$_SESSION['username'] = $email;
	header('location: ../dashboard-clientes/Dashboard-Usuario.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('location: login.php');
	exit();
}
?>