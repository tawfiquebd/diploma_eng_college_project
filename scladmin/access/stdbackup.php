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
		<form action="" enctype="multipart/form-data" method="post">
			
			<div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <input type="text" name="stdid" class="form-control about_select" placeholder="Student Id">
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    	<?php 
			    		if(isset($_GET['name'])){
			    			$pclass=$_GET['name'];
			    			echo '<input type="text" name="class" readonly class="form-control about_select" value="'.$pclass.'">';
			    		}
			    	?>
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <select class="form-control about_select" name='sec'>
			    	<option >SELECT SECTION</option>
			    	<option value="a">A</option>
			    	<option value="b">B</option>
			    </select>
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <input type="text" name="croll" class="form-control about_select" placeholder="Class Roll">
		    </div>

		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <input type="text" name="sname" class="form-control about_select" placeholder="Student Name">
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <input type="text" name="fname" class="form-control about_select" placeholder="Father Name">
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <input type="text" name="mname" class="form-control about_select" placeholder="Mother Name">
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <select class="form-control about_select" name='blood'>
			    	<option >BLOOD GROUP</option>
			    	<option value="a+">A+</option>
			    	<option value="a-">A-</option>
			    	<option value="b+">B+</option>
			    	<option value="b-">B-</option>
			    	<option value="Ab+">AB+</option>
			    	<option value="ab-">AB-</option>
			    	<option value="o+">O+</option>
			    	<option value="o-">O-</option>
			    </select>
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <input type="text" name="nationality" class="form-control about_select" placeholder="Nationality">
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <input type="text" name="gphone" class="form-control about_select" placeholder="Home : +88012345">
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <input type="text" name="age" class="form-control about_select" placeholder="Student Age">
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <select class="form-control about_select" name='religion'>
			    	<option >RELIGION</option>
			    	<option value="muslim">MUSLIM</option>
			    	<option value="hindu">HINDU</option>
			    	<option value="buddho">BUDDDHO</option>
			    	<option value="krishtan">KRISHTAN</option>
			    	<option value="other">OTHER</option>
			    </select>
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			    <input type="text" name="hcond" class="form-control about_select" placeholder="Health Condition">
		    </div>
		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			   <select class="form-control about_select" name='gender'>
			    	<option >GENDER</option>
			    	<option value="male">MALE</option>
			    	<option value="female">FE-MALE</option>
			    	<option value="others">OTHERS</option>
			    	<option value="krishtan">KRISHTAN</option>
			    </select>
		    </div>

		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			   <select class="form-control about_select" name='day'>
			    	<option >DAY</option>
			    	<option value="1">1</option>
			    	<option value="2">2</option>
			    	<option value="3">3</option>
			    	<option value="4">4</option>
			    	<option value="5">5</option>
			    	<option value="6">6</option>
			    	<option value="7">7</option>
			    	<option value="8">8</option>
			    	<option value="9">9</option>
			    	<option value="10">10</option>
			    	<option value="11">11</option>
			    	<option value="12">12</option>
			    	<option value="13">13</option>
			    	<option value="14">14</option>
			    	<option value="15">15</option>
			    	<option value="16">16</option>
			    	<option value="17">17</option>
			    	<option value="18">18</option>
			    	<option value="19">19</option>
			    	<option value="20">20</option>
			    	<option value="21">21</option>
			    	<option value="22">22</option>
			    	<option value="23">23</option>
			    	<option value="24">24</option>
			    	<option value="25">25</option>
			    	<option value="26">26</option>
			    	<option value="27">27</option>
			    	<option value="28">28</option>
			    	<option value="29">29</option>
			    	<option value="30">30</option>
			    	<option value="31">31</option>
			    </select>
		    </div>

		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			   <select class="form-control about_select" name='month'>
			    	<option >MONTH</option>
			    	<option value="january">JAN</option>
			    	<option value="february">FEB</option>
			    	<option value="march">MARCH</option>
			    	<option value="april">APR</option>
			    	<option value="may">MAY</option>
			    	<option value="june">JUNE</option>
			    	<option value="july">JULY</option>
			    	<option value="august">AUG</option>
			    	<option value="september">SEP</option>
			    	<option value="october">OCT</option>
			    	<option value="november">NOV</option>
			    	<option value="december">DEC</option>
			    	
			    </select>
		    </div>

		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
			   <input type="text" placeholder="Year : 1996 " class="form-control about_select" name="year">
		    </div>

		    <div class="form-group col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<input type="FILE" name="mypic" class="file_upload">
			</div>
			<div class="form-group col-lg-12 col-md-6 col-sm-6 col-xs-12">
				<div class="row" style="margin:0;padding: 0;">
					<div class="col-lg-6"  style="margin:0;padding: 0 10px;">
					<textarea class="form-control" placeholder="Present Address" rows="5" name='present'></textarea>
					
					</div>
				

				<div class="form-group col-lg-6 col-md-6 col-sm-6 col-xs-12" style="margin:0;padding: 0;">
					<textarea class="form-control" placeholder="Parmanent Address" rows="5" name='parmanent'></textarea>
					
				</div>	
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
		if(isset($_POST['sregistration'])){
			$stdid=$_POST['stdid'];
			$class=$_POST['class'];
			$sec=$_POST['sec'];
			$croll=$_POST['croll'];
			$sname=$_POST['sname'];
			$fname=$_POST['fname'];
			$mname=$_POST['mname'];
			$blood=$_POST['blood'];
			$nationality=$_POST['nationality'];
			$gphone=$_POST['gphone'];
			$age=$_POST['age'];
			$hcond=$_POST['hcond'];
			$religion=$_POST['religion'];
			$day=$_POST['day'];
			$month=$_POST['month'];
			$year=$_POST['year'];
			$present=$_POST['present'];
			$parmanent=$_POST['parmanent'];
		
			/* image insert code start from here */
			$img_tmp =$_FILES['mypic']['tmp_name'];
			$image=$_FILES['mypic']['name'];
			$image_type =$_FILES['mypic']['type'];
			$temp = explode(".",$image);
			$newfile=time().'.'.end($temp);
			$storage=basename($newfile);
			/* image insert code end from here */
			
		
			if(empty($stdid) || empty($class) || empty($sec) || empty($croll) || empty($sname) || empty($fname) || empty($mname) || empty($blood) || empty($nationality) || empty($gphone) || empty($age) || empty($hcond) || empty($religion) || empty($day) || empty($month) || empty($year) || empty($present) || empty($parmanent) || empty($image)){
						header("Location:addnewstudent.php?name=".$class."&report=0&action=empty&message=''");
			}

			else{
				 $found="SELECT * FROM student WHERE std_id='$stdid' AND clsroll='$croll'";
					if ($result = mysql_query($found)) {
							$info=mysql_num_rows($result);
							if($info<1){
								
								
							}else{
							header("Location:addnewstudent.php?name=".$class."&report=0&action=found&message=''");
						}
			}/* else if end here */
			else{
				header("Location:sregister.php?name=".$class."&report=0&action=mediaimage&message=''");

			}
		}/* img type */
	}
?>