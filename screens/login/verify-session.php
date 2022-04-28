<?php
session_start();
if (!$_SESSION['username']) {
	header('location: ../login/index.php');
	exit();
}
?>