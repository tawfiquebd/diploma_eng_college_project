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
			    		$list="SELECT * FROM resultnotice ";
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
		    	<select class="form-control about_select" name='clsname'>
			    	<option>==SELECT Department==</option>
			    	<option>Computer Technology</option>
			    	<option>Environment Technology </option>
			    	<option>Power Technology</option>
			    	<option>Electrical Technology</option>
			    	<option>Electronics Technology</option>
			    	<option>Civil Technology</option>
			    </select>
		    </div>


		    <div class="form-group">
		    	<select class="form-control about_select" name='section'>
			    	<option>==SELECT Session==</option>
			    	<option>13-14</option>
			    	<option>14-15</option>
			    	<option>15-17</option>
			    </select>
		    </div>

		   <div class="form-group">
			    <input type="text" name="name" class="form-control about_select" placeholder="POST TITLE">
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
					<th>CLASS</th>
					<th>CATEGORY</th>
					<th>PDF</th>
					<th>POST TITLE</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$img="SELECT * FROM class ORDER BY id DESC";
				if($imgfound=mysqli_query($db,$img)){
					$i=1;
					while($imginfo=mysqli_fetch_assoc($imgfound)){
						$id=$imginfo['id'];
						$class=$imginfo['class'];
						$pdf=$imginfo['pdf'];
						$category=$imginfo['category'];
						$name=$imginfo['name'];
						if(empty($image)){
							echo '<tr>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">'.$i.'</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">'.$class.'</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
										<div class="pdfuploaded ">
											<a href="../images/upload/pdf/'.$pdf.'"><i class="fa fa-file-pdf-o "></i></a>
										</div>
									</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">'.$category.'</td>
									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">'.$name.'</td>

									<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
										<a href="classupdateedit.php?editid='.$id.'" ><i class="fa fa-pencil-square-o btn-success ad_edit" aria-hidden="true"></i></a>
										<a href="'.$current_page.'?post_id='.$id.'&action=delete&from=class&media=" title="Completely Delete">
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
		$typeitem=$_POST['typeitem'];
		$clsname=$_POST['clsname'];
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
		
		if(empty($clsname) || empty($pdf)){
				header("Location:classupdate.php?report=0&action=insert&message='Please Fill All The Field !'");
		}
		else{
			if(!empty($pdf_type)){
				$notice = "INSERT INTO class (class,category,name,section,pdf) VALUES ('$clsname','$typeitem','$name','$section','$pdfstorage')";
				if($noticerun = mysqli_query($db,$notice)){
					 move_uploaded_file($pdf_tmp,"../images/upload/pdf/".$pdfstorage);
					header("Location:classupdate.php?report=1&action=insert&message=");

				}/* notice true return query end here */
				else{
					header("Location:classupdate.php?report=0&action=insert&message='Insert Fail'");

					echo mysqli_error($db);
				}/* notice error return query end here */
			}
			else{
				echo $pdf_type;
			}
				
		}
			}
		
?>