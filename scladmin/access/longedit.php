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
	<div class="abtupdate">
		<h1>PAGE INFO</h1>
		<h2>UPDATE</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		

		<!-- President speech update here -->
		<form action="" method="post" enctype="multipart/form-data">
			    <?php
			    	if(isset($_GET['editid'])){
			    		$id=$_GET['editid'];
			    		$mysql = "SELECT * FROM longpost WHERE id='$id'";
			    		if($sql=mysqli_query($db,$mysql)){
			    			while($sqlrun=mysqli_fetch_assoc($sql)){
			    				$id=$sqlrun['id'];
			    				$category=$sqlrun['category'];
			    				$name=$sqlrun['name'];
			    				$pdf=$sqlrun['pdf'];

			    				echo '
											<div class="form-group" style="display:none;">
												<input type="text" class="form-control" readonly name="id"  value="'.$id.'">
											</div>

											<div class=" form-group">
								 				<input type="text" class="form-control about_select" readonly  name="typeitem"  value="'.$category.'">
											</div>

											<div class=" form-group">
								 				<input type="text" class="form-control about_select"  name="cname"  value="'.$name.'">
											</div>

											<div class="form-group">
												<div class="pdfuploaded ">
													<a href="../images/upload/pdf/'.$pdf.'"><i class="fa fa-file-pdf-o "></i></a>
												</div>
											</div>

								      		<div class="form-group ">
												<input type="FILE" name="pdf" class="file_upload">
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
		if(isset($_POST['submit'])){
		$id=$_POST['id'];
		$cname=$_POST['cname'];
		$typeitem=$_POST['typeitem'];
		
		/*Pdf upload process start */
	    $pdf_tmp =$_FILES['pdf']['tmp_name'];
	    $pdf_type =$_FILES['pdf']['type'];
	    $pdf=$_FILES['pdf']['name'];
	    $pdftemp = explode(".",$pdf);
	    $pdffile= time().'.'.end($pdftemp);
	    $pdfstorage=basename($pdffile);
	  
		/*Pdf upload process end */
		
		if(empty($pdf)){
				header("Location:longedit.php?editid=".$id."&report=0&action=insert&message='Please Fill All The Field !'");
		}
		else{
			if($pdf_type== "application/pdf"){
				$notice = "UPDATE longpost SET category='$typeitem', name='$cname', pdf='$pdfstorage' WHERE id='$id'";
				if($noticerun = mysqli_query($db,$notice)){
					 move_uploaded_file($pdf_tmp,"../images/upload/pdf/".$pdfstorage);
					header("Location:long.php?report=1&action=update&message=");

				}/* notice true return query end here */
				else{
					header("Location:long.php?report=0&action=update&message=' Please Check Manually'");

					echo mysqli_error($db);
				}/* notice error return query end here */
			}/* if image empty query end here */
			else{
					header("Location:longedit.php?editid=".$id."&report=0&action=pdfselect&message=''");

			}
				
		}
		
	}/* Main if condition end here */
?>