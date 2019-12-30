
<?php
ob_start();
session_start();
require_once '../db/db.php';
if($_SESSION['Uname']){
	require_once '../pages/head_script.php';
	require_once '../pages/header.php';
	require_once '../pages/left_menu.php';
}
else{
	header("Location:../index.php");
}


?>
<div class="col-lg-1 col-sm-1 col-md-1 col-xs-12">
	<div class="img_gallery">
		<h1>ALBUM IMAGE  </h1>
		<h2>ADD</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<h1>UNION DETAILS</h1>
		<?php
			$union ="SELECT category FROM future UNION SELECT category FROM imagessubmenu ORDER BY category";
			if($found=mysql_query($union)){
				while ($ok=mysql_fetch_assoc($found)) {
					$category=$ok['category'];
					echo "Category List are : ".$category;
				}
			}
		?>
	</div>
</div>

<?php
	require_once '../pages/footer.php';
?>