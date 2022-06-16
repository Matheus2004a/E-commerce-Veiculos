<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="style.css">
	<title>Document</title>
</head>

<body>

	<?php include "../../components/header.php" ?>
	<h1>Área administrativa</h1>

	<div class="container">
		<ul>
			<li>
				<button onclick="goTo('screens/register-products/')">
					Cadastrar produtos
				</button>
			</li>
			<li>
				<button onclick="goTo('screens/requests/')">
					Vendas
				</button>
			</li>
			<li>
				<button onclick="goTo('screens/CadastrarServicos/')">
					Cadastrar serviços
				</button>
			</li>
			<li>
				<button onclick="goTo('screens/meusServicos/')">
					Serviços
				</button>
			</li>
			
			<li>
				<button >
					Alterar ou excluir Produto "não sei oq por aqui"
				</button>
			</li>
			<li>
				<button onclick="goTo('screens/dashboard-usuario/crud.php')">
					Perfil
				</button>
			</li>
			<li>
				<button onclick="goTo('screens/chat/')">
					Chat
				</button>
			</li>
			<li>
				<button onclick="goTo('screens/login/')">
					Sair
				 </button>
			</li>
		</ul>
	</div>

	<script>
		function goTo(page) {
			window.open(`/../E-commerce-veiculos/${page}`, "_PARENT")
		}
	</script>
</body>

</html>