<?php
session_start();
include_once 'head.html';
require __DIR__ .  '/../App/Controller/ClienteController.php';

$user = new ClienteController();

$result = $user->isLoggedIn();
?>

<!DOCTYPE HTML>	
<html>

<head>
	<?php
	include_once("head.html")
	?>
</head>

<body>

	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.php">Use New Mic</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="shop.php">Produtos</a></li>
								<?php
								if ($result == true) {
									echo '<li><a href="list.php"> Seus Produtos </a></li>';

									echo '<li><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
											<li><a href="../App/Controller/logout.php"> Sair </a></li>';
								} else {
									echo '<li><a href="login.php"> Login/Cadastre-se </a></li>';
								}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>


			<?php
			include_once("footer.html")
			?>
		</aside>
	</div>

</body>

</html>