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
		<form action="" method="post" enctype="multipart/form-data">
			    <?php
			    	if(isset($_GET['editid'])){
			    		$id=$_GET['editid'];
			    		$mysql = "SELECT * FROM future WHERE id='$id'";
			    		if($sql=mysqli_query($db,$mysql)){
			    			while($sqlrun=mysqli_fetch_assoc($sql)){
			    				$id=$sqlrun['id'];
			    				$ftitle=$sqlrun['ftitle'];
			    				$image=$sqlrun['image'];
			    				$detail=$sqlrun['detail'];

			    				echo '
											<div class="form-group" style="display:none;">
												<input type="text" class="form-control" readonly name="id"  value="'.$id.'">
											</div>

											<div class=" form-group">
								 				<input type="text" class="form-control about_select"  name="ftitle"  value="'.$ftitle.'">
											</div>

											<div class="form-group" style="max-height:200px;overflow:hidden">

													<img src="../images/upload/'.$image.'" >
											</div>

								      		<div class="form-group ">
												<input type="FILE" name="mypic" class="file_upload">
											</div>

											<div class="form-group ">
												<textarea class="form-control"  name="detail" rows="5">'.$detail.'</textarea>
												<script>
										            CKEDITOR.replace( "detail" );
										        </script>
											</div>

											<div class="form-group ">
												<input type="submit" class="form-control about_select about_submit" name="submit" value="Update">
											</div>

								      ';
			    			}
			    		}
			    	}
				?>
			    </tbody>
			</table>
		</form>
	</div>
</div>

<?php
	require_once '../pages/footer.php';
	/*Update Query */

    	if(isset($_POST['submit'])){
    		$myid=$_POST['id'];
    		$ftitle=$_POST['ftitle'];
    		$detail=$_POST['detail'];
			/* old system */
			$img_tmp =$_FILES['mypic']['tmp_name'];
			$image=$_FILES['mypic']['name'];
			$image_type =$_FILES['mypic']['type'];
			

			$temp = explode(".",$image);
			$newfile= time().'.'.end($temp);
			$storage=	basename($newfile);
			
			if(empty($ftitle)  || empty($detail)){
				header("Location:postedit.php?editid=".$myid."report=0&action=empty&message=");
			}
			else{
				if (empty($image)) {
					$mysql = "UPDATE future SET ftitle='$ftitle', detail='$detail' WHERE id='$myid'";
					    move_uploaded_file($img_tmp,"../images/upload/".$storage);

						if($sqlrun = mysqli_query($db,$mysql)){
							header("Location:aboutpageupdate.php?report=1&action=update&message=");
						}else{
	    					echo mysqli_error($db);
			    		}
				}else{
					if ($image_type=='image/jpeg' || $image_type=='image/png') {	 
						$mysql = "UPDATE future SET ftitle='$ftitle', image='$storage', detail='$detail' WHERE id='$myid'";
					    move_uploaded_file($img_tmp,"../images/upload/".$storage);

						if($sqlrun = mysqli_query($db,$mysql)){
							header("Location:aboutpageupdate.php?report=1&action=update&message=");
						}else{
	    					echo mysqli_error($db);
			    		}
		    		}
			}
				
   		}
	}
?>