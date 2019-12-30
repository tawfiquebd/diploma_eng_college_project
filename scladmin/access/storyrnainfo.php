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
	<div class="albuminfo">
		<h1>ALBUM INFO</h1>
		<h2>UPDATE</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		 <?php
	    	if(isset($_GET['name'])){
    			$cls=$_GET['name'];
    			$list="SELECT * FROM class WHERE class='$cls' ";
	    		if($listinfo=mysqli_query($db,$list)){
	    			while ($found=mysqli_fetch_assoc($listinfo)) {
	    				$myclass=$found['class'];
	    				$category=$found['category'];

	    				if($category=='Result'){
	    					echo '<div class="col-lg-4 col-sm-3 col-md-3 col-xs-12 " style="padding:0;overflow:hidden">
										<div class="albumname">
											<a href="stdlist.php?name='.$category.'">
												<i class="fa fa-universal-access fa-spin" aria-hidden="true"></i>

												<h1>Result : '.$category.' </h1>	
											</a>
										</div>
									</div>';
	    				}
	    				elseif($category=='Notice'){
	    					echo '<div class="col-lg-4 col-sm-3 col-md-3 col-xs-12 " style="padding:0;overflow:hidden">
										<div class="albumname">
											<a href="stdlist.php?name='.$category.'">
												<i class="fa fa-universal-access fa-spin" aria-hidden="true"></i>

												<h1>Notice : '.$category.' </h1>	
											</a>
										</div>
									</div>';
	    				}

	    						
	    			}
	    		}

	    	}
	    ?>
	</div>
</div>

<?php
	require_once '../pages/footer.php';
		if(isset($_POST['submit'])){
		$title=$_POST['title'];
		$cate=$_POST['cate'];
		$typeitem=$_POST['typeitem'];
		$img_tmp =$_FILES['mypic']['tmp_name'];
		$image=$_FILES['mypic']['name'];
		$image_type =$_FILES['mypic']['type'];
		$temp = explode(".",$image);
		$newfile=time().'.'.end($temp);
		$storage=basename($newfile);

		if(empty($image)){
			header("Location:albuminfo.php?report=0&action=empty&message=");
		}
		else{
		if ($image_type=='image/jpeg' || $image_type=='image/png') {	 
			$mysql = "INSERT INTO gallery (albumname,mediaurl) VALUES ('$typeitem','$storage')";
				move_uploaded_file($img_tmp,"../images/upload/".$storage);
				if($sqlrun = mysqli_query($db,$mysql)){
					header("Location:albuminfo.php?name=".$typeitem."&report=1&action=insert&message= Image inserted");
				}
				else{
					echo mysqli_error($db);
				}
			}
			else{
				header("Location:albuminfo.php?report=0&action=mediaimage&message= ");
				
		}
	}
	

		


	}
?>