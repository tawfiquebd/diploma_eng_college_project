<?php 
ob_start();
session_start();
require_once "db/db.php";

if(isset($_POST['login'])){
		$user=$_POST['aduser'];
		$pass=md5($_POST['adpass']);

		if($user == "" || $pass == ""){
			echo '<script>alert("You cant login Now..");</script>';
		}
		else{
			$suser="SELECT * FROM user WHERE user_name='$user' AND pass ='$pass' AND type='1'";
			if($sql=mysqli_query($db,$suser)){

				while($sqluser=mysqli_fetch_assoc($sql)) {
					$_SESSION["uname"]=$sqluser['aduser'];
					header("Location:index.php");
				}			
			}
			else{
				echo mysqli_error($db);
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
  <title>MASTER MIND SCHOOL ADMIN PANEL</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/font-awesome.min.css"> <!-- fontawesome -->

  <link rel="stylesheet" href="css/bootstrap.min.css"> <!-- Bootstrap -->
  <link rel="stylesheet" type="text/css" href="css/adminstyle.css"/>
</head>
<body class="login_body">

<section class="container login_header">
	<div class="row">
		
		<div class="col-md-12 col-lg-12 col-sm-12 col-xs-12" style="text-align: center;">
			<a href="index.php">MASTER MIND ADMIN PANEL</a>
		</div>	
	</div>
	
</section>

<section class="container login_content">
	<div class="login_admin_header">
		<h2>Admin Login</h2>
		<p class="left_line hidden-xs hidden-sm"></p>
		<p class="right_line hidden-xs hidden-sm"></p>
		<form class="form-horizontal col-md-offset-3 col-lg-offset-3 col-sm-offset-3 login_form" role="form" method="POST" action="">
			
			<div class="form-group has-feedback col-sm-8">
		      <label for="Name">Email or Username</label>
		      <input type="text" class="form-control" placeholder="Enter Your E-mail or Username" name="aduser">
		      <span class="form-control-feedback"><i class="fa fa-users"></i></span>
		    </div>

		    <div class="form-group has-feedback col-sm-8">
		      <label for="pwd">Password</label>
		      <input type="Password" class="form-control" placeholder="Enter Your Password" name="adpass">
		      <span class="form-control-feedback"><i class="fa fa-lock"></i></span>
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
	<p>&copy; Copyright <a href="http://www.mastermindctg.com" target="_blank">MASTER MIND CTG </a> All Right Reserved</p>
</footer>

  <script src="js/jquery.min.js"></script> <!-- jQuery version -->
  <script src="js/bootstrap.min.js"></script> <!-- Bootstrap minified -->
</body>
</html>
