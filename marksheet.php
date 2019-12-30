<style type="text/css">
	@page{
        size: auto;   /* auto is the initial value */
        margin: 0;  /* this affects the margin in the printer settings */

    }
</style>

<?php
	require_once "scladmin/db/db.php";
	require_once "function_cpi.php";
	//require_once "mpages/head.php";
	//require_once "mpages/header.php";
	//require_once "mpages/navhome.php";
?>
<link rel="stylesheet" href="css/bootstrap3.min.css">
<link rel="stylesheet" href="css/result.css">

<?php 
	if(isset($_POST['roll'])){
		$roll=$_POST['roll'];
		$semester=$_POST['semester'];
		if(!empty($roll) && !empty($semester)){
?>

<?php
	if(isset($_POST['roll'])){
		$roll=$_POST['roll'];
		$semester=$_POST['semester'];

		$sql = "SELECT * FROM marks WHERE roll = '$roll' AND semester = '$semester' ";
		$query = mysqli_query($db,$sql);
		if(mysqli_num_rows($query) < 1 ){
			echo "<h1 style='margin-top:200px;text-align: center; color:red;'>No Result Found</h1>";
			echo "<h5 style='text-align: center; color:#666;'>Contact with your department teacher</h5>";
			exit();
		}
		
		

	}
?>

<body onload="window.print()">
	<div class="total-area">
	
		<header class="header-area">

				<div class="top-area row">
					<div class="logo col-md-2 col-sm-12 text-center">
						<img src="images/logo.png" alt="Cpi Logo">
					</div>

					<div class="col-md-9 col-sm-12 header-text text-center">
						<h2>BANGLADESH TECHNICAL EDUCATION BOARD, DHAKA</h2>
						<h2>CHITTAGONG POLYTECHNIC INSTITUTE, CHITTAGONG</h2>
					</div>
				</div>
		</header>
				<div class="middle-area row">
					<div class="col-md-12 col-sm-12 text-center">
						<h3 style="display:inline-block;padding-bottom:2px;margin-bottom:0;border-bottom: 1px solid #000">ACADEMIC TRANSCRIPT</h3> 
						<h4>DIPLOMA-IN-ENGINEERING (Duration : 4 - Years)</h4>
						<h4>FIRST SEMESTER FINAL EXAMINATION, 2017, 2ND SHIFT</h4>
						<h4>Held in the Month of June-August, 2017</h4>
					</div>
				</div>

				<div class="bottom-area row">
					<div class="col-md-3 col-sm-3">
						<ul>
							<li>Technology</li>
							<li>Name</li>
							<li>Roll No.</li>
							<li>Registration No.</li>
							<li>Session</li>
							<li>Institute Code</li>
						</ul>
					</div>

					<div class="col-md-4 col-sm-4 ">
						<ul>
						<?php
					
							$sql="SELECT * FROM student WHERE boardroll='$roll'";
							if($sql_run=mysqli_query($db,$sql)){
								while($mydata=mysqli_fetch_assoc($sql_run)){
								
										$department= $mydata['department'];
										$sname= $mydata['sname'];
										$boardroll= $mydata['boardroll'];
										$session= $mydata['session'];
										$regnumber= $mydata['regnumber'];
										
										
										echo '
											<li>: &nbsp;'.$department.'</li>
											<li>: &nbsp;'.$sname.'</li>
											<li>: &nbsp;'.$boardroll.'</li>
											<li>: &nbsp;'.$boardroll.'</li>
											<li>: &nbsp;'.$session.'</li>
											<li>: &nbsp;3452535</li>
										
										';
										
										
								}
							}
						
						?>
							
						</ul>
					</div>

					<div class="col-md-5 col-sm-5 pull-right">
						<table class="table table-bordered">
							<thead>
								<tr>
									<th>Class Interval (%)</th>
									<th>Letter Grade</th>
									<th>Grade Point</th>
								</tr>
							</thead>

							<tbody>
							
								<tr>
									<td>80 or above</td>
									<td>A+</td>
									<td>4.00</td>
								</tr>
								
								
								<tr>
									<td>75 -- below 80</td>
									<td>A-</td>
									<td>3.75</td>
								</tr>
								<tr>
									<td>70 -- below 75</td>
									<td>A</td>
									<td>3.50</td>
								</tr>
								<tr>
									<td>65 -- below 70</td>
									<td>B+</td>
									<td>3.25</td>
								</tr>
								<tr>
									<td>60 -- below 65</td>
									<td>B-</td>
									<td>3.00</td>
								</tr>
								<tr>
									<td>55 -- below 60</td>
									<td>B</td>
									<td>2.75</td>
								</tr>
								<tr>
									<td>50 -- below 55</td>
									<td>C+</td>
									<td>2.50</td>
								</tr>
								<tr>
									<td>45 -- below 50</td>
									<td>C</td>
									<td>2.25</td>
								</tr>
								<tr>
									<td>40 -- below 45</td>
									<td>D</td>
									<td>2.00</td>
								</tr>
								<tr>
									<td>Below 40</td>
									<td>F</td>
									<td>0.00</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			
		

		<div class="content-area">
			<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12">
				
				<table class="table-area">
					<thead>
						<tr>
							
							<th class="subject-code">Subject Code</th>
							<th>Subject's Name</th>
							<th>Full Mark</th>
							<th>Obtained Mark</th>
							<th>Letter Grade</th>
							<th>Grade Point</th>
						</tr>
					</thead>

					<tbody>
					<?php
					
								
								
								$sql="SELECT * FROM marks WHERE roll='$roll' AND semester='$semester'";
								if($sql_run=mysqli_query($db,$sql)){
									$koyta_row=mysqli_num_rows($sql_run);
									if($koyta_row>0){
									$total_subject=0;
									$total_gpa=0;
									
									
									
									//echo 'ok';
									while($mydata=mysqli_fetch_assoc($sql_run)){
										$marks= $mydata['marks'];
										$subject= $mydata['subject'];
										$grade=gradeByMarks($marks);
										$point=pointByMarks($marks);
										$total_gpa+=$point;
										$total_subject++;
										
										
										echo '
										<tr>
											<td>6632</td>
											<td>'.$subject.'</td>
											<td>120</td>
											<td>'.$marks.'</td>
											<td>'.$grade.'</td>
											<td>'.$point.'</td>
										</tr>
										';
									}//while ses
									}//Row check 
									else{
										echo '<p style="color:red;font-size:30px;text-align:center;">Sorry, Result not available!<p/>';
									}
								}//mysql_query ses
								else{
									echo mysqli_error($db);
								}

							?>
						

						
					</tbody>
				</table>
				
				<?php
				
				if($koyta_row>0){
					
					?>
				<table class="table">
					<tr>
						<th class="col-md-2">Remarks</th>
						<th class="col-md-6">Passed by supplementary examination</th>
						<th class="col-md-4">GPA (Current Semester)</th>
						<th class="">
						<?php
							$gpa= $total_gpa/$total_subject;
							// echo $gpa;
							echo number_format((float) $gpa, 2, '.', '');  // Outputs -> 4.00

						?>
						</th>
					</tr>
				</table>
				<?php
				}
				else{
					echo '<p style="font-size:30px;text-align:center;color: red;">Try again later or Contact with your department teacher..</p>';
				}
				?>
				
				
			</div>
		</div>

		<div class="footer-area">
			<div class="footer-top">
				<div class="row">
					<div class="col-md-2 col-sm-2"><span>Written by </span></div>
					<div class="col-md-2 col-sm-2"><span>Checked By</span></div>
					<div class="col-md-4 col-sm-4"><span>Chief Instructor (Computer)</span></div>
					<div class="col-md-2 col-sm-2"><span>Vice Principal</span></div>
					<div class="col-md-2 col-sm-2 pull-right"><span>Principal</span></div>
				</div>
			</div>

			<span class="issue-date">Issue Date &nbsp; &nbsp; 29/10/2017</span>
		</div>
	
	</div>
</body>

<?php
		}
		else{
			echo 'Field khali';
		}
	}

else{
	echo 'Bad request';
}
	
?>