<?php
session_start();
require_once('config.php');
require_once('utils.php');
include "../../../connection/connection.php";

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
$shippingAddressStreet = $_POST['bairro'];
$shippingAddressNumber = $_POST['numero'];
$shippingAddressDistrict = $_POST['bairro'];
$shippingAddressPostalCode = $_POST['cep'];
$shippingAddressCity = $_POST['cidade'];
$shippingAddressState = $_POST['estado'];

$senderName = $_POST['NomeCompleto'];
$senderCPF = $_POST['cpf'];
$senderPhone = $_POST['telefone'];
$senderEmail = $_POST['email'];



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
    'senderAreaCode'            => 83,
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

$sql = "INSERT INTO tbl_pedidos (data_pedido,preco_unit_prod,qtd_prod,qtd_parcelas,total_preco_prod,status_entrega,fk_id_cliente,fk_id_pagto)
  VALUES (
    NOW(),".$valItemProd.",".$itemQuantity1.",".$installmentsQty.", ".$itemAmount.",2,".$_SESSION['idLogado'].",1
    );
";
$insert = mysqli_query($conn,$sql);

$header = array('Content-Type' => 'application/json; charset=UTF-8;');
$response = curlExec($PAGSEGURO_API_URL . "/transactions", $params, $header);
$json = json_decode(json_encode(simplexml_load_string($response)));
?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

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

            <p>Valor da Compra: <?php echo $_POST["installments"] . ' x R$ ' .$_POST["installmentValue"];?></p>
          <p>Código da compra: <?php echo $json->code;?> </p>
        </div>
        <div class="modal-footer">
          <a href="../index.php"><button type="button" class="btn btn-default" data-dismiss="modal">Close</button></a>
        </div>
      </div>
      
    </div>
  </div>
  
</div>
  
   <script>
    
       window.onload = function(){
           $("#myModal").modal();
       }

   </script>
   
</body>

</html>