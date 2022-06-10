<?php
session_start();
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
        <a href="../../../../index.php">
          <img class="mx-auto " src="../../../.././images/icones/brand header.png" alt="" width="72" height="57">
        </a>
        <h2>Checkout</h2>

      </div>
      <h4>Tipos de pagamento:</h4>
      <div class="d-flex flex-row mb-3">
        <div class="p-2">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
            <label class="form-check-label" for="exampleRadios1">
              Cartão de crédito
            </label>
          </div>
        </div>
        <div class="p-2">
          <div class="form-check">
            <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
            <label class="form-check-label" for="exampleRadios2">
             Boleto
            </label>
          </div>
        </div>
      </div>
      <div class="row g-5">
        <div class="col-md-5 col-lg-4 order-md-last">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-primary">Seus Produtos</span>
          </h4>
          <ul class="list-group mb-3">
            <?php
            // Select Usuario Logado


            $count = 0;
            $totd = $_GET['total'];
            foreach ($_SESSION['carrinho'] as $cd => $qtd) {
              $select = "SELECT * FROM tbl_produtos WHERE id_prod = " . $cd . " ";
              $query = mysqli_query($conn, $select);
              $row = mysqli_fetch_array($query);
              $count = $row['preco_custo_prod'];
              $total = $count;
              echo '
						<li class="list-group-item d-flex justify-content-between lh-sm">
							<div>
							<h6 class="my-0">' . $row['nome_prod'] . 'x' . $qtd . ' </h6>
							<span name="preco_prod" id="preco_prod" >R$ ' . number_format($row['preco_custo_prod'] * $qtd, 2, ",", ".") . '</span>
							</div>

							<span class="text-muted"> ' . number_format($total, 2, ",", ".") . '</span>
						</li>';
            }
            ?>
          </ul>
          <div class="col-md-7 col-lg-8">
            <li class="list-group-item d-flex justify-content-between lh-sm">
              <h6 class="my-0">Total: <?php echo $totd?></h6>
            </li>
          </div>



        </div>
        <div class="col-md-7 col-lg-8">
          <h4 class="mb-3">Dados Pessoais</h4>
          <form class="needs-validation" action="../../PagSeguro/pay.php" method="post" novalidate>
            <div class="row g-3">
              <div class="col-sm-6">
                <label for="NomeCompleto" class="form-label">Nome Completo</label>
                <input type="text" class="form-control" id="NomeCompleto" name="NomeCompleto" placeholder="Primeiro Nome" value="" required>
                <div class="invalid-feedback">
                  Valid first name is required.
                </div>
              </div>




              <div class="col-12">
                <label for="cpf" class="form-label">CPF</label>
                <div class="input-group has-validation">

                  <input type="text" class="form-control" id="cpf" name="cpf" placeholder="CPF" required maxlength="11">

                  <div class="invalid-feedback">
                    Your username is required.
                  </div>
                </div>
              </div>

              <div class="col-12">
                <label for="email" class="form-label">Email </label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com">
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
              <div class="col-md-1">
                <label for="Telefone" class="form-label">DDD </label>
                <input type="tel" class="form-control" name="ddd" id="ddd" required>
              </div>
              <div class="col-md-8">
                <label for="Telefone" class="form-label">Telefone </label>
                <input type="tel" class="form-control" name="telefone" id="Telefone" required>
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
              <div class="col-5">
                <label for="cepEndec" class="form-label">CEP</label>
                <input type="text" class="form-control" name="cep" id="cepEndec" placeholder="CEP" required>
                <div class="invalid-feedback">
                  Please enter a valid email address for shipping updates.
                </div>
              </div>
              <div class="col-12">
                <label for="endereco" class="form-label">Endereco</label>
                <input type="text" class="form-control" id="endereco" name="endereco" placeholder="1234 Main St" required>
                <div class="invalid-feedback">
                  Please enter your shipping address.
                </div>
              </div>

              <div class="col-3">
                <label for="numero" class="form-label">Numero</label>
                <input type="text" class="form-control" name="numero" id="numero" placeholder="Apartment or suite">
              </div>

              <div class="col-12">
                <label for="bairroEnd" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairroEnd" name="bairro" placeholder="Apartment or suite">
              </div>

              <div class="col-md-5">
                <label for="cidadeEnd" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidadeEnd" name="cidade" placeholder="Apartment or suite">

                <div class="invalid-feedback">
                  Please select a valid country.
                </div>
              </div>

              <div class="col-md-4">
                <label for="estadoEnd" class="form-label">Estado</label>
                <input type="text" class="form-control" name="estado" id="estadoEnd" placeholder="Apartment or suite">
                <div class="invalid-feedback">
                  Please provide a valid state.
                </div>
              </div>



              <hr class="my-4">

              <h4 class="mb-3">Payment</h4>
              <div class="col-md-6">
                <label for="creditCardNumber" class="form-label">Credit card number</label>
                <div class="input-group">
                  <input type="tel" class="form-control" name="cardNumber" id="cardNumber" placeholder="Valid Card Number" autocomplete="cc-number" required autofocus value="4111 1111 1111 1111" />
                  <span class="input-group-addon">
                    <div class="BandeiraCartao"></div>
                  </span>
                </div>
                <?php
                //Transforma dados do select em array 



                ?>
                <!--<input type="text" class="form-control" id="cardNumber" name="cardNumber" placeholder="" required value="4111111111111111">!-->
                <div class="invalid-feedback">
                  Credit card number is required
                </div>
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

              <div class="col-md-3">
                <label for="creditCardExpMonth" class="form-label">Mês Validade</label>
                <input type="tel" class="form-control" name="cardExpiry" placeholder="MM / YY" autocomplete="cc-exp" required value="12/2030" />
                <!-- <input type="tel" class="form-control" id="creditCardExpMonth" placeholder="" required name="cardExpiry" value="12/2030 ">!-->
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>

              <!--<div class="col-md-3">
                <label for="creditCardExpYear" class="form-label">Ano Validade</label>
                <input type="text" class="form-control" id="creditCardExpYear" placeholder="" required name="creditCardExpYear">
                <div class="invalid-feedback">
                  Expiration date required
                </div>
              </div>!-->

              <div class="col-md-3">
                <label for="creditCardCvv" class="form-label">CVV</label>
                <input type="tel" class="form-control" name="cardCVC" id="creditCardCvv" placeholder="CVV" autocomplete="cc-csc" required value="123" />
                <!--<input type="text" class="form-control" id="creditCardCvv" placeholder="" required name="creditCardCvv" value="123">!-->
                <div class="invalid-feedback">
                  Security code required
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <label for="installmentCheck" class="form-label"> Parcelamentos </label>
              <select name="installments" id="select-installments" class="form-control">
                <option selected>1</option>
              </select>
              <input type="hidden" name="installmentValue">
            </div>

            <!--<input type="text" id="select-installments" name="installments" value="< ?>" hidden>!-->

            <div class="col-md-3">
              <div class="tipoCartao">

              </div>
            </div>

            <hr class="my-4">
            <a href="./cart.php?acao=''" class="btn btn-primary btn-lg">Voltar para o carrinho</a>
            <button class=" btn btn-primary btn-lg" type="submit">Continue to checkout</button>
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
  <script>
    "https://stc.sandbox.pagseguro.uol.com.br/pagseguro/api/v2/checkout/pagseguro.directpayment.js"
  </script>
  <script src="form-validation.js"></script>

  <script>
   
  </script>

  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.8/jquery.mask.min.js" integrity="sha512-hAJgR+pK6+s492clbGlnrRnt2J1CJK6kZ82FZy08tm6XG2Xl/ex9oVZLE6Krz+W+Iv4Gsr8U2mGMdh0ckRH61Q==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script type="text/javascript" src="<?= $JS_FILE_URL ?>"></script>

  <script src="../../PagSeguro/viaCepJs/viaCep.js"></script>
  
  <script>
    $("input[name='cardNumber']").on('keyup', function() {
      var NumeroCartao = $(this).val();
      var QtdCaracteres = NumeroCartao.length;

      if (QtdCaracteres == 6) {
        PagSeguroDirectPayment.getBrand({
          cardBin: NumeroCartao,
          success: function(response) {
            var BandeiraImg = response.brand.name;
            $('.BandeiraCartao').html("<img src=https://stc.pagseguro.uol.com.br/public/img/payment-methods-flags/42x20/" + BandeiraImg + ".png>")
          },
          error: function(response) {
            alert('Cartão não reconhecido');
            $('.BandeiraCartao').empty();
          }
        });
      }
    });
  </script>

  <script>
    
    // Mascaras para input de cep,cpf,telefone    
    $('#cepEndec').mask('00000-000');
    $('#cpf').mask('000.000.000-00', {
      reverse: true
    });
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

    $("#creditCardCvv").on('blur', function() {
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