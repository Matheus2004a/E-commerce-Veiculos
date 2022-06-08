<?php
session_start();
include_once 'head.html';

require "../../PagSeguro/utils.php";
require "../../PagSeguro/config.php";
include "../../../../connection/connection.php";
// pegando session ID
$params = array(
	'email' => $PAGSEGURO_EMAIL,
	'token' => $PAGSEGURO_TOKEN
);
$header = array();

$response = curlExec($PAGSEGURO_API_URL . "/sessions", $params, $header);
$json = json_decode(json_encode(simplexml_load_string($response)));
$sessionCode = $json->id;



$id = $_GET['id'];
echo $id;
?>

<!DOCTYPE HTML>
<html>

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
								<li><a href="index.php">Home</a></li>
								<li><a href="shop.php">Produtos</a></li>


							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>


		<div class="colorlib-shop">
			<div class="container">
				<div class="row row-pb-md">
					<div class="col-md-10 col-md-offset-1">
						<div class="process-wrap">
							<div class="process text-center active">
								<p><span>01</span></p>
								<h3>Carrinho de Compras</h3>
							</div>
							<div class="process text-center active">
								<p><span>02</span></p>
								<h3>Pagamento</h3>
							</div>
							<div class="process text-center">
								<p><span>03</span></p>
								<h3>Finalizado</h3>
							</div>
						</div>
					</div>
				</div>
				<form method="post" action="../../PagSeguro/pay.php" class="colorlib-form">
					<div class="row">
						<div class="col-md-7">

							<h2>Checkout</h2>
							<div class="row">
								<div class="col-md-12">
									<div class="form-group">
										<label for="NomeCompleto">Nome Completo</label>
										<div class="form-field">
										<input type="text" class="form-control" id="NomeCompleto" name="NomeCompleto" placeholder="Primeiro Nome" value="" required>
										</div>
										<label for="cpf">CPF</label>
										<div class="form-field">
											<input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required maxlength="11">
										</div>
										<label for="email">Email</label>
										<div class="form-field">
											<input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
										</div>
										<label for="ddd">DDD</label>
										<div class="form-field">
											<input type="tel" class="form-control" name="ddd" id="ddd" required>
										</div>
										<label for="email">Telefone</label>
										<div class="form-field">
											<input type="tel" class="form-control" name="telefone" id="Telefone" required>
										</div>
										<h4 style="font-weight: bold; text-align:center;  padding-top:5px;">Endereço</h4>
										<label for="email">CEP</label>
										<div class="form-field">
											<input type="text" class="form-control" name="cep" id="cepEndec" placeholder="CEP" required>
										</div>
										<label for="email">Rua</label>
										<div class="form-field">
											<input type="text" class="form-control" id="endereco" name="endereco" placeholder="1234 Main St" required>
										</div>
										<label for="email">Numero</label>
										<div class="form-field">
											<input type="text" class="form-control" name="numero" id="numero" placeholder="Apartment or suite">
										</div>
										<label for="email">Bairro</label>
										<div class="form-field">
											<input type="text" class="form-control" id="bairroEnd" name="bairro" placeholder="Apartment or suite">
										</div>
										<label for="email">Cidade</label>
										<div class="form-field">
											<input type="text" class="form-control" id="cidadeEnd" name="cidade" placeholder="Apartment or suite">
										</div>
										<label for="email">Estado</label>
										<div class="form-field">
											<input type="text" class="form-control" name="estado" id="estadoEnd" placeholder="Apartment or suite">
										</div>

										<h4 style="text-align:center; font-weight: bold;">Dados do cartão</h4>
										<label for="cardNumber">Numero do cartão</label>
										<div class="fomr-field">
											<input type="tel" class="form-control" name="cardNumber" placeholder="Valid Card Number" autocomplete="cc-number" required autofocus value="4111 1111 1111 1111" />
										</div>
									
										<label for="cardExpiry">Mês Validade</label>
										<div class="fomr-field">
											<input type="tel" class="form-control" name="cardExpiry" placeholder="MM / YY" autocomplete="cc-exp" required value="12/2030" />
										</div>
										<label for="cardCvv">CVV</label>
										<div class="form-field">
											<input type="tel" class="form-control" name="cardCVC" placeholder="CVV" autocomplete="cc-csc" required value="123" />
										</div>
										<label for="installmentCheck" class="form-label"> Parcelamentos </label>
										<div class="form-field">
											<select name="installments" id="select-installments" class="form-control">
												<option selected>1</option>
											</select>
											<input type="hidden" name="installmentValue">
										</div>
									</div>

								</div>
							</div>

						</div>
							

						<div class="col-md-5">
							<div class="cart-detail">
								<h2>Total</h2>								
								<?php


								$count = 0;
								$totd = $_GET['total'];
								foreach ($_SESSION['carrinho'] as $cd => $qtd) {
									$select = "SELECT * FROM tbl_produtos WHERE id_prod = " . $cd . " ";
									$query = mysqli_query($conn, $select);
									$row = mysqli_fetch_assoc($query);
									$count = $row['preco_custo_prod'];
									$total = $count;
									
									echo '
										<ul>
											<li> 
												<ul> 
													<li> <span> ' . $row['nome_prod'] . ' </span> <span> R$ ' . $row['preco_custo_prod'] . ' </span </li>
												</ul>
											</li>
											<li> <span> Total </span> <span> R$ ' . number_format($total, 2, ",", ".") . ' </span> </li>
										</ul>
										';
								}

								?>


							</div>
							
							<input type="hidden" name="brand">
							<input type="hidden" name="token">
							<input type="hidden" name="senderHash">
							<input type="hidden" name="valProd" value="<?php echo $row['preco_custo_prod'] ?>">
							<input type="hidden" name="amount" value="<?php echo $totd ?>">
							<input type="hidden" name="shippingCoast" value="2">
							<input type="hidden" name="itemQuantity1" value="<?php echo $qtd ?>">
							<input type="hidden" name="descricao" value="<?php echo $row['desc_prod'] ?>">
							<input type="hidden" name="idProd" value="<?php echo $row['id_prod'] ?>">

							<div class="row">
								<div class="col-md-12">
									<p><input type="submit" style="background-color: green !important" class="btn btn-primary" value="Finalizar" name="enviar"></input></p>
									<p><a href="cart.php" class="btn btn-primary">Voltar para o carrinho </a></p>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>

		<?php
		include_once 'footer.html';
		?>
	</div>

	<div class="gototop js-top">
		<a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
	</div>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="../../PagSeguro/PagSeguroJS/"></script>
	<script>
    "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"
  	</script>
	<script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<script type="text/javascript" src="<?= $JS_FILE_URL ?>"></script>


	<script>
		'use strict';
		//APi ViaCep para pesquisa de endereço dinâmico
		const preencherFormulario = (endereco) => {
			document.getElementById('endereco').value = endereco.logradouro;
			document.getElementById('bairroEnd').value = endereco.bairro;
			document.getElementById('cidadeEnd').value = endereco.localidade;
			document.getElementById('estadoEnd').value = endereco.uf;
		}
		const pesquisarCep = async () => {
			const cep = document.getElementById('cepEndec').value;
			const url = 'https://viacep.com.br/ws/' + cep + '/json/';
			const dados = await fetch(url);
			const endereco = await dados.json();
			preencherFormulario(endereco);

		}

		document.getElementById('cepEndec')
			.addEventListener('focusout', pesquisarCep);
	</script>
	<script>
		// Mascaras para input de cep,cpf,telefone    
		$('#cepEndec').mask('00000-000');
		$('#cpf').mask('000.000.000-00', {reverse:true});
		$('#Telefone').mask('00000-0000');

		var installments = [];

		$("input[name='cardNumber']").keyup(function() {
			getInstallments();
		});

		$("#select-installments").change(function() {
			console.log(installments[$(this).val() - 1]);
			$("input[name='installmentValue']").val(installments[$(this).val() - 1].installmentAmount);
		});
		// Função para buscar parcelas
		function getInstallments() {

			var cardNumber = $("input[name='cardNumber']").val();

			//if creditcard number is finished, get installments
			if (cardNumber.length != 19) {
				return;
			}

			PagSeguroDirectPayment.getBrand({
				cardBin: cardNumber.replace(/ /g, ''),
				success: function(json) {
					console.log(json);
					var brand = json.brand.name;
					$("input[name='brand']").val(brand);

					var amount = parseFloat($("input[name='amount']").val());
					var shippingCoast = parseFloat($("input[name='shippingCoast']").val());

					//The maximum installment qty with no extra fees (You must configure it on your PagSeguro dashboard with same value)
					var max_installment_no_extra_fees = 2;

					PagSeguroDirectPayment.getInstallments({
						amount: amount + shippingCoast,
						brand: brand,
						maxInstallmentNoInterest: max_installment_no_extra_fees,
						success: function(response) {

							/*
							    Available installments options.
							    Here you have quantity and value options
							*/
							console.log(response);
							installments = response.installments[brand];
							$("#select-installments").html("");
							for (var installment of installments) {
								$("#select-installments").append("<option value='" + installment.quantity + "'>" + installment.quantity + " x R$ " + installment.installmentAmount + " - " + (installment.quantity <= max_installment_no_extra_fees ? "Sem" : "Com") + " Juros</option>");
							}

						},
						error: function(response) {
							console.log(response);
						},
						complete: function(response) {
							//Called after sucess or error
						}
					});
				},
				error: function(json) {
					console.log(json);
				},
				complete: function(json) {
					console.log(json);
				}
			});
		}

		$("button").click(function() {
			var param = {
				cardNumber: $("input[name='cardNumber']").val().replace(/ /g, ''),
				brand: $("input[name='brand']").val(),
				cvv: $("input[name='cardCVC']").val(),
				expirationMonth: $("input[name='cardExpiry']").val().split('/')[0],
				expirationYear: $("input[name='cardExpiry']").val().split('/')[1],
				success: function(json) {
					var token = json.card.token;
					$("input[name='token']").val(token);
					console.log("Token: " + token);

					var senderHash = PagSeguroDirectPayment.getSenderHash();
					$("input[name='senderHash']").val(senderHash);
					$("form").submit();
				},
				error: function(json) {
					console.log(json);
				},
				complete: function(json) {}
			}
			// Pega o token do cartão digitado
			PagSeguroDirectPayment.createCardToken(param);
		});

		jQuery(function($) {

			var shippingCoast = parseFloat($("input[name='shippingCoast']").val());
			var amount = parseFloat($("input[name='amount']").val());
			$("input[name='installmentValue']").val(amount + shippingCoast);

			PagSeguroDirectPayment.setSessionId('<?php echo $sessionCode; ?>');

			PagSeguroDirectPayment.getPaymentMethods({
				success: function(json) {

					console.log(json);
					getInstallments();

				},
				error: function(json) {
					console.log(json);
					var erro = "";
					for (i in json.errors) {
						erro = erro + json.errors[i];
					}

					alert(erro);
				},
				complete: function(json) {}
			});
		});
	</script>
</body>

</html>