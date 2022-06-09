<?php
//bdtcc.mysql.database.azure.com
//UserPadrao
//kGz6o&dvjHzL%YI
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "bd_veiculos_tcc";


$conn = mysqli_connect($server_name, $username, $password, $database_name, 3307);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Run the create table query




//Close the connection







?>
