<?php
require __DIR__ . '/../../../../connection/connection.php';
require "../../../login/verify-session.php";

if ($_SESSION['category'] != "cliente") {
	$_SESSION['msg-alert-mechanic'] = "<div class='alert alert-danger d-flex align-items-center w-fit' role='alert'>
	<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
	<div>
	Você não tem permissão para adicionar ao carrinho
	</div>
  </div>";
	header('location: ../../../compras/index.php');
	exit;
}

/* $sql_estoq_empty = "SELECT `id_prod`, `nome_prod`, `preco_custo_prod`, `desc_prod`, `foto_prod`, `qtd_estoque` FROM `tbl_produtos` WHERE qtd_estoque = 0";
$result = mysqli_query($conn, $sql_estoq_empty);
$rows_prod_empty = mysqli_fetch_assoc($result); */

// TODO: Não adicionar produto ao carrinho quando está sem estoque
if (empty($_SESSION['status_estoq'])) {
	$_SESSION['msg-estoq-empty'] = "<div class='alert alert-danger d-flex align-items-center w-fit' role='alert'>
	<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>
	<div>
	Produto sem estoque
	</div>
	</div>";
	header('location: ../../../compras/index.php');
	exit;
}

if (!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = array();
}

if (isset($_GET['add']) && $_GET['add'] == "carrinho") {
	$idProduto  = $_GET['id_prod'];
	if (!isset($_SESSION['carrinho'][$idProduto])) {
		$_SESSION['carrinho'][$idProduto] = 1;
	} else {
		$_SESSION['carrinho'][$idProduto] += 1;
	}

	//evita add +1 sempre q a pagina for atualizada
	header('Location: cart.php');
	exit;
}

if (count($_SESSION['carrinho']) == 0) {
	echo ' <h1>Carrinho vazio</h1>';
} else {
	$_SESSION['dados'] = array();
}

if (isset($_GET['remover']) && $_GET['remover'] == "carrinho") {
	$idProduto  = $_GET['id_prod'];
	unset($_SESSION['carrinho'][$idProduto]);
}

$total = 0;
?>

