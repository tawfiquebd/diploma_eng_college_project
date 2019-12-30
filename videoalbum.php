<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>



<!--photo gallery section start-->
	<section class="container-fluid apps-portfolio-fluid">
			<div class="container">
				
				<?php 
					if(isset($_GET['name'])){}
						$albumname=$_GET['name'];
					
							
					echo '
					<div class="commitee-heading text-left">
					<h2><i class="fa fa-camera"></i> Album Name: '.$albumname.'</h2>
				</div>
					';
								
							
						echo '<div class="row text-center " >';
					

					$album="SELECT * FROM video WHERE category='$albumname'";
					if($found=mysqli_query($db,$album)){
						while ($ok=mysqli_fetch_assoc($found)) {
							$id=$ok['id'];
							$albumname=$ok['category'];
							$mediaurl=$ok['videolink'];
							echo '<div class="video-gallery-inn col-lg-4 col-md-4 col-sm-4 col-xs-12">
									<a href="'.$mediaurl.'" data-lightbox-type="video" data-uk-lightbox="{group:"group1"}" title="Title">
				                        <img src="images/freelancer2.jpg" alt="" >
										<i class="fa fa-video-camera vdo-icon"></i>
				                    </a>
								</div>';
						}
					}
				?>	
				

						
				
				</div>		
			</div>
		</section>
		<br><br>
	
<!--photo gallery section end -->


<?php
	require_once "mpages/footer.php";
?>