<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>

<!--class Duration section start -->

<div class="container class-duration-container">
	<div class="row">
		<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 notice_attractive">
		<?php
			if (isset($_GET['editid'])) {
				$class=$_GET['editid'];
			}
			echo '<h3>Notice/Event of CLass : '.$class.' | <a class="btn btn-danger custom-a-danger" href="notice.php"  title="Go Back"><i class="fa fa-undo " aria-hidden="true"></i></a></h3>';
			
				$manage="SELECT * FROM class WHERE class='$class' ORDER BY id DESC ";
					if($minfo=mysql_query($manage)){
						while ($info=mysql_fetch_assoc($minfo)) {
							$id=$info['id'];
							$category=$info['category'];
							$ftitle=$info['name'];
							//$detail=$info['detail'];
							//$details=substr($info['detail'],0,60)."...";
							$image=$info['pdf'];
							$added_date=$info['added_date'];
							$added_date=strtotime($added_date);
							$added_date1=date('d/M/y - h:i a',$added_date);
							if ($category=='event') {
								$class='class="event-ribbon"';
							}else if ($category=='Result') {
								$class='class="result-ribbon"';
							}else if ($category=='Notice') {
								$class='class="notice-ribbon"';
							}else{
								$class='class=""';
							}
							
								echo '
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 home-promo4-box">
										<a href="notice-detail.php?notice='.$id.'" class="inner ">
										   
										   <h4 '.$class.'> <big>'.$category.'</big><hr>
										   '.$ftitle.'
										   <small><i class="fa fa-clock-o" aria-hidden="true"></i> '.$added_date1.'</small>
										   <hr>
										   <big><i class="fa fa-file-pdf-o"></i> Download</big>
										   </h4>
										</a>
									
								</div>';
							
							
						}
					}else{
						echo mysql_error();
					}
				
				?>	
		</div>
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
			<h3>Class-Wise Notice</h3>
			<?php
		  	$result="SELECT * FROM class GROUP BY class  ORDER BY class";
		  	if($info=mysql_query($result)){
		  		while ($done=mysql_fetch_assoc($info)) {
		  			$id=$done['id'];
		  			$category=$done['category'];
		  			$class=$done['class'];
		  			$name=$done['name'];
		  			$pdf=$done['pdf'];
		  			echo '<div class="col-lg-6 col-sm-6 col-md-6 col-xs-6 " style="padding:0;overflow:hidden">
						<div class="albumname">
							<a href="noticeinfo.php?editid='.$class.'" >
								<i class="fa fa-clock-o " aria-hidden="true"></i>
								<h1>class : '.$class.'</h1>	
								
							</a>
						</div>
					</div>';
		  		}
		  	}
	    ?>
		</div>
	</div>
</div>


<!--class Duration section end -->

<?php
	require_once "mpages/footer.php";
?>