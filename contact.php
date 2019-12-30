<?php
ob_start();
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>

<section class="container-fluid ">
		<div class="container contact-container">
			<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
				<h3>Contact Us</h3>
				 <form method="post" action="">
				  <div class="form-group">
					<input type="text" class="form-control contact-form" name="name" placeholder="Name">
				  </div>
				  
				  <div class="form-group">
					<input type="text" class="form-control contact-form" name="mobile" placeholder="Mobile">
				  </div>
				  
				  <div class="form-group">
					<input type="text" class="form-control contact-form" name="email" placeholder="E-mail">
				  </div>
				  
				  <div class="form-group">
					<input type="text" class="form-control contact-form" name="topic" placeholder="Subject">
				  </div>
				  
				   <div class="form-group">
					  <textarea placeholder="Write your Message Here" class="form-control contact-form" rows="5" name="details" ></textarea>
					</div> 
				  <button type="submit" name="consub" class="btn btn-default contact-button hvr-sweep-to-right">Submit</button>
				</form> 
			</div>
			
			<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 form-address">
				<h3>Campus</h3>
					<ul>
						<li><i class="fa fa-map-marker" aria-hidden="true"></i> Nasriabad Technical Area, Chittagong, Bangladesh</li>
						<li><i class="fa fa-mobile"></i>01558884499</li>
						<li><i class="fa fa-envelope"></i><b>Email:</b> cpicolllege@gmail.com  </li>
					</ul>
			</div>
			
		</div>
	</section>
	
<!--Contact routine section end -->



<!-- google map section html start  -->

	<section class="container-fluid google-map">
		<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3689.5986375215875!2d91.80922981530523!3d22.368778946057486!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30acd8f5243a983d%3A0x867de1c2f217eeb!2sChittagong+Polytechnic+Institute!5e0!3m2!1sen!2sbd!4v1511558161408" width="100%" height="350px" frameborder="0" style="border:0" allowfullscreen></iframe>
	</section>
	
<!-- google map section html end  -->

<!--Contact section start-->
	


<?php
	require_once "mpages/footer.php";
	if(isset($_POST['consub'])){
		$name=$_POST['name'];
		$topic=$_POST['topic'];
		$email=$_POST['email'];
		$mobile=$_POST['mobile'];
		$details=$_POST['details'];
		if(empty($name) || empty($mobile) || empty($email) || empty($topic) || empty($details)){
				header("Location:contact.php?report=0&action=empty&message= ");
		}
		else{
			$insert="INSERT INTO messages(name,mobile,email,topic,details) VALUE('$name','$mobile','$email','$topic','$details')";
			if(mysql_query($insert)){
				header("Location:contact.php?report=1&action=insert&message= ");	
			}else{
				echo mysql_error();
			}
		}
	}
?>