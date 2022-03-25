<?php
session_start();
include_once 'head.html';
require __DIR__ . '/../DataBase/connection.php';
require __DIR__ .  '/../App/Controller/ClienteController.php';
require __DIR__ . '/../App/Controller/ProdutoController.php';

$user = new ClienteController();

$result = $user->isLoggedIn();
?>
<!DOCTYPE HTML>
<html>

<head>
	<?php


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
							<div id="colorlib-logo"><a href="#"><img src="../../../../images/icones/brand header.png"></a></div>
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



		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-push-2">
						<div class="row row-pb-lg">
							<?php
							$produtos = ProdutoController::allProdutos();
							foreach ($produtos as $produto) {
								echo
								'<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/' . $produto[4] . '.jpg' . ');"
											<p class="tag"><span class="new"></span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="./product-detail.php?produto=' . $produto[0] . '"><i class="icon-shopping-cart"></i></a></span> 
												</p>
											</div>
										</div>
										<div class="desc">
											<h3>' . $produto[1] . '</h3>
											<p class="price"><span>R$ ' . number_format($produto[3], 2, ",", ".") . '</span></p>
										</div>
									</div>
								</div>';
							}
							?>
							<div class="row">
								<div class="col-md-12">
									<ul class="pagination">
										<li class="disabled"><a href="#">&laquo;</a></li>
										<li class="active"><a href="#">1</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php
				require_once "footer.html";
				?>
			</div>

		</div>
		<div class="gototop js-top">
			<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
		</div>

</body>

</html>