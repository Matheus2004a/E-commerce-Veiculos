<?php

$host = 'localhost';

$username = 'root';

$password = '';

$db_name = 'bd_veiculos_tcc';



//Establishes the connection

//$conn = mysqli_init();

$conn= mysqli_connect( $host, $username, $password, $db_name, 3306);

//mysqli_real_connect($conn, $host, $username, $password, $db_name, 3306);



if (!($conn)) {

die('Failed to connect to MySQL: '.mysqli_connect_error());

}

// Run the create table query




//Close the connection







?>
