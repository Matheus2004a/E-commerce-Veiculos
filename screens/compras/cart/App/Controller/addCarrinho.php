<?php
    include "../../../../../connection/connection.php";
    $Idproduto= $_GET['produto'];


    $pegarDadosProduto = "SELECT nome_prod,preco_custo_prod,foto_prod,qtd_estoque FROM tbl_produtos WHERE id_prod = ".$Idproduto."";

    $queryDadosProd = mysqli_query($conn,$pegarDadosProduto);

    $fetchDadosProd = mysqli_fetch_assoc($queryDadosProd);

    
?>
<!DOCTYPE html>
<html>
<head>
	<title>Loja Virtual</title>
	<meta charset="utf-8"/>
	<meta name="viewport" content="width=device-width"/>
	<link rel="stylesheet" type="text/css" href="../../../../../bootstrap-5.1.3-distcss/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="css/animate.css" />
	<style>
		.navbar-header button{
			color: #fff;
		}
		.fullscreen{
			width:100%;
		}
		main{
			padding-top:50px;
		}
		footer{
			background:#333;
			color: #fff;
			padding: 20px 0;
			text-align: center;
		}
		.tab-pane{
			padding: 10px 5px;
		}
	</style>
</head>
<body>
	<!-- Barra de navegação e busca -->
	<header>
		<nav class="navbar-inverse navbar-fixed-top">
			<div class="navbar-header">
				<a class="navbar-brand" href="#home">Caelum</a>
				<button type="button" class="navbar-toggle" data-target=".navbar-collapse" data-toggle="collapse">Menu</button>
			</div>

			<!-- NAV collapse -->
			<div class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="#novidades">Novidades</a></li>
					<li><a href="#maisVendidos">Mais vendidos</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">
							Camisetas
							<span class="caret"></span>
						</a>
						<ul class="dropdown-menu">
							<li><a href="#">Masculino</a></li>
							<li><a href="#">Feminino</a></li>
							<li><a href="#">Infantil</a></li>
						</ul>
					</li>
				</ul>
				<form class="navbar-form navbar-right">
					<div class="form-group">
						<input type="text" class="form-control" placeholder="Busque um produto"/>
					</div>
					<input class="btn btn-default" type="submit" value="buscar"/>
				</form>
			<div> <!-- FIM NAV collapse -->
		</nav>
	</header><!-- FIM Barra de navegação e busca -->


	<main>
		<div class="container">
			<div class="row">
				<div class="col-sm-4">
					<div class="panel panel-success">
						<div class="panel-heading">
							<h2 class="painel-title">Sua compra</h2>
						</div>
						<div class="panel-body">
							<img src="img/produto.png" alt="Produto" class="img-responsive img-thumbnail"/>
							<dl>
								<dt>Nome</dt>
								<dd>Camiseta Azul</dd>
								
								<dt>Cor</dt>
								<dd>Azul</dd>

								<dt>Tamanho</dt>
								<dd>G</dd>

								<dt>Preço</dt>
								<dd>R$ 129,00</dd>
							</dl>
						</div>
					</div>
				</div>
				<div class="col-sm-8">
					<form>
						<!-- INFORMAÇÕES DO USER -->
						<fieldset>
						<legend>Informações do usuário</legend>
							<div class="form-group">
								<label for="nome">Nome Completo</label>
								<input id="nome" class="form-control" type="text">
							</div>
							<div class="form-group">
								<label for="email">E-mail</label>
								<div class="input-group">
									<span class="input-group-addon">@</span>
									<input id="email" class="form-control" type="email">
								</div>
							</div>
							<div class="form-group">
								<label for="cpf">C.P.F</label>
								<input id="cpf" class="form-control" type="text">
							</div>

							<div class="checkbox">
								<label for="novidades">
									<input id="novidades" type="checkbox" value="sim" checked="checked">
									Quero receber novidades por e-mail.
								</label>
							</div>
						</fieldset>

						<!-- FORMAS DE PAGAMENTO -->
						<fildset>
							<legend>Formas de pagamento</legend>
							<div class="form-group">
								<label for="bandeira">Bandeira do cartão</label>
								<select name="bandeira" id="bandeira" class="form-control">
									<option value="visa">Visa</option>
									<option value="mastercard">MasterCard</option>
									<option value="American">American Express</option>
								</select>

								<div class="form-group">
									<label for="num">Número</label>
									<input id="num" type="text" class="form-control">
								</div>

								<div class="form-group">
									<label for="validade">Valdiade</label>
									<input type="month" class="form-control">
								</div>

								<div class="form-group">
									<label for="cvv">CVV</label>
									<input type="text" maxlength="3" class="form-control">
								</div>
							</div>
							<button class="btn btn-success btn-lg" type="submit">
							<span class="glyphicon glyphicon-thumbs-up"></span>
								Comprar
							</button>
						</fildset>
					</form>
				</div>
			</div>
		</div>
	</main>
			
	<footer>
		Avenida Exemplo n: 45, <br />
		(11)1234-5678
	</footer>
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
</body>
</html>