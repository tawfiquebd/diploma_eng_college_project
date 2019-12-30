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
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	<div class="text-center abtupdate">
		<h1>Add New Post</h1>
	</div>
</div>
<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
	<div class="right_div">
		
<?php 
if(isset($_GET['type']) && $_GET['type']=='update'){
    ?>
    
    	<!-- President speech update here -->

		<table class="table table-hover admin_table">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>Page</th>
					<th>IMAGE</th>
					<th>POST TYPE/FOR</th>
					<th>DETAILS</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$img="SELECT * FROM future ORDER BY id DESC";
				if($imgfound=mysqli_query($db,$img)){
					$i=1;
					while($imginfo=mysqli_fetch_assoc($imgfound)){
						$id=$imginfo['id'];
						$ftitle=$imginfo['ftitle'];
						$image=$imginfo['image'];
						$detail=$imginfo['detail'];
						$edetails=substr($imginfo['detail'],0,50)."...";
						
						$category=$imginfo['category'];
						if(empty($image)){
							echo '<tr>
									<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$i.'</td>
									<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$category.'</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
										<div class="img_div_uploaded ">
											<h1>No</h1>
										</div>
									</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">'.$ftitle.'</td>
									<td class="col-lg-4 col-sm-4 col-md-4 col-xs-4">'.$edetails.'</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									
										<a href="postedit.php?editid='.$id.'" ><i class="fa fa-pencil-square-o btn-success ad_edit" aria-hidden="true"></i></a>
										<a href="'.$current_page.'?post_id='.$id.'&action=delete&from=future&media=" title="Completely Delete">
											    <i class="fa fa-trash ad_delete" aria-hidden="true"></i>
											 </a>
									</td>
								</tr>';
								$i++;
						}
						
						else{
							echo '<tr>
									<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$i.'</td>
									<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$category.'</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
										<div class="img_div_uploaded ">
											<img src="../images/upload/'.$image.'"  class="img-responsive img_updated">
										</div>
									</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">'.$ftitle.'</td>
									<td class="col-lg-4 col-sm-4 col-md-4 col-xs-4">'.$edetails.'</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									
										<a href="postedit.php?editid='.$id.'" ><i class="fa fa-pencil-square-o btn-success ad_edit" aria-hidden="true"></i></a>
										<a href="'.$current_page.'?post_id='.$id.'&action=delete&from=future&media=" title="Completely Delete">
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
		<?php
}
else{
?>

<form action="" enctype="multipart/form-data" method="post">
			<div class="form-group">
			    
			    <select class="form-control about_select" name='typeitem'>
			    	<?php 
			    		$list="SELECT * FROM submenu WHERE category_group='new_add' ";
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
			    <input type="text" name="name" class="form-control about_select" placeholder="POST TITLE">
		    </div>

		    <div class="form-group">
				<input type="FILE" name="mypic" class="file_upload">
			</div>

			<div class="form-group">
				<textarea class="form-control" rows="5" name='detail'></textarea>
				<script>
		            CKEDITOR.replace( "detail" );
		        </script>
			</div>
				       
			<div class="form-group ">
				<input type="submit" class=" about_submit" name="submit" value="Post">
			</div>
		</form>
<?php
    
}
?>
	

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
		
		if(empty($name) || empty($detail)){
				header("Location:aboutpageupdate.php?report=0&action=insert&message='Please Fill All The Field !'");
		}
		else{
				if($image==''){
					$notice = "INSERT INTO future (category,ftitle,detail) VALUES ('$typeitem','$name','$detail')";
					if($noticerun = mysqli_query($db,$notice)){
						header("Location:aboutpageupdate.php?report=1&action=insert&message=");

					}/* notice true return query end here */
					else{
						header("Location:aboutpageupdate.php?report=0&action=insert&message='Insert Fail'");

						echo mysql_error();
					}/* notice error return query end here */
				}/* if image empty query end here */
				else{
					if ($image_type=='image/jpeg' || $image_type=='image/png'){
						$mysql = "INSERT INTO future (category,ftitle,image,detail) VALUES ('$typeitem','$name','$storage','$detail')";
						move_uploaded_file($img_tmp,"../images/upload/".$storage);
						if($sqlrun = mysqli_query($db,$mysql)){
							header("Location:aboutpageupdate.php?report=1&action=insert&message=");

						}
						else{
							header("Location:aboutpageupdate.php?report=0&action=insert&message='Insert Fail'");

							echo mysql_error();
						}
				}/* image type check condition end here  */
				else{
					header("Location:aboutpageupdate.php?report=0&action=mediaimage&message=''");
				}/* image file formate error else end here */
			}/* if image not empty this else condition end here */
		}
		
	}/* Main if condition end here */
?>