<?php 
 session_start();
 require __DIR__ . '/../DataBase/connection.php';
 require __DIR__ .  '/../App/Controller/ClienteController.php';

	$codigo = $_GET['produto'];
	$user = new ClienteController();

		//QUERY PARA LISTAR DADOS  
		$servername = "localhost";
		$username = "root";
		$password = "";
		$db_name= "carrinhoCompras";

		// Create connection
		$conn = new mysqli($servername, $username, $password,$db_name);

		// Check connection
		if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
		}

		echo "Connected successfully";
		

		$resultado = ('
		SELECT nome,descricao,valor,imagem FROM produto WHERE idProduto = '.$codigo.';');
		$resultado2 = mysqli_query($conn,$resultado);

	$linha = mysqli_fetch_array($resultado2);
	
	$nome = $linha[1];
	$imagem = $linha[3];
	$descricao = $linha[0];
	
	$preco = number_format($linha[2],2,",",".");

	$result = $user->isLoggedIn();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Store Template</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="author" content="" />

	<!-- Facebook and Twitter integration -->
	<meta property="og:title" content="" />
	<meta property="og:image" content="" />
	<meta property="og:url" content="" />
	<meta property="og:site_name" content="" />
	<meta property="og:description" content="" />
	<meta name="twitter:title" content="" />
	<meta name="twitter:image" content="" />
	<meta name="twitter:url" content="" />
	<meta name="twitter:card" content="" />

	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700" rel="stylesheet">

	<!-- Animate.css -->
	<link rel="stylesheet" href="css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="css/bootstrap.css">

	<!-- Magnific Popup -->
	<link rel="stylesheet" href="css/magnific-popup.css">

	<!-- Flexslider  -->
	<link rel="stylesheet" href="css/flexslider.css">

	<!-- Owl Carousel -->
	<link rel="stylesheet" href="css/owl.carousel.min.css">
	<link rel="stylesheet" href="css/owl.theme.default.min.css">

	<!-- Date Picker -->
	<link rel="stylesheet" href="css/bootstrap-datepicker.css">
	<!-- Flaticons  -->
	<link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

	<!-- Theme style  -->
	<link rel="stylesheet" href="css/style.css">

	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->

</head>

<body>
	<div class="colorlib-loader"></div>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="index.html">Store</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li class="has-dropdown active">
									<a href="shop.html">Shop</a>
									<ul class="dropdown">
										<li><a href="product-detail.html">Product Detail</a></li>
										<li><a href="cart.html">Shipping Cart</a></li>
										<li><a href="checkout.html">Checkout</a></li>
										<li><a href="order-complete.html">Order Complete</a></li>
										<li><a href="add-to-wishlist.html">Wishlist</a></li>
									</ul>
								</li>
								<li><a href="blog.html">Blog</a></li>
								<li><a href="about.html">About</a></li>
								<li><a href="contact.html">Contact</a></li>
								<li><a href="cart.html"><i class="icon-shopping-cart"></i> Cart [0]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
		<aside id="colorlib-hero" class="breadcrumbs">
			<div class="flexslider">
				<ul class="slides">
					<li style="background-image: url(images/cover-img-1.jpg);">
						<div class="overlay"></div>
						<div class="container-fluid">
							<div class="row">
								<div class="col-md-6 col-md-offset-3 col-sm-12 col-xs-12 slider-text">
									<div class="slider-text-inner text-center">
										<h1>Product Detail</h1>
										<h2 class="bread"><span><a href="index.html">Home</a></span> <span><a
													href="shop.html">Product</a></span> <span>Product Detail</span></h2>
									</div>
								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</aside>

		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-lg">
					<div class="col-md-10 col-md-offset-1">
						<div class="product-detail-wrap">
							<div class="row">
								<div class="col-md-5">
									<div class="product-entry">
										<?php 
											echo'
											<div class="product-img" style="background-image: url(images/'.$imagem.'.jpg);">
											<p class="tag"><span class="sale">Sale</span></p>
											</div>';
										?>
										
										<div class="thumb-nail">
											<a href="#" class="thumb-img"
												style="background-image: url(images/item-11.jpg);"></a>
											<a href="#" class="thumb-img"
												style="background-image: url(images/item-12.jpg);"></a>
											<a href="#" class="thumb-img"
												style="background-image: url(images/item-16.jpg);"></a>
										</div>
									</div>
								</div>
								<div class="col-md-7">
									<div class="desc">
										<h3><?php echo($nome); ?></h3>
										<p class="price">
											<span>R$ <?php echo($preco); ?></span>
											<span class="rate text-right">
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-full"></i>
												<i class="icon-star-half"></i>
												(74 Rating)
											</span>
										</p>
										<p><?php echo($descricao); ?>.</p>
										<div class="row row-pb-sm">
											<div class="col-md-4">
												<div class="input-group">
													<span class="input-group-btn">
														<button type="button" class="quantity-left-minus btn"
															data-type="minus" data-field="">
															<i class="icon-minus2"></i>
														</button>
													</span>
													<input type="text" id="quantity" name="quantity"
														class="form-control input-number" value="1" min="1" max="100">
													<span class="input-group-btn">
														<button type="button" class="quantity-right-plus btn"
															data-type="plus" data-field="">
															<i class="icon-plus2"></i>
														</button>
													</span>
												</div>
											</div>
										</div>
										<?php 
										echo'
										<p><a href="../App/Controller/addCarrinho.php?produto='.$codigo.'" class="btn btn-primary btn-addtocart"><i
													class="icon-shopping-cart"></i> Add to Cart</a></p>
										';
													?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			

		<?php include_once('footer.html');?>
			

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<!-- jQuery -->
	<script src="js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="js/jquery.waypoints.min.js"></script>
	<!-- Flexslider -->
	<script src="js/jquery.flexslider-min.js"></script>
	<!-- Owl carousel -->
	<script src="js/owl.carousel.min.js"></script>
	<!-- Magnific Popup -->
	<script src="js/jquery.magnific-popup.min.js"></script>
	<script src="js/magnific-popup-options.js"></script>
	<!-- Date Picker -->
	<script src="js/bootstrap-datepicker.js"></script>
	<!-- Stellar Parallax -->
	<script src="js/jquery.stellar.min.js"></script>
	<!-- Main -->
	<script src="js/main.js"></script>

	<script>
		$(document).ready(function () {

			var quantitiy = 0;
			$('.quantity-right-plus').click(function (e) {

				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				$('#quantity').val(quantity + 1);


				// Increment

			});

			$('.quantity-left-minus').click(function (e) {
				// Stop acting like a button
				e.preventDefault();
				// Get the field name
				var quantity = parseInt($('#quantity').val());

				// If is not undefined

				// Increment
				if (quantity > 0) {
					$('#quantity').val(quantity - 1);
				}
			});

		});
	</script>

</body>

</html>