<?php
session_start();
if ($_SESSION['username'] && $_SESSION['category'] != "mecanico") {
	header("location: ../login/index.php");
}
?>