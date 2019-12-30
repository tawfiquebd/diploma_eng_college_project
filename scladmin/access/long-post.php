<?php
ob_start();
session_start();
require_once '../db/db.php';
require_once '../pages/head_script.php';
require_once '../pages/header.php';
require_once '../pages/left_menu.php';
if($_SESSION['Uname']){
}else{
	header('Location:../index.php');
}
?>
<div class="col-lg-1 col-sm-1 col-md-1 col-xs-12">
	<div class="page_text_gallery">
		<h1> ABOUT </h1>
		<h2>UPDATE</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<?php
			if(isset($_GET['category'])){
				$mycategory=$_GET['category'];
				$about="SELECT * FROM post WHERE category = '$mycategory'";
				if($abfound=mysqli_query($db,$about)){
					while ($found=mysqli_fetch_assoc($abfound)) {
						$id=$found['id'];
						$category=$found['category'];
						$posttitle=$found['posttitle'];
						$postdetail=$found['postdetail'];

						echo '<form class="" method="POST">
							    <div class="form-group">
								    <input type="text" name="id" style="display:none;" class="form-control about_select" value="'.$id.'">
							    </div>

							    <div class="form-group">
								    <input type="text" name="cate" readonly class="form-control about_select" value="'.$category.'">
							    </div>

							    <div class="form-group">
								    <input type="text" name="title" class="form-control about_select" value="'.$posttitle.'">
							    </div>

							    <div class="form-group has-feedback">
							    <script>
							            CKEDITOR.replace( "detail" );
							        </script>
							    <textarea class="form-control about_text_area " rows="5" name="detail">'.$postdetail.'
							   </textarea>
								     
							    </div>

							    <div class="form-group">
							     	<input type="submit" name="aupdate" value="ABOUT UPDATE" class="about_submit">
							    </div>  
							</form>';
						
					}
				}
			}
			else{
				echo "category not found";
			}
		?>	
		
	</div>
</div>

<?php
	require_once '../pages/footer.php';

	if(isset($_POST['aupdate'])){
		$id=$_POST['id'];
		$category=$_POST['cate'];
		$ptitle=$_POST['title'];
		$pdetail=$_POST['detail'];
		
		$update ="UPDATE post SET category='$category', posttitle='$ptitle' , postdetail='$pdetail' WHERE id='$id'";
		if($success=mysqli_query($db,$update)){
			header("Location:aboutlist.php");
		}
		else{

			echo "Bug Found ".mysqli_error($db);
		}
	}
?>
