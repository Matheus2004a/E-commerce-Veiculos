<?php
if (!isset($_SESSION)) {
	session_start();
}
if ($_SESSION['username'] && $_SESSION['category'] != "mecanico" || !$_SESSION['username']) {
	header("location: ../login/index.php");
}
?>