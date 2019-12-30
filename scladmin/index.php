<?php 
ob_start();
session_start();
require_once "db/db.php";
if(isset($_POST['login'])){
		$user=$_POST['aduser'];
		$pass=md5($_POST['adpass']);

		if($user == "" || $pass == ""){
			 header("Location:$current_page?report=0&action=insert&message=Please Fill up All Fields!");
		}
		else{
			$user="SELECT * FROM user WHERE user_name='$user' AND pass ='$pass' AND type=1 ";
			if ($ui = mysqli_query($db,$user)) {
					if(mysqli_num_rows($ui)>=1){
						$data= mysqli_fetch_assoc($ui);
						$_SESSION['Uname']= $_POST['aduser'];
						header("Location:access/profile.php");
						
					}
					else{
						header("Location:$current_page?report=0&action=login&message= User Name or Password Wrong !"); 
					}		
				}
				else{
					echo 'Something wrong '.mysqli_error($db);
				}
		}
	}
	else{
		echo mysqli_error($db);
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Chittagong Polytechnic Institute</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="../images/cpilogopng.png" type="image/jpg"> <!-- Favicon -->
  <link rel="stylesheet" href="../css/font-awesome.min.css"> <!-- icofont -->
  
  <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="css/adminstyle.css"/>
  <link rel="stylesheet" type="text/css" href="css/style.css"/>
</head>
<body class="login_body">

<section class="container login_header">
	<div class="row">
		
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="text-align: center;">
			<a href="index.php">Chittagong Polytechnic Institute</a>
		</div>	
	</div>
	
</section>

<section class="container login_content">
	<div class="login_admin_header">
		<h2>Admin Area</h2>
		<p class="left_line hidden-xs hidden-sm"></p>
		<p class="right_line hidden-xs hidden-sm"></p>
		<form class="form-horizontal col-md-offset-3 col-lg-offset-3 col-sm-offset-3 login_form" role="form" method="POST" action="">
			
			<div class="form-group has-feedback col-sm-8">
		      <label for="Name">Username</label>
		      <input type="text" class="form-control" placeholder="Username" name="aduser"> 
		    </div>

		    <div class="form-group has-feedback col-sm-8">
		      <label for="pwd">Password</label>
		      <input type="Password" class="form-control" placeholder="Password" name="adpass"> 
		    </div>

		  

		    <div class="form-group">        
		      <div class="col-sm-8">
		        <button type="submit" class="btn btn-default" name="login">login <span style="color: #7EBA00;"><i class="icofont icofont-login"></i></span></button>
		      </div>
		    </div>
		</form>
	</div>
</section>

<footer class="container">
	<p>&copy; Copyright 2017 - <a target="_blank" href="http://www.ctgpoly.gov.bd" >Chittagong Polytechnic Institute</a> All Right Reserved</p>

</footer>

  <script src="js/jquery.min.js"></script> <!-- jQuery version -->
  <script src="js/bootstrap.min.js"></script> <!-- Bootstrap minified -->
</body>
</html>
