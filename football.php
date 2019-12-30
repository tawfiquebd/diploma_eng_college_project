<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>


<!--Sports section start -->
	<div class="container-fluid cricket-fluid">
		<div class="container cricket-container">
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
				<div class="cricket-menu">
				<h3></h3>
				
				<ul class="list-group">
				  <li class="list-group-item"><a href="cricket.php"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Cricket</a></li>
				  <li class="list-group-item"><a href="football.php"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Football</a></li>
				  <li class="list-group-item"><a href="debate.php"><i class="fa fa-angle-double-right" aria-hidden="true"></i>Debate</a></li>
				  
				</ul> 
				</div>
			</div>
			
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12 cricket-history">
			<?php
				$manage="SELECT * FROM future WHERE ftitle='football' ORDER BY id DESC LIMIT 1";
					if($minfo=mysql_query($manage)){
						while ($info=mysql_fetch_assoc($minfo)) {
							$id=$info['id'];
							$category=$info['category'];
							$ftitle=$info['ftitle'];
							$detail=$info['detail'];
							$details=substr($info['detail'],0,150)."...";
							$image=$info['image'];
							echo '<h3>'.$ftitle.'</h3>
									<div style="height:250px;width:250px;overflow:hidden;">
									<img src="scladmin/images/upload/'.$image.'" alt="image">
									</div>
									<p>'.$details.'</p>
									<a href="eventdetails.php?id='.$id.'" class="hvr-sweep-to-right future-inn-a">Read More</a>
								';
					}
				}
			?>
			</div>
			
			<div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 cricket-featured">
			<h3>Featured Events</h3>
			<?php
				$event="SELECT * FROM future WHERE category='event'";
					if($eventinfo=mysql_query($event)){
						while ($result=mysql_fetch_assoc($eventinfo)) {
							$eid=$result['id'];
							$ecategory=$result['category'];
							$eftitle=$result['ftitle'];
							$edetail=$result['detail'];
							$edetails=substr($result['detail'],0,50)."...";
							$eimage=$result['image'];
							echo '<a href="eventdetails.php?id='.$eid.'">

									<h3>'.$eftitle.'</h3>
									<img src="scladmin/images/upload/'.$eimage.'" alt="image">
									<p>'.$edetails.'</p>
									<span class="hvr-sweep-to-right">Read More</span> 
								</a>
								';
					}
				}
			?>
			</div>
	</div>
	</div>
<!--Sports section end -->


<?php
	require_once "mpages/footer.php";
?>