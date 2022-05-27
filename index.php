<!DOCTYPE HTML>
<?php
session_start();

?>
<html>

<head>
	<title>Editorial by HTML5 UP</title>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
	<link rel="stylesheet" href="./home_alternativa/assets/css/main.css" />
	<link rel="stylesheet" href="./home_alternativa/assets/css/background_styles.css">
	<link rel="stylesheet" href="./home_alternativa/assets/css/styles.css">
</head>

<body class="is-preload">
	<header>
		<nav class="navbar">
			<figure>
				<img src="../images/icones/brand header.png" alt="" srcset="">
			</figure>
			<a href="#" class="toggle-button">
				<span class="bar"></span>
				<span class="bar"></span>
				<span class="bar"></span>
			</a>
			<div class="navbar-links">
				<ul>
					<li><a href="##">Home</a></li>
					<li><a href="##">Sobre</a></li>
					<li><a href="./screens/login/index.php">Login</a></li>
					<li><a href="./screens/compras/index.php">Compras</a></li>
					
					<li><a href="./screens/listService/index.php">Serviços</a></li>
					<li><a href="./screens/contact/contato.php">Contato</a></li>
					<?php
						if($_SESSION['category'] == "mecânico"){
							echo '<li> <a href="./screens/CadastrarServicos/index.php"> Cadastrar Serviço</a></li>';
						}
						?>
					<li><a href="./screens/login/logout.php">Sair</a></li>
					<?php 
						
					if(isset($_SESSION['image'])){
						echo'<a href="./screens/DashboardMecanico/index.php"> <li> <img src="./images/Usuarios/'.$_SESSION['image']  .'" class="img_usuario" alt=""></li> </a>';
					}else{
						unset($_SESSION['image']);
					}
					
					?>
				</ul>
			</div>
		</nav>
	</header>

	<!-- Wrapper -->
	<div id="wrapper">
		<!-- Main -->
		<div id="main">
		<div id="google_translate_element"></div>
			<div class="inner">
				<!-- Banner -->
				<section id="banner">
					<div class="content">
						<header>
							<h1>FMS<br />
							</h1>
							<p>Completamente Responsiva!</p>
						</header>
						<p>O projeto atual foi criado com o objetivo de facilitar ao público em geral a manutenção de seus veículos, a realização de compras e o agendamento de um mecânico. Reconhecemos que lembrar de fazer a manutenção básica do veículo tornou- se bastante difícil hoje. O sistema atual será dividido em duas fases para dois tipos de usuários: primeiro, um sistema de loja onde os usuários poderão cadastrar seus produtos, localizar sua loja e cadastrar os serviços que prestam. O usuário " loja " terá um nível de acesso superior ao usuário "comum" e o usuário "comum" será a base do sistema</p>
						<ul class="actions">
							<li><a href="#" class="button big">Learn More</a></li>
						</ul>
					</div>
					<span class="image object">
						<img src="./home_alternativa/images/pic10.jpg" alt="" />
					</span>
				</section>

				<!-- Section -->
				<section>
					<header class="major" id="##">
						<h2>Nossos Serviços</h2>
					</header>
					<div class="features">
						<article>
							<span class="icon fa-gem"></span>
							<div class="content">
								<h3>Chat em tempo Real</h3>
								<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam
									facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							</div>
						</article>
						<article>
							<span class="icon solid fa-paper-plane"></span>
							<div class="content">
								<h3>Agendamento de serviços</h3>
								<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam
									facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							</div>
						</article>
						<article>
							<span class="icon solid fa-rocket"></span>
							<div class="content">
								<h3>Compra e venda</h3>
								<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam
									facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							</div>
						</article>
						<article>
							<span class="icon solid fa-signal"></span>
							<div class="content">
								<h3>Um e-commerce completo</h3>
								<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam
									facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							</div>
						</article>
					</div>
				</section>

				<!-- Section -->
				<section>
					<header class="major">
						<h2>Produtos Mais Vendidos</h2>
					</header>
					<div class="posts">
						<article>
							<a href="#" class="image"><img src="./home_alternativa/images/pic01.jpg" alt="" /></a>
							<h3>Interdum aenean</h3>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam
								facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							<ul class="actions">
								<li><a href="#" class="button">More</a></li>
							</ul>
						</article>
						<article>
							<a href="#" class="image"><img src="./home_alternativa/images/pic02.jpg" alt="" /></a>
							<h3>Nulla amet dolore</h3>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam
								facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							<ul class="actions">
								<li><a href="#" class="button">More</a></li>
							</ul>
						</article>
						<article>
							<a href="#" class="image"><img src="./home_alternativa/images/pic03.jpg" alt="" /></a>
							<h3>Tempus ullamcorper</h3>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam
								facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							<ul class="actions">
								<li><a href="#" class="button">More</a></li>
							</ul>
						</article>
						<article>
							<a href="#" class="image"><img src="./home_alternativa/images/pic04.jpg" alt="" /></a>
							<h3>Sed etiam facilis</h3>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam
								facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							<ul class="actions">
								<li><a href="#" class="button">More</a></li>
							</ul>
						</article>
						<article>
							<a href="#" class="image"><img src="./home_alternativa/images/pic05.jpg" alt="" /></a>
							<h3>Feugiat lorem aenean</h3>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam
								facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							<ul class="actions">
								<li><a href="#" class="button">More</a></li>
							</ul>
						</article>
						<article>
							<a href="#" class="image"><img src="./home_alternativa/images/pic06.jpg" alt="" /></a>
							<h3>Amet varius aliquam</h3>
							<p>Aenean ornare velit lacus, ac varius enim lorem ullamcorper dolore. Proin aliquam
								facilisis ante interdum. Sed nulla amet lorem feugiat tempus aliquam.</p>
							<ul class="actions">
								<li><a href="#" class="button">More</a></li>
							</ul>
						</article>
					</div>
				</section>
			</div>
		</div>
	</div>

	<!-- Scripts -->
	<script src="./components/traducao.js"></script>
	<script src="./home_alternativa/assets/js/jquery.min.js"></script>
	<script src="./home_alternativa/assets/js/browser.min.js"></script>
	<script src="./home_alternativa/assets/js/breakpoints.min.js"></script>
	<script src="./home_alternativa/assets/js/util.js"></script>
	<script src="./home_alternativa/assets/js/main.js"></script>
	<script src="./home_alternativa/assets/js/script.js"></script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
</body>

</html>