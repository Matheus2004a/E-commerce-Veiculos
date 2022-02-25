<?php
<<<<<<< HEAD:screens/compras/carrinho-de-compras-em-php-master/template_store/exibe_cidade.php

require __DIR__. '../DataBase/conexao.php';
=======
	require __DIR__ . '/../../DataBase/connection.php';
>>>>>>> 5d086f1103eddf7bdddc42f7872e79d9fabce2a7:screens/compras/cart/template_store/exibe_cidade.php

	session_start();
	$Uf = isset($_GET['search']) ? $_GET['search'] : 0;

	$conn = new Conexao();
	$conn = $conn->conexao();

	$stmt = $conn->prepare('SELECT * FROM municipio WHERE estado_Uf = "'.$Uf.'" ORDER BY Nome');
	
	$stmt->execute();
	$resultado_cidades = $stmt->fetchAll();
	
	foreach($resultado_cidades as $row_cidade) { 
		echo '<option value="'.$row_cidade['Id'].'">'.$row_cidade['Nome'].'</option>';
	}
?>