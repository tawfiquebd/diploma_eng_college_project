<!DOCTYPE html>
<html>
<head>
	<title>PHP Form Handle</title>
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap3.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<style>
		body{
			margin: 0;
			padding: 0;
			font-family: tahoma;
		}
		.main-content{
			width: 60%;
			max-width: 960px;
			margin: 0 auto;
		}
		.main-content h1{
			margin-bottom: 50px;
		}
		.form-group{
			margin-bottom: 30px;
		}
		.semester{
			margin-bottom: 30px;
		}
		
		.roll-number input {
			padding: 20px;
			display: block;
			border: 1px solid #ccc;
			width: 100%;
			font-size: 20px;
			letter-spacing: 5px;
		}
		.roll-number input:focus {
			box-shadow: 1px 1px 8px #66AFE9;
		}
		.semester select{
			font-size: 20px;
			padding: 20px;
			display: block;
			border: 1px solid #ccc;
			width: 100%;
			font-size: 20px;
			letter-spacing: 5px;
			color: #919191;
		}
		.semester select:focus{
			box-shadow: 1px 1px 8px #66AFE9;
		}
		.btn{
			width: 100%;
		}
		.dropdown-menu{
			width: 100%;
			background: #461F87;
		}
		.dropdown-menu>li>a{
			font-size: 17px;
			text-align: center;
			color: #FFF;
		}

		input[type=number] {
		    -moz-appearance:textfield;
		}
		input[type=number]::-webkit-inner-spin-button, 
		input[type=number]::-webkit-outer-spin-button { 
		  -webkit-appearance: none; 
		  margin: 0; 
		}

		.top-bar{
			margin: 50px 0 140px;
		}
		.button{
			margin-top: 15px;
		}
	</style>
	
	<script src="js/jquery.1.12.4.min.js"></script>
	<script src="js/bootstrap3.min.js"></script>
</head>
<body>


	<div class="main-content">
		<div class="container-fluid">

			<div class="top-bar">
				<div class="col-md-10">
					<h1 class="text-center">Result Search Option</h1>
				</div>

				<div class="col-md-2 button pull-right">
					<a href="http://localhost/college/index.php" class="btn btn-warning navbar-btn">Back</a>
				</div>

			</div>
			
			
			<form action="marksheet.php" method="post" target="_blank">
			
			<div class="form-group roll-number">
			 
			  <input type="number" placeholder="Enter Board Roll" name="roll" required="">
			</div>
			
			<div class="semester">
				 <select name='semester' required="">
			    	<option value="">Select Semester</option>
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
			
			
			<input type="submit" class="btn btn-lg btn-primary" value="Search Result"/>

			<!-- <button type="submit" onclick="myFunction()" class="btn btn-lg btn-primary">Search Result</button> -->
			
			</form>
			
		</div>
	</div>

<!-- <script>
	function myFunction() {
	  var myWindow = window.open("marksheet.php","","width=1366,height=900");
	}
</script> -->

</body>
</html>