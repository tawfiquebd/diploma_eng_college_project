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
	<div class="page_text_imgstory">
		<h1> UPDATED</h1>
		<h2> STORY </h2>
		
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
	<?php 
		$album="SELECT * FROM video GROUP BY category  ORDER BY category";
		if($found=mysql_query($album)){
			while ($ok=mysql_fetch_assoc($found)) {
				$id=$ok['id'];
				$category=$ok['category'];
				echo '<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 " style="padding:0;overflow:hidden">
						<div class="albumname">
							<a href="videoinfo.php?name='.$category.'">
								<i class="fa fa-universal-access fa-spin" aria-hidden="true"></i>

								<h1>'.$category.'</h1>	
							</a>
						</div>
					</div>';
			}
		}
	?>

		


	</div>
</div>

<?php
	require_once '../pages/footer.php';
?>