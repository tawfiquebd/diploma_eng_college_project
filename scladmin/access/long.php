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
	<div class="right_div">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="form-group">
			    
			    <select class="form-control about_select" name='typeitem'>
			    	<?php 
			    		$list="SELECT * FROM academicor ";
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
			    <input type="text" name="cname" class="form-control about_select" placeholder="POST TITLE">
		    </div>

		    <div class="form-group">
				<input type="FILE" name="pdf" class="file_upload">
			</div>
<!--
			<div class="form-group">
				<textarea class="form-control" rows="5" name='detail'></textarea>
				<script>
		            CKEDITOR.replace( "detail" );
		        </script>
			</div>
-->				       
			<div class="form-group ">
				<input type="submit" class=" about_submit" name="submit" value="PAGE INFO UPDATE">
			</div>
		</form>

		<!-- President speech update here -->

		<table class="table table-hover admin_table">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>CATEGORY</th>
					<th>PDF</th>
					<th>POST TITLE</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$img="SELECT * FROM longpost ORDER BY id DESC";
				if($imgfound=mysqli_query($db,$img)){
					$i=1;
					while($imginfo=mysqli_fetch_assoc($imgfound)){
						$id=$imginfo['id'];
						$name=$imginfo['name'];
						$pdf=$imginfo['pdf'];
						$category=$imginfo['category'];
						if(empty($image)){
							echo '<tr>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">'.$i.'</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">'.$category.'</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
										<div class="pdfuploaded ">
											<a href="../images/upload/pdf/'.$pdf.'"><i class="fa fa-file-pdf-o "></i></a>
										</div>
									</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">'.$name.'</td>

									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
										<a href="longedit.php?editid='.$id.'" ><i class="fa fa-pencil-square-o btn-success ad_edit" aria-hidden="true"></i></a>
										<a href="'.$current_page.'?post_id='.$id.'&action=delete&from=longpost&media=" title="Completely Delete">
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
		
		if(empty($cname) || empty($pdf)){
				header("Location:long.php?report=0&action=insert&message='Please Fill All The Field !'");
		}
		else{
			if($pdf_type== "application/pdf"){
				$notice = "INSERT INTO longpost (category,name,pdf) VALUES ('$typeitem','$cname','$pdfstorage')";
				if($noticerun = mysqli_query($db,$notice)){
					 move_uploaded_file($pdf_tmp,"../images/upload/pdf/".$pdfstorage);
					header("Location:long.php?report=1&action=insert&message=");

				}/* notice true return query end here */
				else{
					header("Location:long.php?report=0&action=insert&message='Insert Fail'");

					echo mysqli_error($db);
				}/* notice error return query end here */
			}/* if image empty query end here */
				
		}
		
	}/* Main if condition end here */
?>