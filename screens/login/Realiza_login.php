
<?php
session_start();
include('../ConectaBanco.php');

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('location: ./Login.php');
	exit();
}

$usuario = mysqli_real_escape_string($conn, $_POST['usuario']);
$senha = mysqli_real_escape_string($conn, $_POST['senha']);

$query = "SELECT usuario FROM realiza_login WHERE usuario = '{$usuario}' AND senha = md5('{$senha}')";

$result = mysqli_query($conn, $query);

$row = mysqli_num_rows($result);

if ($row == 1) {
	header('location: ../Dashboard_USU/Dashboard-Usuário.php');
	exit();
} else {
	$_SESSION['nao_autenticado'] = true;
	header('location: ./Login.php');
	exit();
}