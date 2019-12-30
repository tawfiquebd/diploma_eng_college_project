<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>


<!--History section start -->
	<div class="container-fluid future-fluid">
		<div class="container history-container">
			<?php
				$manage="SELECT * FROM future WHERE category='history' ORDER BY id DESC LIMIT 1";
					if($minfo=mysqli_query($db,$manage)){
						while ($info=mysqli_fetch_assoc($minfo)) {
							$id=$info['id'];
							$category=$info['category'];
							$ftitle=$info['ftitle'];
							$detail=$info['detail'];
							$details=substr($info['detail'],0,50)."...";
							$image=$info['image'];
							echo '<h2>'.$ftitle.'</h2>
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 ">
										<div class="history-image">
											<img src="scladmin/images/upload/'.$image.'" alt="image">
										</div>
									</div>
									
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 history-inn">
										<div class="history-inn-one row">
											
										
												<div class="history-right">
													<p>'.$detail.'</p>
												</div>	
										
										</div>
										
									</div>	';
											}
				}
			?>
			
			
			
		</div>
	</div>
<!--History section end -->

<?php
	require_once "mpages/footer.php";
?>