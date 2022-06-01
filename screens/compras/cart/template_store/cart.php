<?php
session_start();
include_once 'head.html';
require __DIR__ . '/../../../../connection/connection.php';

if (!isset($_SESSION['carrinho'])) {
	$_SESSION['carrinho'] = array();
}
if (!empty($_GET['acao'])) {
	//ADICIONAR CARRINHO
	if ($_GET['acao'] == 'add') {
		$id = $_GET['id_prod'];
		$idProdutos = array();
		if (!isset($_SESSION['carrinho'][$id])) {
			$_SESSION['carrinho'][$id] = 1;
		} else {
			$_SESSION['carrinho'][$id] += 1;
		}
	}
}
if ($_GET['acao'] == 'del') {
	$id = ($_GET['id']);
	if (isset($_SESSION['carrinho'][$id])) {
		unset($_SESSION['carrinho'][$id]);
	}
}
if ($_GET['acao'] == 'up') {
	if (is_array($_POST['idproduto'])) {
		foreach ($_POST['idproduto'] as $id => $qtd) {
			$id  = intval($id);
			$qtd = intval($qtd);
			if (!empty($qtd) || $qtd <> 0) {
				$_SESSION['carrinho'][$id] = $qtd;
			} else {
				unset($_SESSION['carrinho'][$id]);
			}
		}
	}
}





$total = 0;

?>

<!DOCTYPE HTML>
<html>

<body>

	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="../../../../index.php"><img src="../../../../images/icones/brand header.png"></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav><br>


		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-md">
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
				</div>
				<div class="row row-pb-md">
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


						foreach ($_SESSION['carrinho'] as $cd => $qtd) {
							$queryCart = "SELECT * FROM tbl_produtos WHERE id_prod = '$cd'";
							$resultQuery = mysqli_query($conn, $queryCart);
							$row = mysqli_fetch_assoc($resultQuery);
							echo '
											
								<div class="product-cart">
									<div class="one-forth">
										<div class="product-img" style="background-image: url(../../../../uploads/' . $row["foto_prod"] . '.jpg);">
										</div>
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
												<input type="number" for="id_quantidade" name="id_quantidade" id="id_quantidade" class="form-control  input-number text-center" value="' . $qtd . '" min="1" max="100"> 
												<input style="visibility: hidden; width:2%;height:2%;" type="number" name="idproduto" id="idproduto" value="' . $qtd . '"> <br>
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
											<a href="?acao=del&id=' . $row['id_prod'] . '" class="closed" style="background-color: #FFC300"></a>
										</div>
									</div>
								</div>
							';

							$count = $row['preco_custo_prod'] * $qtd;
							$total = $count + $total;
						?>
							<input type="hidden" name="total" value="<?php echo $total ?>">
						<?php

						}
						?>
					</div>
				</div>
				<div class="row">
					<div class="col-md-10 col-md-offset-1">
						<div class="total-wrap">
							<div class="row">
								<div class="col-md-8">
									<form action="#">
										<div class="row form-group">
										</div>
									</form>
								</div>
								<div class="col-md-3 col-md-push-1 text-center">
									<div class="total">
										<div class="grand-total">
											<p><span><strong>Total:</strong></span> <span>R$ <?php echo number_format($total, 2, ",", ".");
																								?></span></p>
										</div>
									</div>
									<div class="d-flex flex-row mb-3">
										<div class="p-2">
											<?php
											if ($count == 0) {
												echo '<p><a class="btn btn-primary"   style="opacity: 0.5;filter: alpha(opacity=50)"> Proximo </a disabled></p>';
											} else {
												echo '<p><a href="checkout.php?id=' . $cd . '&&qtd=' . $qtd . '&&total=' . $total . '" class="btn btn-primary"> Proximo </a></p>';
											}
											?>
										</div>
										<div class="p-2">
											<p><a href="../../index.php" class="btn btn-primary">Voltar</a></p>
										</div>
									</div>
								</div>
								</form>

								<form id="formDestino" action="">

									<input name="sCepOrigem" type="hidden" value="12230610">
									<input name="nVlPeso" type="hidden" value="1">
									<input name="nVlComprimento" type="hidden" value="15">
									<input name="nVlAltura" type="hidden" value="15">
									<input name="nVlLargura" type="hidden" value="15">
									<div class="col-md-3 col-md-push-1 text-center">
										<label for="">Cep destino</label>
										<input name="sCepDestino" type="text" class="form-control">
										
											<label for="">Serviço</label>
											<select name="nCdServico" id="">
												<option value="04014">Sedex</option>
												<option value="04510">PAC</option>
											</select>
										<button type="button" id="calcular" class="btn btn-primary">Calcular</button>
									</div>
								</form>
								<p id="resultado"></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>


	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>

	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<!-- Ajax para calcular frete !-->
	<script>
		$('#calcular').click(function() {
			let formSerialized = $('#formDestino').serialize();
			$.post('calcular.php', formSerialized, function(resultado) {
				resultado = JSON.parse(resultado);
				let valorFrete = resultado.preco;
				let prazoEntrega = resultado.prazo;
				$('#resultado').html(`O valor do frete é <b>R$ ${valorFrete}</b> e o prazo de entrega é <b>${prazoEntrega} dias úteis</b>.`);
			});
		});
	</script>
</body>

</html>