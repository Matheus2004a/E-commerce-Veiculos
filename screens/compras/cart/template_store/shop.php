<?php

	session_start();
	require_once 'head.html';
	require __DIR__ . '/../App/Controller/ProdutoController.php';
	require __DIR__ . '/../App/Controller/CarrinhoController.php';
	require __DIR__ . '/../App/Controller/ClienteController.php';
	
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
							<div id="colorlib-logo"><a href="index.php"><img src="../../../../images/icones/brand header.png" alt=""></a></div>
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
			<a href="">dawd</a>

</body>


		<div class="colorlib-shop">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-push-2">
						<div class="row row-pb-lg">
							<?php
								$produtos = ProdutoController::allProdutos();
								foreach ($produtos as $produto) {
									echo
								'<form action="descricaoProd.php" method="POST">
								<div class="col-md-4 text-center">
									<div class="product-entry">
										<div class="product-img" style="background-image: url(images/'.$produto[4].'.jpg'.');"
											<p class="tag"><span class="new"></span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><button type="submit" > </button>"<i class="icon-shopping-cart"></i></a></span> 
												</p>
											</div>
										</div>
										<div class="desc">
											<h3 value="'.$produto[1].' ">'.$produto[1].'</h3>
											<p class="price" style="display:inline-block">R$ ' . number_format($produto[3],2,",",".").'</p>
											<img src="images/icons/carrinho-de-compras.png" style="display:inline-block;">
										</div>
										<div> 
											<img src="images/icons/star.png" > 
											<img src="images/icons/star.png" > 
											<img src="images/icons/star.png" > 
											<img src="images/icons/star.png" > 
											</div>
									</div>
								</div>
								</form>';	
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