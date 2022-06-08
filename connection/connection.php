<?php
$server_name = "localhost";
$username = "root";
$password = "";
$database_name = "bd_veiculos_tcc";

$conn = mysqli_connect($server_name, $username, $password, $database_name);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>