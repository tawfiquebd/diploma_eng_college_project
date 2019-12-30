<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>

<!--class Duration section start -->

<div class="container class-duration-container">
<div class="clearfix"></div>
<h3>Result Archieve</h3>
<hr>
<div class="clearfix"></div>
    	<?php
		  	$result="SELECT * FROM class WHERE category='Result' group by class";
		  	if($info=mysqli_query($db,$result)){
		  		while ($done=mysqli_fetch_assoc($info)) {
		  			$id=$done['id'];
		  			$category=$done['category'];
		  			$class=$done['class'];
		  			$name=$done['name'];
		  			$pdf=$done['pdf'];
		  			echo '

		  			<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 " style="padding:0;overflow:hidden">
						<div class="albumname">
							<a href="mytest.php?myid='.$class.'">
								<i class="fa fa-graduation-cap fa-spin" aria-hidden="true"></i>
								<h1>Dpt : '.$class.'</h1>	
								<h4>'.$name.'</h4>	
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