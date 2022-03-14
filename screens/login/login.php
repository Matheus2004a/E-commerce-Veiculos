<?php
	session_start();
	require __DIR__ . "/../../connection/connection.php";

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['senha']);

	if (empty($_POST['email']) && empty($_POST['senha']) && empty($_POST['submit'])) {
		$_SESSION['no-authenticated'] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>
						<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
						<div>
							Campos inválidos ou vazios
						</div>
					</div>";
		header('location: index.php');
	} else {
		$sql = "SELECT `nome_completo`, `email`, `senha` FROM `tbl_cadastro_clientes` WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
			// Percorre todos os registros na tabela
			$row = mysqli_fetch_assoc($result);
			compare_password_with_hash($password, $row);
		}
	}

	function compare_password_with_hash($password, $row){
		// Verifica se a senha digitada é igual a que está criptografada no banco
		if (password_verify($password, $row['senha'])) {
			$_SESSION['username'] = $row['nome_completo'];
			header('location: ../../screens/requests/index.php');
		} else {
			$_SESSION['no-authenticated'] = "Login ou senha incorreta";
			header('location: index.php');
		}
	}
?>