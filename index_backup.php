<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/nav.php";
	require_once "mpages/slider.php";
?>

	

	


<!--Welcome section start -->
	<section class="container-fluid promo-one-fluid">
			<div class="container promo-one-container">
				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 promo-one">
					<div class="promo-inn">		
						<h2><i class="fa fa-quote-left" aria-hidden="true"></i> Mastermind  International School<i class="fa fa-quote-right" aria-hidden="true"></i></h2>
						<img src="images/logo1.png">
					</div>
					<div class="row">
						<div class="col-lg-3 col-md-3 col-sm-3 myinpad  col-xs-12">
							<div class="promo-one-inn">
								<a href="#">
								   <i class="fa fa-user" aria-hidden="true"></i>

								   <h2>Experienced Faculty</h2>
										  <p>Highly Experienced Teaching staffs & office staffs.</p>
								   
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3  myinpad col-xs-12">
							<div class="promo-one-inn">
								<a href="#">
								   <i class="fa fa-television" aria-hidden="true"></i>

								   <h2>Computer Lab</h2>
										  <p>Computer Lab with new version, updated software with skilled computer teachers. </p>
								   
								</a>
							</div>	
						</div>  
						<div class="col-lg-3 col-md-3 col-sm-3  myinpad col-xs-12">
							<div class="promo-one-inn">
								<a href="#">
								 
									<i class="fa fa-check-square-o" aria-hidden="true"></i>


								   <h2>Digital Attendenced</h2>
										  <p>Dot matrix attendance of teachers.Lorem ipsum dolor sit amet, consectetur let. </p>
								   
								</a>
							</div>	
						</div>
						
						<div class="col-lg-3 col-md-3 col-sm-3  myinpad col-xs-12">
							<div class="promo-one-inn">
								<a href="#">
								  <i class="fa fa-cc" aria-hidden="true"></i>

								   <h2>CCTV Monitoring</h2>
										  <p>CCTV Camera covering every class room and every corner of each campus.</p>
								   
								</a>
							</div>	
						</div>
						
						
						<div class="col-lg-3 col-md-3 col-sm-3  myinpad col-xs-12">
							<div class="promo-one-inn">
								<a href="#">
								    <i class="fa fa-book" aria-hidden="true"></i>
								   <h2>Class Facility</h2>
										  <p>Regular German Classes. Lorem ipsum dolor sit amet, consectetur adipisicing dollar. </p>
								   
								</a>
							</div>
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3  myinpad col-xs-12">
							<div class="promo-one-inn">
								<a href="#">
								  <i class="fa fa-window-maximize" aria-hidden="true"></i>

								   <h2> Lab Facility</h2>
										  <p> 	Fully Air-Conditioned Class rooms with Internationally recognized Chemistry, Physics & Biology Labs. </p>
								   
								</a>
							</div>	
						</div>
						<div class="col-lg-3 col-md-3 col-sm-3  myinpad col-xs-12">
							<div class="promo-one-inn">
								<a href="#">
								  <i class="fa fa-tasks" aria-hidden="true"></i>

								   <h2>Activities</h2>
										  <p> 	E.C.A - Twice a week karate, debate & multi cultural activities (e.g. Drama, Music etc.)  </p>
								   
								</a>
							</div>	
						</div>
						
						<div class="col-lg-3 col-md-3 col-sm-3  myinpad col-xs-12">
							<div class="promo-one-inn">
								<a href="#">
								     <i class="fa fa-book" aria-hidden="true"></i>
								   <h2>Classes</h2>
										  <p> 	From Play group to 'O' (X) and 'A' Levels (XI) under the University of Cambridge International Examination U.K</p>
								   
								</a>
							</div>	
						</div>
					</div>
					
					
				</div>
			</div>
	</section>
	
	
<!--Welcome section end -->

<!--bg video section start -->

	<section class="container-fluid bg-video-fluid">
		<div class="container bg-video-container">
		
		</div>
	</section>
	
<!--bg video section end -->

<!--Notice,Principle Message section start -->

	<section class="container-fluid home-promo2-fluid">
		<div class="container home-promo2-container">
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="home-notice">
				
					<h2>Notice</h2>
					<ul style="">
					<?php
						$notice="SELECT * FROM class WHERE category='Notice'";
						if($noticerun=mysql_query($notice)){
							while ($info=mysql_fetch_assoc($noticerun)) {
								$id=$info['id'];
								$class=$info['class'];
								$name=$info['name'];
								$pdf=$info['pdf'];
								echo '<li><a href="scladmin/images/upload/pdf/'.$pdf.'" target="blank"><b>12.11.17 sunday<br/></b> <b>'.$name.'</b><br/>
								For : '.$class.'</a></li>';
							}
						}
					?>
						
						
						
							
					</ul>
						
						
					
						<a href="notice.php" class="hvr-sweep-to-right effect">All <i class="fa fa-list"></i></a>
					
				</div>
			</div>	
			<!-- Principle message start from  here -->
			
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				

				<?php
				$manage="SELECT * FROM future WHERE category='principle'";
					if($minfo=mysql_query($manage)){
						while ($info=mysql_fetch_assoc($minfo)) {
							$id=$info['id'];
							$category=$info['category'];
							$ftitle=$info['ftitle'];
							$detail=$info['detail'];
							$details=substr($info['detail'],0,300)."... ";
							$image=$info['image'];
							echo '<div class="principle-msg">
										<h2>Principal Name</h2>
										
										<p><img src="scladmin/images/upload/'.$image.'" alt="image">
											'.$details.'
										</p>
										<a href="principle.php" class="hvr-sweep-to-right effect">More <i class="fa fa-arrow-right"></i></a>
									</div>
';
				}
			}
				
			?>	
			</div>

			<!-- Principle message end here -->
			
			<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
				<div class="home-recent-activity">
					<div class="home-recent-activity-inn">
						<h2>Recent activity</h2>
						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="padding: 0">
							<div class="recent-img ">
								<img src="images/index.jpg" class="image" alt="image">
								<div class="image-text">
									<p>Name</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="padding: 0">
							<div class="recent-img ">
								<img src="images/index.jpg" class="image" alt="image">
								<div class="image-text">
									<p>Name</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="padding: 0">
							<div class="recent-img ">
								<img src="images/index.jpg" class="image" alt="image">
								<div class="image-text">
									<p>Name</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="padding: 0">
							<div class="recent-img ">
								<img src="images/index.jpg" class="image" alt="image">
								<div class="image-text">
									<p>Name</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="padding: 0">
							<div class="recent-img ">
								<img src="images/index.jpg" class="image" alt="image">
								<div class="image-text">
									<p>Name</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="padding: 0">
							<div class="recent-img ">
								<img src="images/index.jpg" class="image" alt="image">
								<div class="image-text">
									<p>Name</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="padding: 0">
							<div class="recent-img ">
								<img src="images/index.jpg" class="image" alt="image">
								<div class="image-text">
									<p>Name</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="padding: 0">
							<div class="recent-img ">
								<img src="images/index.jpg" class="image" alt="image">
								<div class="image-text">
									<p>Name</p>
								</div>
							</div>
						</div>

						<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12" style="padding: 0">
							<div class="recent-img ">
								<img src="images/index.jpg" class="image" alt="image">
								<div class="image-text">
									<p>Name</p>
								</div>
							</div>
						</div>

						
						
						
					</div>
						<a href="#" class="hvr-sweep-to-right effect">All <i class="fa fa-list"></i></a>
				</div>
			</div>
		</div>
			
		</div>
	</section>
	
<!--Notice,Principle Message section end -->



<?php
	require_once "mpages/footer.php";
?>