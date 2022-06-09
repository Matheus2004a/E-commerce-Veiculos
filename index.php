<?php
require "./connection/connection.php";
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<title>EPA | Home</title>
	<link rel="stylesheet" href="./home_alternativa/assets/css/main.css">
	<link rel="stylesheet" href="./home_alternativa/assets/css/styles.css">
	<link rel="stylesheet" href="./components/styles/button_top_page.css">
</head>

<body>
	<a name="top-page"></a>

	<?php
	require "./components/header.php";
	?>

	<main>
		<section id="banner">
			<div class="content">
				<header>
					<h1>EPA</h1>
				</header>
				<p>O projeto atual foi criado com o objetivo de facilitar ao público em geral a manutenção de seus veículos, a realização de compras e o agendamento de um mecânico. Reconhecemos que lembrar de fazer a manutenção básica do veículo tornou- se bastante difícil hoje. O sistema atual será dividido em duas fases para dois tipos de usuários: primeiro, um sistema de loja onde os usuários poderão cadastrar seus produtos, localizar sua loja e cadastrar os serviços que prestam. O usuário " loja " terá um nível de acesso superior ao usuário "comum" e o usuário "comum" será a base do sistema</p>
				<button class="button big">Saiba mais</button>
			</div>
			<div class="image object">
				<img class="mySlides" src="./images/cars/car_1.jpg">
				<img class="mySlides" src="./images/cars/car_2.jpg">
				<img class="mySlides" src="./images/cars/car_3.jpg">
			</div>
		</section>

		<section>
			<header class="major" id="##">
				<h2>Nossos Serviços</h2>
			</header>
			<div class="features">
				<article>
					<span class="icon solid fa-comment"></span>
					<div class="content">
						<h3>Chat em tempo Real</h3>
						<p>Converse em tempo real com seu cliente ou mecânico, confirme informações, agendamentos, tire dúvidas com seus clientes e mecânicos!</p>
					</div>
				</article>
				<article>
					<span class="icon solid fa-calendar"></span>
					<div class="content">
						<h3>Agendamento de serviços</h3>
						<p>Agende seus serviços com mecânicos sem sair do conforto de sua casa, e combine com seu mecânico sistemas de leva e traz.</p>
					</div>
				</article>
				<article>
					<span class="icon solid fa-comments-dollar"></span>
					<div class="content">
						<h3>Compra e venda</h3>
						<p>Compre peças para seus veiculos com fornecedores de todo o Brasil e receba em sua casa e pague com cartão de crédito ou boleto.</p>
					</div>
				</article>
				<article>
					<span class="icon solid fa-store"></span>
					<div class="content">
						<h3>Um e-commerce completo</h3>
						<p>Criado com o objetivo de facilitar a manutenção de seus veículos, compras de peças e agendamento de serviços para realizar manutenções em seu veículo, que tornou- se bastante difícil atualmente, trazendo assim praticidade.</p>
					</div>
				</article>
			</div>
		</section>

		<section>
			<header class="major">
				<h2>Conheça nossos produtos</h2>
			</header>
			<div class="posts">
				<?php
				$sql = "SELECT `id_prod`, `nome_prod`, `categoria_prod`, `preco_custo_prod` AS preco, `desc_prod`, `foto_prod`, `qtd_estoque` FROM `tbl_produtos` LIMIT 6";
				$result = mysqli_query($conn, $sql);

				while ($row = mysqli_fetch_assoc($result)) {
				?>
					<article>
						<a href="#" class="image">
							<img src="./home_alternativa/images/pic01.jpg" alt="<?php $row['nome_prod'] ?>">
						</a>
						<h3><?php echo $row['nome_prod'] ?></h3>
						<h4><?php echo $row['desc_prod'] ?></h4>
						<p><?php echo "R$ " . number_format($row['preco'], 2, ",", ".") ?></p>
						<button class="button">Veja mais</button>
					</article>
				<?php
				}
				?>
			</div>
		</section>

		<a href="#top-page">
			<button class="button-top-page bg-sky-500"><i class="fas fa-arrow-up"></i></button>
		</a>
	</main>

	<?php
	require "./components/footer.php";
	?>

	<script src="./screens/home/js/main.js"></script>
	<script src="./components/traducao.js"></script>
	<script src="./home_alternativa/assets/js/jquery.min.js"></script>
	<script src="./home_alternativa/assets/js/browser.min.js"></script>
	<script src="./home_alternativa/assets/js/breakpoints.min.js"></script>
	<script src="./home_alternativa/assets/js/util.js"></script>
	<script src="./home_alternativa/assets/js/main.js"></script>
	<script src="./home_alternativa/assets/js/script.js"></script>
	<script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<script src="./libs/fontawesome/fontawesome.js"></script>
</body>

</html>