<!DOCTYPE HTML>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Carrinho de compras</title>
	<!-- Animate.css -->
	<link rel="stylesheet" href="../../../css/animate.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="../../../css/bootstrap.css">
	<!-- Magnific Popup -->
	<link rel="stylesheet" href="../../../css/magnific-popup.css">
	<!-- Flexslider  -->
	<link rel="stylesheet" href="../../../css/flexslider.css">
	<!-- Theme style  -->
	<link rel="stylesheet" href="../../../css/style.css">
	<link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
	<main class="container" id="page">
		<section class="row row-pb-md">
			<div class="col-md-10 col-md-offset-1">
				<div class="process-wrap">
					<div class="process text-center active">
						<p><span>01</span></p>
						<h3>Carrinho de compras</h3>
					</div>
					<div class="process text-center">
						<p><span>02</span></p>
						<h3> Pagamento </h3>
					</div>
					<div class="process text-center">
						<p><span>03</span></p>
						<h3>Finalizado</h3>
					</div>
				</div>
			</div>
		</section>

		<section class="row row-pb-md">
			<div class="col-md-10 col-md-offset-1">
				<div class="product-name">
					<div class="one-forth text-center">
						<span>Detalhes dos produtos</span>
					</div>
					<div class="one-eight text-center">
						<span>Preço</span>
					</div>
					<div class="one-eight text-center">
						<span>Quantidade</span>
					</div>
					<div class="one-eight text-center">
						<span>Total</span>
					</div>
					<div class="one-eight text-center">
						<span>Remover</span>
					</div>
				</div>
				<form action="./checkout.php" method="post"></form>
				<?php
				$count = 0;
				$total = 0;

				foreach ($_SESSION['carrinho'] as $idProduto => $quantidade) {
					$queryCart = "SELECT * FROM tbl_produtos WHERE id_prod=" . $idProduto . " ";
					$resultQuery = mysqli_query($conn, $queryCart);
					$row = mysqli_fetch_assoc($resultQuery);
					echo '<div class="product-cart">
									<div class="one-forth">
										<img src="../../' . $row["foto_prod"] . '" class="product-img">
										<div class="display-tc">
											<h3 id="nome">' . $row['nome_prod'] . '</h3>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<span class="price" for="id_valor" id="id_valor">R$ ' .
						number_format($row['preco_custo_prod'], 2, ",", ".") . '</span>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<form method="post" action="?acao=up">
												<input type="number" for="id_quantidade" name="id_quantidade" id="id_quantidade" class="form-control  input-number text-center" value="' . $quantidade . '" min="1" max="100"> 
												<input style="visibility: hidden; width:2%;height:2%;" type="number" name="idproduto" id="idproduto" value="' . $quantidade . '"> <br>
											</form>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<span for="id_total" class="price" id="id_total" name="id_total" >R$ ' . number_format($row['preco_custo_prod'], 2, ",", ".") . '</span>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<a href="?remover=carrinho&id_prod=' . $row['id_prod'] . '">
											<i class="bx bx-trash icon-trash"></i>
											</a>
										</div>
									</div>
								</div>
							';

					$count = $row['preco_custo_prod'] * $quantidade;
					$total += $count;
				?>
					<input type="hidden" name="total" value="<?php echo $total ?>">
				<?php
					//Transforma dados da sessão "Carrinho" em um array
					array_push(
						$_SESSION['dados'],
						array(
							'id_produto' => $row["id_prod"],
							'nome' => $row["nome_prod"],
							'quantidade' => $quantidade,
							'preco' => $row["preco_custo_prod"],
							'total' => $total
						)
					);
				}
				?>
			</div>
		</section>

		<section class="section-price-car col-md-offset-1">
			<form id="formDestino" action="">
				<input name="sCepOrigem" type="hidden" value="12230610">
				<input name="nVlPeso" type="hidden" value="1">
				<input name="nVlComprimento" type="hidden" value="15">
				<input name="nVlAltura" type="hidden" value="15">
				<input name="nVlLargura" type="hidden" value="15">

				<fieldset class="fieldset-cep">
					<label for="">Cep destino</label>
					<input name="sCepDestino" type="text" id="cep" class="form-control" maxlength="9">
					<label for="">Serviço</label>
					<select name="nCdServico">
						<option value="04014">Sedex</option>
						<option value="04510">PAC</option>
					</select>
					<button type="button" id="calcular" class="btn btn-primary">Calcular</button>
					<p id="resultado"></p>
				</fieldset>
			</form>

			<article class="col-md-3">
				<p>
					<strong>Total: </strong>R$ <?php echo number_format($total, 2, ",", "."); ?>
				</p>

				<div class="d-flex flex-row mb-3">
					<?php
					if ($count <= 0) {
						echo "<a href=''>
						<button type='button' class='btn btn-primary' disabled='disabled' style='opacity: 0.5;filter: alpha(opacity=50)'>Proximo</button>
						</a>";
					} else {
						echo "<a href='checkout.php?id=" . $idProduto . "&&qtd=" . $quantidade . "&&total=" . $total . "'>
						<button type='button' class='btn btn-primary'>Proximo</button>
						</a>";
					}
					?>
					<a href="../../index.php">
						<button type="button" class="btn btn-primary">Voltar</button>
					</a>
				</div>
			</article>
		</section>
	</main>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js" integrity="sha512-pHVGpX7F/27yZ0ISY+VVjyULApbDlD0/X0rgGbTqCE7WFW5MezNTWG/dnhtbBuICzsd0WQPgpE4REBLv+UqChw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<!-- Modernizr JS -->
	<script src="js/modernizr-2.6.2.min.js"></script>
	<!-- Ajax para calcular frete !-->
	<script>
		$('#cep').mask('00000-000');

		$('#calcular').click(function() {
			let formSerialized = $('#formDestino').serialize();
			$.post('calcular.php', formSerialized, function(resultado) {
				resultado = JSON.parse(resultado);
				let valorFrete = resultado.preco;
				let prazoEntrega = resultado.prazo;
				$("#resultado").html(`O valor do frete é <b>R$ ${valorFrete}</b> e o prazo de entrega é <b>${prazoEntrega} dias úteis</b>.`)
			});
		});
	</script>
</body>

</html>