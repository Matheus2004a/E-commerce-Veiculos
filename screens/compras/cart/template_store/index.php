<?php
	session_start();
	require_once 'head.html';
	require __DIR__. '../App/Controller/ProdutoController.php';
	require __DIR__.'../App/Controller/CarrinhoController.php';
	require __DIR__.'../App/Controller/ClienteController.php';
	
	$user = new ClienteController();
	$result = $user->isLoggedIn();	
?>

<!DOCTYPE HTML>
<html>
	
	<body>
		<head>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
			<style>
				.procurar_opcao{
					border: #666 solid 1px;
				}
				#lupa{
				float:left;
				margin-right: -50px;
				cursor:pointer
				}

				/* formatação do conteúdo  */
				#lupa:after{
				font-family:FontAwesome;
				font-size:14px;
				content:"\f002"
				}
			</style>
		</head>
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
								
								<?php
									if ($result == true) {
										echo '<li><a href="list.php"> Seus Produtos </a></li>';

										echo '
											<li><a href="cart.php"><i class="icon-shopping-cart"></i> Carrinho </a></li>
											<li><a href="../App/Controller/logout.php"> Sair </a></li>';
									}else{
										echo '<li><a href="login.php"> Login/Cadastre-se </a></li>';
									}
								?>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero" class="breadcrumbs">
		<h1 style="display: inline-block;"> Produtos</h1>
		<div class="selectOption" style="display: inline-block; margin-left:1000px">
					<input type="search" class="procurar_opcao" placeholder="Procurar">
				<img src="./images/Icons/search.png" class="lupa">
				</div>

			

		<div class="colorlib-shop" style="margin-top: 100px;">
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
										<div class="product-img" style="background-image: url(images/'.$produto[4].'.jpg'.');"
											<p class="tag"><span class="new"></span></p>
											<div class="cart">
												<p>
													<span class="addtocart"><a href="../App/Controller/addCarrinho.php?produto='.$produto[0].'"><i class="icon-shopping-cart"></i></a></span> 
												</p>
											</div>
										</div>
										<div class="desc">
											<h3>'.$produto[1].'</h3>
											<p class="price" style=" color:black;"><span>R$ '.number_format($produto[3],2,",",".").'</span></p>
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
					include_once("footer.html");
				?>
			</div>

		</div>
	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	
	</body>
</html>

