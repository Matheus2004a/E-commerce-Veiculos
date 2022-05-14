<?php
session_start();

// pegando session ID
$url = "https://ws.sandbox.pagseguro.uol.com.br/v2/sessions";

$credenciais = array(
  "email" => "edersjc1000@gmail.com",
  "token" => "6306914EF35C4FF1B4EB8359CDFE1DF8"
);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_POSTFIELDS, http_build_query($credenciais));
$resultado = curl_exec($curl);
curl_close($curl);
$session = simplexml_load_string($resultado)->id;

require __DIR__ . '/../DataBase/connection.php';
require __DIR__ . '/../App/Controller/ClienteController.php';


$user = new ClienteController();
$result = $user->isLoggedIn();
$conn = new Conexao();
$conn = $conn->conexao();

$cpf = $_SESSION["user_cpf"];
$stmt2 = $conn->prepare('
		SELECT produto.nome, produto.valor, produto.imagem, produto.idproduto, gerou.quantidade FROM produto 
		INNER JOIN
			(SELECT carrinho_has_produto.produto_idproduto, carrinho_has_produto.quantidade FROM carrinho_has_produto
				INNER JOIN produto ON carrinho_has_produto.produto_idproduto = produto.idproduto
				INNER JOIN carrinho ON carrinho_has_produto.carrinho_idcarrinho = carrinho.idcarrinho 
		        WHERE carrinho.cliente_cpf = "' . $cpf . '"
			GROUP BY carrinho_has_produto.produto_idproduto) as gerou 

		ON produto.idproduto = gerou.produto_idproduto
    	GROUP BY produto.nome;');

$total = 0;
$stmt2->execute();
$resultado_carrinho = $stmt2->fetchAll();


?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.88.1">
  <title>Checkout example · Bootstrap v5.1</title>

  <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/checkout/">



  <!-- Bootstrap core CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <!-- Favicons -->
  <link rel="apple-touch-icon" href="/docs/5.1/assets/img/favicons/apple-touch-icon.png" sizes="180x180">

  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
  <link rel="manifest" href="/docs/5.1/assets/img/favicons/manifest.json">
  <link rel="mask-icon" href="/docs/5.1/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
  <link rel="icon" href="/docs/5.1/assets/img/favicons/favicon.ico">
  <meta name="theme-color" content="#7952b3">


  <style>
    .bd-placeholder-img {
      font-size: 1.125rem;
      text-anchor: middle;
      -webkit-user-select: none;
      -moz-user-select: none;
      user-select: none;
    }

    @media (min-width: 768px) {
      .bd-placeholder-img-lg {
        font-size: 3.5rem;
      }
    }
  </style>


  <!-- Custom styles for this template -->
  <link href="form-validation.css" rel="stylesheet">
</head>

<body class="bg-light">

  <div class="container">
    <main>
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="/docs/5.1/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
        <h2>Checkout</h2>
        <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
      </div>

      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Your cart</span>
            <span class="badge bg-primary rounded-pill">3</span>
          </h4>
          <ul class="list-group mb-3">
            <?php



            $count = 0;
            $total = 0;
            foreach ($resultado_carrinho as $row) {
              $count = $row[1] * $row[4];
              $total = $count + $total;
              echo '
						<li class="list-group-item d-flex justify-content-between lh-sm">
							<div>
							<h6 class="my-0">' . $row[4] . 'x' . $row[0] . ' </h6>
							<span>R$ ' . number_format($row[1] * $row[4], 2, ",", ".") . '</span>
							</div>

							<span class="text-muted"> ' . number_format($total, 2, ",", ".") . '</span>
						</li>';
            }

            ?>
          </ul>


          <form class="card p-2">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Promo code">
              <button type="submit" class="btn btn-secondary">Redeem</button>
            </div>
          </form>
        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Billing address</h4>
          <form class="needs-validation" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="NomeCompleto" class="form-label">First name</label>
                <input type="text" class="form-control" id="NomeCompleto" placeholder="Primeiro Nome" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>

              <div class="col-12">
                <label for="cpf" class="form-label">CPF</label>
                <div class="input-group has-validation">
                  <span class="input-group-text">@</span>
                  <input type="text" class="form-control" id="cpf" placeholder="CPF" required maxlength="11">
                  <div class="invalid-feedback">
                    Your username is required.
                  </div>
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email <span class="text-muted">(Optional)</span></label>
                <input type="email" class="form-control" id="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>

              <div class="col-12">
                <label for="Telefone" class="form-label">Telefone </label>
                <input type="tel" class="form-control" id="Telefone" required>
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
              <div class="col-3">
                <label for="cepEndec" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cepEndec" placeholder="CEP" required>
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
              <div class="col-12">
                <label for="endereco" class="form-label">Endereco</label>
                <input type="text" class="form-control" id="endereco" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-3">
                <label for="numero" class="form-label">Numero</label>
                <input type="text" class="form-control" id="numero" placeholder="Apartment or suite">
              </div>

              <div class="col-12">
                <label for="bairroEnd" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairroEnd" placeholder="Apartment or suite">
              </div>

              <div class="col-md-5">
                <label for="cidadeEnd" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidadeEnd" placeholder="Apartment or suite">

                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>

              <div class="col-md-4">
                <label for="estadoEnd" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estadoEnd" placeholder="Apartment or suite">
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>



              <hr class="my-4">

              <h4 class="mb-3">Payment</h4>
              <div class="col-md-6">
                <label for="creditCardNumber" class="form-label">Credit card number</label>
                <input type="text" class="form-control" id="creditCardNumber" placeholder="" required name="creditCardNumber">
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
              </div>

              <div class="col-md-3">
                <label for="creditCardBrand" class="form-label">Bandeira</label>
                <input type="text" class="form-control" id="creditCardBrand" placeholder="" name="creditCardBrand" required disabled>
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>

              <div class="col-md-3">
                <label for="creditCardExpMonth" class="form-label">Mês Validade</label>
                <input type="text" class="form-control" id="creditCardExpMonth" placeholder="" required name="creditCardExpMonth">
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>

              <div class="col-md-3">
                <label for="creditCardExpYear" class="form-label">Ano Validade</label>
                <input type="text" class="form-control" id="creditCardExpYear" placeholder="" required name="creditCardExpYear">
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>

              <div class="col-md-3">
                <label for="creditCardCvv" class="form-label">CVV</label>
                <input type="text" class="form-control" id="creditCardCvv" placeholder="" required name="creditCardCvv">
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <label for="checkoutValue">Valor da parcela</label>
              <input type="text" class="form-control" id="checkoutValue" name="checkoutValue">
            </div>

            <div class="col-md-3">
              <label for="installmentCheck" class="form-label"> Parcelamentos </label>
              <select id="installmentCheck" class="form-control">

              </select>
            </div>

            <input type="text" id="checkoutValue" name="checkoutValue" value="<?php echo ($row[1]); ?>" hidden>

            <div class="col-md-3">
              <div class="tipoCartao">

              </div>
            </div>

            <hr class="my-4">

            <button class="w-100 btn btn-primary btn-lg" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
    </main>

    <footer class="my-5 pt-5 text-muted text-center text-small">
      <p class="mb-1">&copy; 2017–2021 Company Name</p>
      <ul class="list-inline">
        <li class="list-inline-item"><a href="#">Privacy</a></li>
        <li class="list-inline-item"><a href="#">Terms</a></li>
        <li class="list-inline-item"><a href="#">Support</a></li>
      </ul>
    </footer>
  </div>


  <script src="/docs/5.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

  <script src="form-validation.js"></script>
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

  <script type="text/javascript" src="https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"> </script>
  <script type="text/javascript" src="./js/JSA.js"> </script>
  <script type="text/javascript">
    PagSeguroDirectPayment.setSessionId('<?php echo $session; ?>');
    console.log('<?php echo $session; ?>');


    // Busca o token do cartão a partir do valor fornecido pelo usuário
    $("#creditCardNumber").keyup(function() {
      if ($("#creditCardNumber").val().length >= 6) {
        PagSeguroDirectPayment.getBrand({
          cardBin: $("#creditCardNumber").val().substring(0, 6),
          success: function(response) {
            console.log(response);
            $("#creditCardBrand").val(response['brand']['name']);
            $("#creditCardCvv").attr('size', response['brand']['cvvSize']);
          },
          error: function(response) {
            console.log(response);
          }
        })
      };
    })
    // Função que busca os metodos de pagamento
    function getPaymentMethods(valor) {
      PagSeguroDirectPayment.getPaymentMethods({
        amount: valor,
        success: function(response) {
          //console.log(JSON.stringify(response));
          console.log(response);
        },
        error: function(response) {
          console.log(JSON.stringify(response));
        }
      })
    }
    //Função que demonstra os valores de parcelamento para o usuário 
    document.getElementById('checkoutValue')
      .addEventListener('focusout', getInstallments);

    function getInstallments() {
      var brand = $("#creditCardBrand").val();
      PagSeguroDirectPayment.getInstallments({
        amount: $("#checkoutValue").val().replace(",", "."),
        brand: brand,
        maxInstallmentNoInterest: 2, //calculo de parcelas sem juros
        success: function(response) {
          var installments = response['installments'][brand];
          buildInstallmentSelect(installments);
        },
        error: function(response) {
          console.log(response);
        }
      })
    }



    listaMeiosPagamento();
    //Função que demonstra os meios de pagamentos
    function listaMeiosPagamento() {
      PagSeguroDirectPayment.getPaymentMethods({
        amount: 500.00,
        success: function(data) {
          $.each(data.paymentMethods.CREDIT_CARD.options, function(i, obj) {
            $('.tipoCartao').append("<div><img src=https://stc.pagseguro.uol.com.br/" + obj.images.SMALL.path + ">" + obj.name + "</div>");
          });

          $('.Boleto').append("" + data.paymentMethods.BOLETO.name + "");

          $.each(data.paymentMethods.ONLINE_DEBIT.options, function(i, obj) {
            $('.Debito').append("" + obj.name + "");
          });
        },
        complete: function(data) {}
      });
    }
  </script>

</body>

</html>