<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>



<!--photo gallery section start-->
	<section class="container-fluid apps-portfolio-fluid">
			<div class="container">
				<div class="commitee-heading">
					<h2>VIDEO ALBUM</h2>
				</div>
				<div class="row text-center " >
				<?php 
					$album="SELECT * FROM video GROUP BY category  ORDER BY category";
					if($found=mysqli_query($db,$album)){
						while ($ok=mysqli_fetch_assoc($found)) {
							$id=$ok['id'];
							$albumname=$ok['category'];
							$videolink=$ok['videolink'];
							echo '

								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
									<div class="apps-portfolio-img-inn">
										<a href="videoalbum.php?name='.$albumname.'">
				                            <img src="images/freelancer2.jpg" alt="" >
											<span class="left-icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
				                        </a>
										<h3 class="album-heading">'.$albumname.'</h3>
									</div>
								</div>';
						}
					}
				?>	
				<!--<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
					<div class="apps-portfolio-img-inn">
						<a href="images/freelancer2.jpg" data-lightbox-type="image" data-uk-lightbox="{group:'group1'}" title="Title">
                            <img src="images/freelancer2.jpg" alt="" >
							<span class="left-icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
                        </a>
						<h3 class="album-heading">Cultural Program</h3>
					</div>
				</div>-->

						
				
				</div>		
			</div>
		</section>
	
<!--photo gallery section end -->


<?php
	require_once "mpages/footer.php";
?>