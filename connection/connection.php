<?php
$server_name = "banco-epa-remoto.mysql.database.azure.com";
$username = "UserPadrao_EPA";
$password = "vRZb%8T7tguZ";
$database_name = "bd_veiculos_tcc";

$conn = mysqli_connect($server_name, $username, $password, $database_name);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>