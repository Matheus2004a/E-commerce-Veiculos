<?php
	session_start();
	require __DIR__ . "/../../connection/connection.php";

	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['senha']);

	if (isset($_POST['email']) && isset($_POST['senha'])) {
		$sql = "SELECT `nome_completo`, `email`, `senha`, `categoria` FROM `tbl_cadastro_clientes` WHERE email = '$email'";
		$result = mysqli_query($conn, $sql);
		
		if ($result) {
			// Percorre todos os registros na tabela
			$row = mysqli_fetch_assoc($result);
			compare_password_with_hash($password, $row);
		}
	} else {
		$_SESSION['no-authenticated'] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>
			<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div>
					Campos inválidos ou vazios
				</div>
			</div>";
		header('location: index.php');
	}

	function compare_password_with_hash($password, $row){
		// Verifica se a senha digitada é igual a que está criptografada no banco
		if (password_verify($password, $row['senha'])) {
			$_SESSION['username'] = $row['nome_completo'];
			$_SESSION['category'] = $row['categoria'];
			header('location: ../../screens/requests/index.php');
		} else {
			$_SESSION['no-authenticated'] = "<div class='alert alert-danger d-flex align-items-center' role='alert'>
				<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
				<div>
					Login ou senha incorreta
				</div>
			</div>";
			header('location: index.php');
		}
	}
?>