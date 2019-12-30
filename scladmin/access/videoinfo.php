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
		<form action="" enctype="multipart/form-data" method="post">
			<div class="form-group" style="display: none;">
			    <input type="text" name="category"  class="form-control about_select">
		    </div>
			    <?php
			    	if(isset($_GET['name'])){
		    			$album=$_GET['name'];
		    			$list="SELECT * FROM video WHERE category='$album' LIMIT 1";
			    		if($listinfo=mysql_query($list)){
			    			while ($found=mysql_fetch_assoc($listinfo)) {
			    				$category=$found['category'];
			    				echo '<div class="form-group"><input type="text" readonly name="typeitem"  class="form-control about_select" value="'.$category.'"></div>
			    				<div class="form-group">
									<input type="text" name="video" class=" about_select form-control" placeholder="https://www.youtube.com/yourVideoLink">
								</div>
									       
								<div class="form-group ">
									<input type="submit" class=" about_submit" name="submit" value="'.$category.'">
								</div>
			    				';
			    			}
		    			}
		    		}
			    ?>
		</form>

		<!-- President speech update here -->

		<table class="table table-hover admin_table">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>CATEGORY</th>
					<th>IMAGE</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>
			<?php
			if(isset($_GET['name'])){
		    		$album52=$_GET['name'];
				$img="SELECT * FROM video WHERE category='$album52' ORDER BY id DESC";
				if($imgfound=mysql_query($img)){
					$i=1;
					while($imginfo=mysql_fetch_assoc($imgfound)){
						$dltid=$imginfo['id'];
						$albumname=$imginfo['category'];
						$mediaurl=$imginfo['videolink'];

						echo '<tr>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$i.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$albumname.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$mediaurl.'</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									<a href="imageedit.php?editid='.$dltid.'" title="Quick Edit"><i class="fa fa-pencil-square-o btn-success ad_edit" aria-hidden="true"></i>
									</a>
									<a href="'.$current_page.'?post_id='.$dltid.'&name='.$albumname.'&action=delete&from=gallery&media=" title="Completely Delete">
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
		if(isset($_POST['submit'])){
		$typeitem=$_POST['typeitem'];
		$video=$_POST['video'];

		if(empty($video)){
			header("Location:videoinfo.php?report=0&action=empty&message=");
		}
		else{ 
			$mysql = "INSERT INTO gallery (albumname,mediaurl) VALUES ('$typeitem','$storage')";
				if($sqlrun = mysql_query($mysql)){
					header("Location:albuminfo.php?name=".$typeitem."&report=1&action=insert&message=  video link inserted");
				}
				else{
					echo mysql_error();
				}
			}
	}
	
?>