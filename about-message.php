<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>



<!--Philosophy section start -->
	<div class="container-fluid">
		<div class="container p-message-container">
			<?php
			if (isset($_GET['message'])) {
				$get_category=$_GET['message'];
				$manage="SELECT * FROM future WHERE category='$get_category'";
				if($minfo=mysqli_query($db,$manage)){
					while ($info=mysqli_fetch_assoc($minfo)) {
					$id=$info['id'];
					$category=$info['category'];
					$ftitle=$info['ftitle'];
					$detail=$info['detail'];
					$image=$info['image'];
					echo '<div class="col-lg-offset-4 col-lg-4 col-xs-12 ">
						<div class="p-image">
							<div class="p-image-inn">
								<img src="scladmin/images/upload/'.$image.'" alt="principle">
							</div>
							<h3>'.$ftitle.'</h3>
							<p>'.$get_category.'</p>
						</div>
					</div>

					<div class="p-message col-lg-12 col-md-12 col-sm-12 col-xs-12">
						<hr>
						'.$detail.'
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