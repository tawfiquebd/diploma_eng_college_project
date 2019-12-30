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
		<h1> EVENT </h1>
		<h2>GALLERY</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<table class="table table-hover admin_table">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>IMAGE</th>
					<th>NAME</th>
					<th>POSITION</th>
					<th>OCCUPATION</th>
					<th>FACEBOOK</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$img="SELECT * FROM committiee  ORDER BY id DESC";
				if($imgfound=mysqli_query($db,$img)){
					$i=1;
					while($imginfo=mysqli_fetch_assoc($imgfound)){
						$id=$imginfo['id'];
						$cname=$imginfo['cname'];
						$position=$imginfo['position'];
						$occupation=$imginfo['occupation'];
						$image=$imginfo['image'];
						$facebook=$imginfo['facebook'];

						echo '<tr>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$i.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1" style="display:none;">'.$id.'</td>
								
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									<div class="img_div_uploaded ">
										<img src="../images/upload/'.$image.'"  class="img-responsive img_updated">
									</div>
								</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">'.$cname.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$position.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$occupation.'</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">'.$facebook.'</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									<a href="coedit.php?editid='.$id.'" ><i class="fa fa-pencil-square-o btn-success ad_edit" aria-hidden="true"></i>
									</a>
									<a href="'.$current_page.'?post_id='.$id.'&action=delete&from=committiee&media=" title="Completely Delete">
										    <i class="fa fa-trash ad_delete" aria-hidden="true"></i>
									</a>
								</td>
							</tr>';
							$i++;
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
		$cname=$_POST['cname'];
		$pos=$_POST['pos'];
		$face=$_POST['face'];
		$ocu=$_POST['ocu'];
		$linkedin=$_POST['linkedin'];
		$gplus=$_POST['gplus'];
		$title=$_POST['title'];
		$cate=$_POST['cate'];
		$category=$_POST['category'];
		$img_tmp =$_FILES['mypic']['tmp_name'];
		$image=$_FILES['mypic']['name'];
		$image_type =$_FILES['mypic']['type'];
		$temp = explode(".",$image);
		$newfile=time().'.'.end($temp);
		$storage=basename($newfile);
		
		if(empty($category) || empty($cname) || empty($pos) || empty($face) || empty($ocu) || empty($linkedin) || empty($gplus) || empty($cate) || empty($image)){
				header("Location:mcupdate.php?report=0&action=empty&message= ");

		}
		else{
			if ($image_type=='image/jpeg' || $image_type=='image/png') {	 
				$mysql = "INSERT INTO gallery (category,albumname,album_title,mediaurl,cname,possition,occupation,facebook,gplus,linkedin) VALUES ('$category','$title','$cate','$storage','$cname','$pos','$linkedin','$gplus')";
					move_uploaded_file($img_tmp,"../images/upload/".$storage);
					if($sqlrun = mysqli_query($db,$mysql)){
						header("Location:imagestory.php");
					}
					else{
						echo mysqli_error($db);
					}
				}
				else{
					header("Location:mcupdate.php?report=0&action=mediaimage&message= ");

			}
	}

		


	}
?>