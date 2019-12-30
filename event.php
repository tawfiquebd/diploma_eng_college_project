<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>


<!--History section start -->
	<div class="container-fluid future-fluid">
		<div class="container future-container">
			<?php
				$manage="SELECT * FROM future WHERE category='event' ORDER BY id DESC";
					if($minfo=mysql_query($manage)){
						while ($info=mysql_fetch_assoc($minfo)) {
							$id=$info['id'];
							$category=$info['category'];
							$ftitle=$info['ftitle'];
							$detail=$info['detail'];
							$details=substr($info['detail'],0,50)."...";
							$image=$info['image'];
							echo '<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 future-inn">
										<h3>'.$ftitle.'</h3>
										<img src="scladmin/images/upload/'.$image.'" alt="image">
										<p>'.$details.'</p>
										<a href="futuredetails.php?id='.$id.'" class="hvr-sweep-to-right future-inn-a">Read More</a>
									</div>';
					}
				}
			?>
			
			
			
		</div>
	</div>
<!--History section end -->

<?php
	require_once "mpages/footer.php";
?>