<?php
session_start();

if (!isset($_SESSION['loggedin'])) {
	header("Location: views/loginView.php");
	exit;
}
