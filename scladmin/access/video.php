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
		<h1>VIDEO ALBUM  </h1>
		<h2>ADD</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<form action="" enctype="multipart/form-data" method="post">
		    <div class="form-group">
			    <select class="form-control about_select" name='typeitem'>
			    	<?php 
			    		$list="SELECT * FROM videosubmenu ORDER BY id DESC";
			    		if($listinfo=mysql_query($list)){
			    			while ($found=mysql_fetch_assoc($listinfo)) {
			    				$category=$found['category'];
			    				echo '<option>'.$category.'</option>';
			    			}
			    		}
			    	?>
			    </select>
		    </div>

		   

			<div class="form-group">
				<input type="text" name="video" class="form-control about_select" placeholder="VIDEO FILE LINK">
			</div>
				       
			<div class="form-group ">
				<input type="submit" class=" about_submit" name="submit" value="VIDEO UPDATE">
			</div>
		</form>
	</div>
</div>

<?php
	require_once '../pages/footer.php';
		if(isset($_POST['submit'])){
		$typeitem=$_POST['typeitem'];
		$video=$_POST['video'];
		

		if( empty($typeitem) || empty($video)){
			header("Location:video.php?report=0&action=empty&message=");

		}
		else{	 
			$mysql = "INSERT INTO video (category,videolink) VALUES ('$typeitem','$video')";
				if($sqlrun = mysql_query($mysql)){
					header("Location:video.php?report=1&action=insert&message= Image inserted");

				}
				else{
					echo mysql_error();
				}
			}
	}
?>