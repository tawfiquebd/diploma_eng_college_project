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
		<form action="" enctype="multipart/form-data" method="post">
			<div class="form-group" style="display: none;">
			    <input type="text" name="category"  class="form-control about_select">
		    </div>
			    <?php
			    	if(isset($_GET['name'])){
		    			$album=$_GET['name'];
		    			$list="SELECT * FROM gallery WHERE albumname='$album' LIMIT 1";
			    		if($listinfo=mysqli_query($db,$list)){
			    			while ($found=mysqli_fetch_assoc($listinfo)) {
			    				$category=$found['albumname'];
			    				echo '<div class="form-group"><input type="text" readonly name="typeitem"  class="form-control about_select" value="'.$category.'"></div>
			    				<div class="form-group">
									<input type="FILE" name="mypic" class="file_upload">
								</div>
									       
								<div class="form-group ">
									<input type="submit" class=" about_submit" name="submit" value="'.$category.'">
								</div>
			    				';
			    			}
		    			}
		    		}
			    ?>

			
		</form>

		<!-- President speech update here -->

		<table class="table table-hover admin_table">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>CATEGORY</th>
					<th>IMAGE</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if(isset($_GET['name'])){
		    		$album52=$_GET['name'];
				$img="SELECT * FROM gallery WHERE albumname='$album52' ORDER BY id DESC";
				if($imgfound=mysqli_query($db,$img)){
					$i=1;
					while($imginfo=mysqli_fetch_assoc($imgfound)){
						$dltid=$imginfo['id'];
						$albumname=$imginfo['albumname'];
						$mediaurl=$imginfo['mediaurl'];

						echo '<tr>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$i.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$albumname.'</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									<div class="img_div_uploaded ">
										<img src="../images/upload/'.$mediaurl.'"  class="img-responsive img_updated">
									</div>
								</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									<a href="imageedit.php?editid='.$dltid.'" title="Quick Edit"><i class="fa fa-pencil-square-o btn-success ad_edit" aria-hidden="true"></i>
									</a>
									<a href="'.$current_page.'?post_id='.$dltid.'&name='.$albumname.'&action=delete&from=gallery&media=" title="Completely Delete">
										    <i class="fa fa-trash ad_delete" aria-hidden="true"></i>
									</a>
								</td>
							</tr>';
							$i++;
					}
				}
			}
			?>
				


			</tbody>
		</table>

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