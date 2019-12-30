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
	<div class="page_text_imgstory">
		<h1> UPDATED</h1>
		<h2> STORY </h2>
		
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<table class="table table-hover admin_table">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>IMAGE</th>
					<th>ALBUM TYPE</th>
					<th>OCCUSSION</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$img="SELECT * FROM gallery ORDER BY id DESC";
				if($imgfound=mysqli_query($db,$img)){
					$i=1;
					while($imginfo=mysqli_fetch_assoc($imgfound)){
						$id=$imginfo['id'];
						$mothersday=$imginfo['albumname'];
						$albumtitle=$imginfo['album_title'];
						$mediaurl=$imginfo['mediaurl'];

						echo '<tr>
								<td>'.$i.'</td>
								<td><div class="img_div_uploaded">
										<img src="../images/upload/'.$mediaurl.'"  class="img-responsive img_updated">
									</div>
								</td>
								<td>'.$albumtitle.'</td>
								<td>'.$mothersday.'</td>
								<td>
								
									<a href="imageedit.php?editid='.$id.'" ><i class="fa fa-pencil-square-o btn-success ad_edit" aria-hidden="true"></i></a>
									<a href="#"><i class="fa fa-camera-retro btn-success ad_edit" aria-hidden="true"></i></a>
									
									<a href="'.$current_page.'?post_id='.$id.'&action=delete&from=gallery&media=" title="Completely Delete">
										    <i class="fa fa-trash ad_delete" aria-hidden="true"></i>
										 </a>
								</td>
							</tr>';
							$i++;
					}
				}

				/*
				
				$mcount="SELECT count(id) as id from gallery";
				if($query=mysql_query($mcount)){
					while ($ok=mysql_fetch_assoc($query)) {
						$ok1=$ok['id'];
						echo "total : ".$ok1;
					}
				}*/
				
			?>
				


			</tbody>
		</table>
	</div>
</div>

<?php
	require_once '../pages/footer.php';
?>