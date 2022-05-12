<?php
$server_name = "127.0.0.1";
$username = "root";
$password = "";
$database_name = "bd_veiculos_tcc";


$conn = mysqli_connect($server_name, $username, $password, $database_name);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Run the create table query




//Close the connection







?>
