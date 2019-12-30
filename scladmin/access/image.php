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
		<form action="" enctype="multipart/form-data" method="post">
			<div class="form-group" style="display: none;">
			    <input type="text" name="category"  class="form-control about_select">
		    </div>
		    <div class="form-group">
			    <select class="form-control about_select" name='typeitem'>
			    	<?php 
			    		$list="SELECT * FROM imagesubmenu ORDER BY id DESC";
			    		if($listinfo=mysqli_query($db,$list)){
			    			while ($found=mysqli_fetch_assoc($listinfo)) {
			    				$category=$found['category'];
			    				echo '<option>'.$category.'</option>';
			    			}
			    		}
			    	?>
			    </select>
		    </div>

		   

			<div class="form-group">
				<input type="FILE" name="mypic" class="file_upload">
			</div>
				       
			<div class="form-group ">
				<input type="submit" class=" about_submit" name="submit" value="ALBUM IMAGE UPDATE">
			</div>
		</form>
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

		if( empty($typeitem) || empty($image)){
			header("Location:image.php?report=0&action=empty&message=");

		}
		else{
		if ($image_type=='image/jpeg' || $image_type=='image/png') {	 
			$mysql = "INSERT INTO gallery (albumname,mediaurl) VALUES ('$typeitem','$storage')";
				move_uploaded_file($img_tmp,"../images/upload/".$storage);
				if($sqlrun = mysqli_query($db,$mysql)){
					header("Location:imgstory.php?report=1&action=insert&message= Image inserted");

				}
				else{
					echo mysqli_error($db);
				}
			}
			else{
				header("Location:image.php?report=0&action=mediaimage&message= ");
				
		}
	}
	

		


	}
?>