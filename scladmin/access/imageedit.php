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
			    		$mysql = "SELECT * FROM gallery WHERE id='$id'";
			    		if($sql=mysqli_query($db,$mysql)){
			    			while($sqlrun=mysqli_fetch_assoc($sql)){
			    				$id=$sqlrun['id'];
			    				$medialurl=$sqlrun['mediaurl'];
			    				$albumname=$sqlrun['albumname'];

			    				echo '
											<div class="form-group" style="display:none;">
												<input type="text" class="form-control" readonly name="id"  value="'.$id.'">
											</div>

											<div class=" form-group">
												<input type="text" class="form-control about_select"  name="albumname" readonly value="'.$albumname.'">
											</div>

									      		<div class="form-group" style="max-height:200px;overflow:hidden">

													<img src="../images/upload/'.$medialurl.'" >
												</div>

								      			<div class="form-group ">
													<input type="FILE" name="mypic" class="file_upload">
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
    		$albumname=$_POST['albumname'];
			/* old system */
			$img_tmp =$_FILES['mypic']['tmp_name'];
			$image=$_FILES['mypic']['name'];
			$image_type =$_FILES['mypic']['type'];
			$temp = explode(".",$image);
			$newfile= time().'.'.end($temp);
			$storage=	basename($newfile);
			
			if(empty($image)){
				header("Location:imageedit.php?editid=".$myid."&report=0&action=imgselect&message=");
			}
			else{
				if ($image_type=='image/jpeg' || $image_type=='image/png') {	 
					$mysql = "UPDATE gallery SET mediaurl='$storage', albumname='$albumname' WHERE id='$myid'";
					if($sqlrun = mysqli_query($db,$mysql)){
						move_uploaded_file($img_tmp,"../images/upload/".$storage);
						header("Location:albuminfo.php?name=".$albumname."&report=1&action=update&message=");
					}
					else{
						header("Location:imageedit.php?report=0&action=update&message=");
					}
	    		}
	    	}/* condition else end here */
    }
?>