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
	<div class="page_text_gallery">
		<h1> COMMITTIEE  </h1>
		<h2>UPDATE</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="form-group">
			    <input type="text" name="name" class="form-control about_select" placeholder="Future Title">
		    </div>

		    <div class="form-group">
				<input type="FILE" name="mypic" class="file_upload">
			</div>

			<div class="form-group">
				<textarea class="form-control" rows="5" placeholder="type your future text" name='detail'></textarea>
			</div>
				       
			<div class="form-group ">
				<input type="submit" class=" about_submit" name="submit" value="FUTURE UPDATE">
			</div>
		</form>
	</div>
</div>

<?php
	require_once '../pages/footer.php';
		if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$detail=$_POST['detail'];
		
		$img_tmp =$_FILES['mypic']['tmp_name'];
		$image=$_FILES['mypic']['name'];
		$image_type =$_FILES['mypic']['type'];
		$temp = explode(".",$image);
		$newfile=time().'.'.end($temp);
		$storage=basename($newfile);
		
		
			if(empty($name) || empty($detail) || empty($image)){
						header("Location:future.php?report=0&action=insert&message='Please Fill All The Field !'");
			}
			else{
				if ($image_type=='image/jpeg' || $image_type=='image/png'){
				$mysql = "INSERT INTO future (ftitle,image,detail) VALUES ('$name','$storage','$detail')";
					move_uploaded_file($img_tmp,"../images/upload/".$storage);
					if($sqlrun = mysql_query($mysql)){
						header("Location:future.php?report=1&action=insert&message=");

					}
					else{
						header("Location:future.php?report=0&action=insert&message='Insert Fail'");

						echo mysql_error();
					}
			}
			else{
				echo '<script>alert("Please Chose Jpeg or png file for Client Pict");</script>';
			}
		}/* img type */
	}
?>