<?php
include "../../../../connection/connection.php";
session_start();
include_once 'head.html';

$Idproduto= $_GET['produto'];


    $pegarDadosProduto = "SELECT nome_prod,preco_custo_prod,foto_prod,qtd_estoque FROM tbl_produtos WHERE id_prod = ".$Idproduto."";

    $queryDadosProd = mysqli_query($conn,$pegarDadosProduto);

    $fetchDadosProd = mysqli_fetch_assoc($queryDadosProd);
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
							<div id="colorlib-logo"><a href="#"><img src="../../../../images/icones/brand header.png"></a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li><a href="shop.php">Produtos</a></li>
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

						<?php
						$count = 0;
						$total = 0;
						foreach ($fetchDadosProd as $fetchDadosProd ) {
							echo '
											
								<div class="product-cart">
									<div class="one-forth">
										<div class="product-img" style="background-image: url(images/' . $fetchDadosProd["foto_prod"] . '.jpg);">
										</div>
										
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<span class="price" for="id_valor" id="id_valor">R$ ' .$fetchDadosProd[2] . '</span>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<form method="post" action="../App/Controller/updateQtd.php">
												<input type="number" for="id_quantidade" name="id_quantidade" id="id_quantidade" class="form-control  input-number text-center" value="' . $fetchDadosProd[4] . '" min="1" max="100"> 
												<input style="visibility: hidden; width:2%;height:2%;" type="number" name="idproduto" value="' . $fetchDadosProd[0] . '"> <br>
												<button class="btn btn-primary" style="background-color:viridiam,;color:white;"> alterar </button>
											</form>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<span for="id_total" class="price" id="id_total" name="id_total" >R$ ' . $fetchDadosProd[2] . '</span>
										</div>
									</div>
									<div class="one-eight text-center">
										<div class="display-tc">
											<a href="../App/Controller/delete.php?produto=' . $fetchDadosProd[0] . '" class="closed" style="background-color: #FFC300"></a>
										</div>
									</div>
								</div>
							';

							//$count = $row[1] * $row[4];
							//$total = $count + $total;
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
									<?php
									if ($count == 0) {
										echo '<p><a class="btn btn-primary"   style="opacity: 0.5;
  filter: alpha(opacity=50)"> Proximo </a disabled></p>';
									} else {
										echo '<p><a href="checkout.php?proximo=true&carrinho=true" class="btn btn-primary"> Proximo </a></p>';
									}
									?>
								</div>
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
</body>

</html>