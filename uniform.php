<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>

<!--class Duration section start -->

<div class="container class-duration-container">
    	<?php
		  	$result="SELECT * FROM class GROUP BY class  ORDER BY class";
		  	if($info=mysql_query($result)){
		  		while ($done=mysql_fetch_assoc($info)) {
		  			$id=$done['id'];
		  			$category=$done['category'];
		  			$class=$done['class'];
		  			$name=$done['name'];
		  			$pdf=$done['pdf'];
		  			echo '<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 " style="padding:0;overflow:hidden">
						<div class="albumname">
							<a href="uniforminfo.php?editid='.$class.'" target="blank">
								<i class="fa fa-file-pdf-o fa-spin" aria-hidden="true"></i>
								<h1>Uniform Rules For : '.$class.'</h1>	
								
							</a>
						</div>
					</div>';
		  		}
		  	}
	    ?>
  
</div>


<!--class Duration section end -->

<?php
	require_once "mpages/footer.php";
?>