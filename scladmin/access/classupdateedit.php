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
			    		$mysql = "SELECT * FROM class WHERE id='$id'";
			    		if($sql=mysqli_query($db,$mysql)){
			    			while($sqlrun=mysqli_fetch_assoc($sql)){
			    				$id=$sqlrun['id'];
								$class=$sqlrun['class'];
								$pdf=$sqlrun['pdf'];
								$category=$sqlrun['category'];
								$name=$sqlrun['name'];
								$section=$sqlrun['section'];

			    				echo '
										<div class="form-group" style="display:none">
										    <input type="text" name="id" class="form-control about_select" readonly value="'.$id.'">
									    </div>

									    <div class="form-group">
										    <input type="text" name="class" class="form-control about_select" readonly value="'.$class.'">
									    </div>

									     <div class="form-group">
										    <input type="text" name="section" class="form-control about_select" readonly value="'.$section.'">
									    </div>

									    <div class="form-group">
										    <input type="text" name="typeitem"  class="form-control about_select"  value="'.$category.'">
									    </div>

									    <div class="form-group">
										    <input type="text" name="name"  class="form-control about_select"  value="'.$name.'">
									    </div>

									    <div class="form-group">
										   <a href="../images/update/pdf/'.$pdf.'" target="blank" ><i class="fa fa-file-pdf-o "></i></a>
									    </div>

										<div class="form-group">
											<input type="FILE" name="pdf" class="file_upload">
										</div>
											       
										<div class="form-group ">
											<input type="submit" class=" about_submit" name="submit" value="'.$category.' UPDATE">
										</div>';
			    			}
			    		}
			    	}
				?>
			    
		</form>
	</div>
</div>

<?php
	require_once '../pages/footer.php';
	/*Update Query */

    if(isset($_POST['submit'])){
		$typeitem=$_POST['typeitem'];
		$class=$_POST['class'];
		$section=$_POST['section'];
		$name=$_POST['name'];
		$section=$_POST['section'];
		
		/*Pdf upload process start */
	    $pdf_tmp =$_FILES['pdf']['tmp_name'];
	    $pdf_type =$_FILES['pdf']['type'];
	    $pdf=$_FILES['pdf']['name'];
	    $pdftemp = explode(".",$pdf);
	    $pdffile= time().'.'.end($pdftemp);
	    $pdfstorage=basename($pdffile);
	  
		/*Pdf upload process end */
		
		if(empty($pdf)){
				header("Location:classupdateedit.php?report=0&action=insert&message='Please Fill All The Field !'");
		}
		else{
			if($pdf_type== "application/pdf"){
				$notice = "UPDATE class SET class='$class',category='$typeitem',name='$name',section='$section',pdf='$pdf' WHERE id='$id'";
				if($noticerun = mysql_query($notice)){
					 move_uploaded_file($pdf_tmp,"../images/upload/pdf/".$pdfstorage);
					header("Location:classupdate.php?report=1&action=update&message=");

				}
				else{
					header("Location:classupdateedit.php?report=0&action=update&message='Insert Fail'");

					echo mysqli_error($db);
				}
			}
				
		}
		
	}/* Main if condition end here */
?>