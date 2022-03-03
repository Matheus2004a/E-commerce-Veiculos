<?php
session_start();
include_once 'head.html';
require __DIR__ . "/../App/Controller/ClienteController.php";

$user = new ClienteController();

$result = $user->isLoggedIn();
if ($result) {
	header('Location: shop.php');
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>

<body>
	<div class="colorlib-loader"></div>

	<header>
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<p id="colorlib-logo"><a href="index.php">Use New Mic</a></p>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.php">Home</a></li>
								<li><a href="shop.php">Produtos</a></li>
								<li class="active"><a href="login.php"> Login/Cadastre-se </a></li>
								<?php
								if ($result == true) {
									echo '<li><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>';
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<main id="page">
		<div class="row">
			<div class="container" style="width: 40%;  background-color: #808080;">
				<?php
				include_once("form-login.php")
				?>
			</div>
		</div>
		<?php
		include_once 'footer.html'
		?>
	</main>
</body>

</html>