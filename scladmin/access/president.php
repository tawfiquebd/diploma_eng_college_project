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
		<h1> POST  </h1>
		<h2>UPDATE</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="form-group">
			    
			    <select class="form-control about_select" name='typeitem'>
			    	<?php 
			    		$list="SELECT * FROM submenu ";
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
			    <input type="text" name="name" class="form-control about_select" placeholder="POST TITLE">
		    </div>

		    <div class="form-group">
				<input type="FILE" name="mypic" class="file_upload">
			</div>

			<div class="form-group">
				<textarea class="form-control" rows="5" placeholder="POST DETAILS TEXT...." name='detail'></textarea>
			</div>
				       
			<div class="form-group ">
				<input type="submit" class=" about_submit" name="submit" value="FUTURE UPDATE">
			</div>
		</form>

		<!-- President speech update here -->

		<table class="table table-hover admin_table">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>CATEGORY</th>
					<th>IMAGE</th>
					<th>POST TYPE/FOR</th>
					<th>DETAILS</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$img="SELECT * FROM future ORDER BY id DESC";
				if($imgfound=mysql_query($img)){
					while($imginfo=mysql_fetch_assoc($imgfound)){
						$id=$imginfo['id'];
						$ftitle=$imginfo['ftitle'];
						$image=$imginfo['image'];
						$detail=$imginfo['detail'];
						$category=$imginfo['category'];

						echo '<tr>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$id.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$category.'</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									<div class="img_div_uploaded ">
										<img src="../images/upload/'.$image.'"  class="img-responsive img_updated">
									</div>
								</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">'.$ftitle.'</td>
								<td class="col-lg-4 col-sm-4 col-md-4 col-xs-4">'.$detail.'</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
								
									<a href="postedit.php?editid='.$id.'" ><i class="fa fa-pencil-square-o btn-success ad_edit" aria-hidden="true"></i></a>
									<a href="'.$current_page.'?post_id='.$id.'&action=delete&from=future&media=" title="Completely Delete">
										    <i class="fa fa-trash ad_delete" aria-hidden="true"></i>
										 </a>
								</td>
							</tr>';
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
		$name=$_POST['name'];
		$detail=$_POST['detail'];
		$typeitem=$_POST['typeitem'];
		
		$img_tmp =$_FILES['mypic']['tmp_name'];
		$image=$_FILES['mypic']['name'];
		$image_type =$_FILES['mypic']['type'];
		$temp = explode(".",$image);
		$newfile=time().'.'.end($temp);
		$storage=basename($newfile);
		
		
			if(empty($name) || empty($detail) || empty($image)){
						header("Location:president.php?report=0&action=insert&message='Please Fill All The Field !'");
			}
			else{
				if ($image_type=='image/jpeg' || $image_type=='image/png'){
				$mysql = "INSERT INTO future (category,ftitle,image,detail) VALUES ('$typeitem','$name','$storage','$detail')";
					move_uploaded_file($img_tmp,"../images/upload/".$storage);
					if($sqlrun = mysql_query($mysql)){
						header("Location:president.php?report=1&action=insert&message=");

					}
					else{
						header("Location:president.php?report=0&action=insert&message='Insert Fail'");

						echo mysql_error();
					}
			}
			else{
				echo '<script>alert("Please Chose Jpeg or png file for Client Pict");</script>';
			}
		}/* img type */
	}
?>