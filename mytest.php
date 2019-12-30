<?php
	require_once "scladmin/db/db.php";
	require_once "mpages/head.php";
	require_once "mpages/header.php";
	require_once "mpages/navhome.php";
?>

<!--class Duration section start -->

<div class="container class-duration-container">
	<div class="tab-content">
   	<?php
   		if(isset($_GET['myid'])){
   			$newid=$_GET['myid'];
   			$sel="SELECT * FROM class  where class='$newid' ORDER BY id DESC";
   			if($found=mysqli_query($db,$sel)){
   				while ($data=mysqli_fetch_assoc($found)) {
   					$myid=$data['id'];
   					$classfound=$data['class'];
   					$category=$data['category'];
   					$nameok=$data['name'];
   					$pdffile=$data['pdf'];
   					echo '<div id="'.$newid.'">
						    <table class="table table-hover class-routine-table" id="panel1">
								<thead>
								  <tr>
									<th>Class</th>
									<th>Exam Name</th>
									<th>Published Date</th>
									<th>Section/Shift</th>
									<th>Download</th>
								  </tr>
								</thead>
								<tbody>
								  <tr>
									<td  class="col-lg-3 col-md-3 col-sm-3 col-xs-12">'.$classfound.'</td>
									<td  class="col-lg-3 col-md-3 col-sm-3 col-xs-12">'.$nameok.'</td>
									<td  class="col-lg-3 col-md-3 col-sm-3 col-xs-12">Doe</td>
									<td  class="col-lg-3 col-md-3 col-sm-3 col-xs-12">Doe</td>
									<td class="col-lg-3 col-md-3 col-sm-3 col-xs-12"><a href="scladmin/images/upload/pdf/'.$pdffile.'" target="blank" class="table-pdf hvr-bounce-out">PDF<i class="fa fa-download" aria-hidden="true"></i></a></td>
								  </tr>
								</tbody>
							</table>
					    </div>';
   				}
   			}
   		}
   	?>
   	</div>
</div>


<!--class Duration section end -->

<?php
	require_once "mpages/footer.php";
?>