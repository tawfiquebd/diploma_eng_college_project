<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>



<!--Philosophy section start -->
	<div class="container-fluid">
		<div class="container goal-details-container">
			<?php
				if(isset($_GET['id'])){
					$postid=$_GET['id'];
						$manage="SELECT * FROM future WHERE id='$postid'";
							if($minfo=mysql_query($manage)){
								while ($info=mysql_fetch_assoc($minfo)) {
									$id=$info['id'];
									$category=$info['category'];
									$ftitle=$info['ftitle'];
									$detail=$info['detail'];
									$image=$info['image'];
									echo '<h3>'.$ftitle.'</h3>
											<div class="col-lg-6 col--md-6 col-sm-6 col-xs-12 goal-details">
												<img src="scladmin/images/upload/'.$image.'" alt="image">
												<span>Share:</span>
												<a href="https://www.facebook.com/sharer.php?u=https://facebook.com/appsmakerbd" class="facebook customer share" target="blank"><i class="fa fa-facebook" aria-hidden="true"></i></a>


												<a href="https://plus.google.com/share?url=https://plus.google.com/111916659888614305745" class="google_plus google customer share" target="blank" data-action="share" ><i class="fa fa-google-plus " aria-hidden="true"></i></a>

												<a href="https://www.instagram.com" target="blank"><i class="fa fa-instagram" aria-hidden="true"></i></a>

												<a href="https://twitter.com/share?url=https://twitter.com/appsmakerbd" class="twitter customer share" target="blank"><i class="fa fa-twitter" aria-hidden="true"></i></a>
												
											</div>
											<div class="col-lg-6 col--md-6 col-sm-6 col-xs-12 goal-details-p">
												<p>'.$detail.'</p>
											</div>';
						}
					}
				}
			?>	

			
		</div>
	</div>

<!--Philosophy section end -->


<?php
	require_once "mpages/footer.php";
?>