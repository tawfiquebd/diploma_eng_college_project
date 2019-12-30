<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>

<!--class Duration section start -->

<div class="container class-duration-container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 notice_attractive">
			<h2 style="color: #461F87" class="text-center">General News &amp; Events</h2>
			<?php
				$manage="SELECT * FROM future WHERE category='notice' OR category='event' ORDER BY id DESC ";
					if($minfo=mysqli_query($db,$manage)){
						while ($info=mysqli_fetch_assoc($minfo)) {
							$id=$info['id'];
							$category=$info['category'];
							$ftitle=$info['ftitle'];
							$detail=$info['detail'];
							$details=substr($info['detail'],0,60)."...";
							$image=$info['image'];
							$added_date=$info['added_date'];
							$added_date=strtotime($added_date);
							$added_date1=date('d/M/y - h:i a',$added_date);
							if ($category=='event') {
								$class='class="event-ribbon"';
							}else{
								$class='class=""';
							}
							
								echo '
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 home-promo4-box">
										<a href="notice-detail.php?notice='.$id.'" class="inner ">
										   <div class="img-box">
										   		<img src="scladmin/images/upload/'.$image.'" alt="'.$ftitle.'">
										   </div>
										   <h4 '.$class.'>'.$ftitle.'<small><i class="fa fa-clock-o" aria-hidden="true"></i> '.$added_date1.'</small></h4>
										   <div class="content-box">
										   		<p>'.$details.'</p>
										   		<h5 class="">Read More..</h5>
										   </div>
										</a>
									
								</div>';
							
							
						}
					}else{
						echo mysql_error();
					}
				
				?>	
		</div>
		
	</div>
    	
  
</div>


<!--class Duration section end -->

<?php
	require_once "mpages/footer.php";
?>