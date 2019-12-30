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
					<h2>Photo Album</h2>
				</div>
				<div class="row text-center " >
				<?php 
					$album="SELECT * FROM gallery GROUP BY albumname  ORDER BY albumname";
					if($found=mysqli_query($db,$album)){
						while ($ok=mysqli_fetch_assoc($found)) {
							$id=$ok['id'];
							$albumname=$ok['albumname'];
							$mediaurl=$ok['mediaurl'];
							echo '

								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 ">
									<div class="apps-portfolio-img-inn">
										<a href="album.php?name='.$albumname.'">
				                            <img src="scladmin/images/upload/'.$mediaurl.'" alt="" title="'.$albumname.'" >
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