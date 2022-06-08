<?php
require "../../PagSeguro/utils.php";
require "../../PagSeguro/config.php";
// pegando session ID
$params = array(
  'email' => $PAGSEGURO_EMAIL,
  'token' => $PAGSEGURO_TOKEN
);
$header = array();

$response = curlExec($PAGSEGURO_API_URL . "/sessions", $params, $header);
$json = json_decode(json_encode(simplexml_load_string($response)));
$sessionCode = $json->id;

echo $sessionCode;


?>

