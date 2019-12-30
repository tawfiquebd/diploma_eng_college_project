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

<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<form action="" enctype="multipart/form-data" method="post">
			
			<div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <input type="text" name="roll" class="form-control about_select" placeholder="Board Roll"><?php 
					
				
				
				
				?>
		    </div>
		   
			<div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <select class="form-control about_select" name='department'>
			    	<option >SELECT Department</option>
			    	
					<?php echo class_info(); ?>
			    </select>
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <select class="form-control about_select" name='semester'>
			    	<option >SELECT Semester</option>
			    	<option >1st Semester</option>
			    	<option >2nd Semester</option>
			    	<option >3rd Semester</option>
			    	<option >4th Semester</option>
			    	<option >5th Semester</option>
			    	<option >6th Semester</option>
			    	<option >7th Semester</option>
			    	<option >8th Semester</option>
			    </select>
		    </div>
			
			 <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <select class="form-control about_select" name='subject'>
			    	<option >SELECT Subject</option>
			    	<option >English-1</option>
			    	<option >Physic-1</option>
			    	<option >Physic-2</option>
			    	<option >Math-1</option>
			    	<option >Math-2</option>
			    	<option >Math-3</option>
			    	<option >Bangla</option>
			    	<option >Computer Fundamental</option>
			    </select>
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <input type="text" name="marks" class="form-control about_select" placeholder="Marks">
		    </div>
		   
		    
			<div class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
				</div>
			</div>
			<div class="form-group col-lg-3">
				<input type="submit" class=" about_submit" name="sregistration" value="STUDENT REGISTRATION">
			</div>
		</form>

		<!-- President speech update here -->


	</div>
</div>

<?php
	require_once '../pages/footer.php';
		if(isset($_POST['roll'])){
			$id=$_POST['id'];
			$roll=$_POST['roll'];
			$department=$_POST['department'];
			$semester=$_POST['semester'];
			$subject=$_POST['subject'];
			$marks=$_POST['marks'];
			
		
			if(empty($roll)){
						header("Location:addnewstudent.php?name=".$class."&report=0&action=empty&message=''");
			}

			else{
				 
								$insert52="INSERT INTO marks(roll,department,semester,subject,marks) VALUES('$roll','$department','$semester','$subject','$marks')";
								if($success=mysqli_query($db,$insert52)){
									header("Location:marks.php?name=".$class."&report=1&action=insert&message=''");
								}else{
								
									echo mysqli_error($db);
								}
							
			}/* else if end here */
			
		
	}
?>