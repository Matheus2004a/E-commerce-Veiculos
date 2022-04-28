<?php
$server_name = "127.0.0.1";
$username = "root";
$password = "Mapef@09112004a";
$database_name = "bd_veiculos_tcc";

// Create connection
$conn = mysqli_connect($server_name, $username, $password, $database_name);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
?>