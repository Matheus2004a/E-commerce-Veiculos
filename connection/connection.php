<?php
$server_name = "bdtcc.mysql.database.azure.com";
$username = "UserPadrao";
$password = "kGz6o&dvjHzL%YI";
$database_name = "bd_veiculos_tcc";

// Create connection
$conn = mysqli_connect($server_name, $username, $password, $database_name);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>
