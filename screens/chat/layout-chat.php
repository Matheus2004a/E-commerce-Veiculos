<!DOCTYPE html>
<html>

<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../dist/css/index.css">
	<title>Chat</title>
</head>

<body>
	<h3> Chat </h3>
<div class="flex-container">
<!-- Select person !--> 
<div class="select-person">
			<div class="p-2 bd-highlight">
				<!-- Conversas !-->
				<div class="select-item-todos">
					<h4> Todos </h4>

				</div>
				<bdiv class="select-item-favorito">
					<h4> Favoritos </h4>
				</bdiv>
				<!--Input Para pesquisa de usuário !-->
				<input type="text" name="search-person" id="search-person"><br>

				<div class="d-flex flex-nowrap bd-highlight">
					<div class="order-3 p-2 bd-highlight">
						<p id="horaUtilizacao">4:30</p>
					</div>
					<div class="order-2 p-2 bd-highlight">
						<p id="nome-usuario"> Nome do Fornecedor</p>
					</div>
					<div class="order-1 p-2 bd-highlight"><img src="./images/foto fornecedor.png" id="img-usuario" alt=""></div>

				</div>
				<hr id="divisao-person">
			</div>
		</div>
	<!-- Fim div select person !-->

	<!--Mensagens !--> 

	<div class="conversas">
			<!-- Conversas !-->
			<div class="conversa">
				<div id="img-sender">
					<img src="./images/foto fornecedor.png" alt="">
				</div>
				<div id="nome-sender">
					<p>Nome Usuário</p>
				</div>
				<div class="message-sender-cliente">
					<p id="message-senders-cliente">Ola Mundo!</p>
				</div>
				<!-- Mensagem Mecânico !-->
				<div id="dados-usuario">
					<div class="d-flex justify-content-end">
					<div id="nome-receiver">
							<p>Nome Usuário</p>
						</div>	
						<div id="img-receiver">
							<img src="./images/foto fornecedor.png" alt="">
						</div>
						
					</div><!-- Fim div 	d-flex justify-content-end !-->
				</div>
					<div class="d-flex justify-content-end">
						<div id="mensagem-mecanico">
							<p>ola Mundo</p>
						</div>
						
					</div>

				</div>
				<!-- Fim mensagem mecânico !-->
					<!-- Input Mensagem !--> 
				<div class="input-mensagems">
					<input type="text"  class="input-mensagem" name="input-mensagens" id="input-mensagens" placeholder="Digite sua mensagem aqui">
					<button class="sender">
					<img src="./images/send.png" alt="">

					</button>
									</div>
				<!--Fim div Input Mensagem !--> 

				</div>
				
			</div>
		</div>
	</div>
</div>
	
		
	
		

</body>

</html>