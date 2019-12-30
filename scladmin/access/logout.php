<?php
	ob_start();
	session_start();
	require_once "../db/db.php";
	session_destroy();
	header('Location:../index.php');
?>