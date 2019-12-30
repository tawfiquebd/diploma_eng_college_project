<?php
ob_start();
session_start();
require_once '../db/db.php';
require_once '../pages/head_script.php';
require_once '../pages/header.php';
require_once '../pages/left_menu.php';

if($_SESSION['Uname']){}
else{
	header('Location:../index.php');
}
?>

<?php
	require_once '../pages/footer.php';
?>
