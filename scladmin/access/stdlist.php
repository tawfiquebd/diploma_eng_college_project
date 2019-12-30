<?php
ob_start();
session_start();
require_once '../db/db.php';
if($_SESSION['Uname']){
	require_once '../pages/head_script.php';
	require_once '../pages/header.php';
	require_once '../pages/left_menu.php';
}
else{
	header("Location:../index.php");
}


?>
<div class="col-lg-1 col-sm-1 col-md-1 col-xs-12">
	<div class="albuminfo">
		<h1>ALBUM INFO</h1>
		<h2>UPDATE</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<!-- President speech update here -->
		<table class="table table-hover admin_table">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>STD ID</th>
					<th>IMAGE</th>
					<th>NAME</th>
					<th>SECTION</th>
					<th>CLASS</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if(isset($_GET['name'])){
		    		$album52=$_GET['name'];
				$img="SELECT * FROM student WHERE cls='$album52' ORDER BY id DESC";
				if($imgfound=mysqli_query($db,$img)){
					$i=1;
					while($imginfo=mysqli_fetch_assoc($imgfound)){
						$dltid=$imginfo['id'];
						$std_id=$imginfo['std_id'];
						$sec=$imginfo['sec'];
						$name=$imginfo['sname'];
						$class=$imginfo['cls'];
						$image=$imginfo['image'];

						echo '<tr>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$i.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$std_id.'</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									<div class="img_div_uploaded ">
										<img src="../images/upload/'.$image.'"  class="img-responsive img_updated">
									</div>
								</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$name.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$sec.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$class.'</td>

								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									<a href="imageedit.php?editid='.$dltid.'" title="Quick Edit"><i class="fa fa-pencil-square-o btn-success ad_edit" aria-hidden="true"></i>
									</a>
									<a href="'.$current_page.'?post_id='.$dltid.'&name='.$album52.'&action=delete&from=student&media=" title="Completely Delete">
										    <i class="fa fa-trash ad_delete" aria-hidden="true"></i>
									</a>
								</td>
							</tr>';
							$i++;
					}
				}
			}
			?>
				


			</tbody>
		</table>

	</div>
</div>

<?php
	require_once '../pages/footer.php';
?>