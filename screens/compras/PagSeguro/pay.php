<?php
session_start();
include_once '../cart/template_store/head.html';

require_once('config.php');
require_once('utils.php');
include "../../../connection/connection.php";
require "./insertPedidos.php";

?>

<html>

<head>
  <meta charset="UTF-8">
</head>
<?php


$creditCardToken = htmlspecialchars($_POST["token"]);
$senderHash = htmlspecialchars($_POST["senderHash"]);



$itemAmount = number_format($_POST["amount"], 2, '.', '');
$shippingCoast = number_format($_POST["shippingCoast"], 2, '.', '');
$installmentValue = number_format($_POST["installmentValue"], 2, '.', '');
$installmentsQty = $_POST["installments"];
$itemQuantity1 = $_POST['itemQuantity1'];
$itemDescription1 = $_POST['descricao'];
$itemId1 = $_POST['idProd'];
$valItemProd = $_POST['valProd'];

$shippingAddressStreet = $_POST['endereco'];
$shippingAddressNumber = $_POST['numero'];
$shippingAddressDistrict = $_POST['bairro'];

$shippingAddressPostalCode = $_POST['cep'];
$shippingAddressPostalCode = str_replace("-", "", $shippingAddressPostalCode);
$shippingAddressCity = $_POST['cidade'];
$shippingAddressState = $_POST['estado'];
$senderName = $_POST['NomeCompleto'];
$senderCPF = $_POST['cpf'];
$senderCPF = str_replace(".", "", $senderCPF);
$senderCPF = str_replace("-", "", $senderCPF);
$senderPhone = $_POST['telefone'];
$senderPhone = str_replace("-", "", $senderPhone);
echo $senderPhone . "<br>";
$senderAreaCode = $_POST['ddd'];
$senderEmail = $_POST['email'];
echo $shippingAddressPostalCode . "<br>";
echo $senderCPF . "<br>";
echo $senderAreaCode;

echo $valItemProd."<br>";
echo $itemQuantity1."<br>";
echo $installmentsQty."<br>";
echo $itemAmount."<br>";


//Dados para requisição da api 
$params = array(
  'email'                     => $PAGSEGURO_EMAIL,
  'token'                     => $PAGSEGURO_TOKEN,
  'creditCardToken'           => $creditCardToken,
  'senderHash'                => $senderHash,
  'receiverEmail'             => $PAGSEGURO_EMAIL,
  'paymentMode'               => 'default',
  'paymentMethod'             => 'creditCard',
  'currency'                  => 'BRL',
  // 'extraAmount'               => '1.00',
  'itemId1'                   => $itemId1,
  'itemDescription1'          => $itemDescription1,
  'itemAmount1'               => $itemAmount,
  'itemQuantity1'             => $itemQuantity1,
  'reference'                 => 'REF1234',
  'senderName'                => $senderName,
  'senderCPF'                 => $senderCPF,
  'senderAreaCode'            => $senderAreaCode,
  'senderPhone'               => $senderPhone,
  'senderEmail'               => $senderEmail,
  'shippingAddressStreet'     => $shippingAddressStreet,
  'shippingAddressNumber'     => $shippingAddressNumber,
  'shippingAddressDistrict'   => $shippingAddressDistrict,
  'shippingAddressPostalCode' => $shippingAddressPostalCode,
  'shippingAddressCity'       => $shippingAddressCity,
  'shippingAddressState'      => $shippingAddressState,
  'shippingAddressCountry'    => 'BRA',
  'shippingType'              => 1,
  'shippingCost'              => $shippingCoast,
  'maxInstallmentNoInterest'      => 2,
  'noInterestInstallmentQuantity' => 2,
  'installmentQuantity'       => $installmentsQty,
  'installmentValue'          => $installmentValue,
  'creditCardHolderName'      => 'Chuck Norris',
  'creditCardHolderCPF'       => '54793120652',
  'creditCardHolderBirthDate' => '01/01/1990',
  'creditCardHolderAreaCode'  => 83,
  'creditCardHolderPhone'     => '999999999',
  'billingAddressStreet'     => 'Address',
  'billingAddressNumber'     => '1234',
  'billingAddressDistrict'   => 'Bairro',
  'billingAddressPostalCode' => '58075000',
  'billingAddressCity'       => 'João Pessoa',
  'billingAddressState'      => 'PB',
  'billingAddressCountry'    => 'BRA'
);
//Função responsável para inserir na tabela de pedidos
InsertPedidos($conn,$valItemProd,$itemQuantity1,$installmentsQty,$itemAmount);

$header = array('Content-Type' => 'application/json; charset=UTF-8;');
//Executa requisição da api
$response = curlExec($PAGSEGURO_API_URL . "/transactions", $params, $header);
//Transforma dados em json
$json = json_decode(json_encode(simplexml_load_string($response)));
?>



<body>

  
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Obrigado por comprar conosco</h4>
        </div>
        <div class="modal-body">
          <p>Valor por item: <?php echo $valItemProd ?></p>

          <p>Valor da Compra: <?php echo $_POST["installments"] . ' x R$ ' . $_POST["installmentValue"]; ?></p>
          <p>Código do produto: <?php echo $json->code; ?></p>
        </div>
        <div class="modal-footer">
          <a href="../index.php"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></a>
        </div>
        
      </div>

    </div>
  </div>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script>
    window.onload = function() {
        $("#myModal").modal();
    }
  </script>
</body>
<?php
  mysqli_close($conn);
?>

</html>