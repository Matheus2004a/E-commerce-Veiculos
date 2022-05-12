<?php
session_start();
if (!$_SESSION['username'] && $_SESSION['category'] != "Mecânico") {
	header('location: ../login/index.php');
	exit();
}
?>