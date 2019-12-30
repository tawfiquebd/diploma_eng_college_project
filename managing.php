<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>


<!--Managing Commitee section start-->
	<section class="container-fluid commitee-fluid">
		<div class="container commitee-container">
			<div class="commitee-heading">
				<h2>Managing Committee</h2>
			</div>
			<?php
				$manage="SELECT * FROM committiee ORDER BY id DESC";
				if($minfo=mysqli_query($db,$manage)){
					while ($info=mysqli_fetch_assoc($minfo)) {
						$id=$info['id'];
						$cname=$info['cname'];
						$position=$info['position'];
						$occupation=$info['occupation'];
						$image=$info['image'];
						$facebook=$info['facebook'];
						$gplus=$info['gplus'];
						$linkedin=$info['linkedin'];
						echo '<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 ">
								<div class="commitee-inn">
									<div>
										<img src="scladmin/images/upload/'.$image.'" alt="image">
									</div>
									<p class="commitee-name">'.$cname.'</p>
									<div class="commitee-hover">
										<span>
											<h4>'.$cname.'</h4>
											<h4>'.$position.'</h4>
											<h4>'.$occupation.'</h4>
											<a href="'.$facebook.'"><i class="fa fa-facebook"></i></a>
											<a href="'.$gplus.'"><i class="fa fa-google-plus"></i></a>
											<a href="'.$linkedin.'"><i class="fa fa-linkedin"></i></a>
										</span>
									</div>
								</div>				
							</div>';
					}
				}
			?>
		</div>
	</section>
<!--Managing Commitee section end -->


<?php
	require_once "mpages/footer.php";
?>