<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>



<!--photo gallery section start-->
	<section class="container-fluid apps-portfolio-fluid">
			<div class="container">
				
				<div class="row text-center " >
				<?php 
					if(isset($_GET['name'])){}
						$albumname=$_GET['name'];
					echo '
					<div class="commitee-heading text-left">
					<h2><i class="fa fa-camera"></i> Album Name: '.$albumname.'</h2>
				</div>
					';
						
						
						

					$album="SELECT * FROM gallery WHERE albumname='$albumname'";
					if($found=mysqli_query($db,$album)){
						while ($ok=mysqli_fetch_assoc($found)) {
							$id=$ok['id'];
							$albumname=$ok['albumname'];
							$mediaurl=$ok['mediaurl'];
							echo '

								<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 ">
									<div class="apps-portfolio-img-inn">
										<a href="scladmin/images/upload/'.$mediaurl.'" data-lightbox-type="image" data-uk-lightbox="{group:"group1"}" title="'.$albumname.'">
				                           <div class="albumimage">
				                            <img src="scladmin/images/upload/'.$mediaurl.'" alt="img not found" title="'.$albumname.'">
				                            </div>
											<span class="left-icon"><i class="fa fa-eye" aria-hidden="true"></i></span>
				                        </a>
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