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
			if (isset($_GET['notice'])) {
				$notice_id=$_GET['notice'];
				$manage="SELECT * FROM future WHERE id='$notice_id'";
					if($minfo=mysqli_query($db,$manage)){
						while ($info=mysqli_fetch_assoc($minfo)) {
							$id=$info['id'];
							$category=$info['category'];
							$ftitle=$info['ftitle'];
							$detail=$info['detail'];
							$details=substr($info['detail'],0,50)."...";
							$image=$info['image'];
							$added_date=$info['added_date'];
							$added_date=strtotime($added_date);
							$added_date1=date('d/M/y - h:i a',$added_date);
							if (!empty($image)) {
								echo '
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 ">
										<div class="history-image">
											<img src="scladmin/images/upload/'.$image.'" alt="image">
										</div>
									</div>
									
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 history-inn">
										<div class="history-inn-one row">
												
										
												<div class="history-right custom-p">
													<h5 class="text-left custom-h">'.$ftitle.' <small><i class="fa fa-clock-o" aria-hidden="true"></i> '.$added_date1.'</small> <a class="btn btn-danger custom-a-danger" href="notice.php"  title="Go Back"><i class="fa fa-undo " aria-hidden="true"></i></a></h5>
													<hr>
													'.$detail.'
												</div>
												
										
										</div>
										
									</div>	';
							}else{
								echo '
									<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 history-inn">
										<div class="history-inn-one row">
												<div class="history-right custom-p">
													<h5 class="text-left custom-h">'.$ftitle.' <small><i class="fa fa-clock-o" aria-hidden="true"></i> '.$added_date1.'</small><a class="btn btn-danger custom-a-danger" href="notice.php" title="Go Back"><i class="fa fa-undo " aria-hidden="true"></i></a></h5>
													<hr>
													'.$detail.'
												</div>	
												
										
										</div>
										
									</div>	';
							}
							
											}
						}
				}
			?>
			
			
			
		</div>
	</div>
<!--History section end -->


<?php
	require_once "mpages/footer.php";
?>