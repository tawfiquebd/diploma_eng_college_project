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
	<div class="page_text_gallery">
		<h1> SUB  </h1>
		<h2>MENU</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="form-group">
			    <input type="text" name="name" class="form-control about_select" placeholder="Sub Menu Category">
		    </div>


			<div class="form-group ">
				<input type="submit" class=" about_submit" name="submit" value="SUB MENU">
			</div>
		</form>

		

		<!-- Sub menu speech update here -->

		<table class="table table-hover admin_table">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>Category</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$img="SELECT * FROM event ORDER BY id DESC";
				if($imgfound=mysql_query($img)){
					while($imginfo=mysql_fetch_assoc($imgfound)){
						$id=$imginfo['id'];
						$category=$imginfo['category'];

						echo '<tr>
								<td>'.$id.'</td>
								<td>'.$category.'</td>
								<td>
									<a href="'.$current_page.'?post_id='.$id.'&action=delete&from=event&media=" title="Completely Delete">
										    <i class="fa fa-trash ad_delete" aria-hidden="true"></i>
										 </a>
								</td>
							</tr>';
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
			$name=$_POST['name'];

			if(empty($name)){
						header("Location:event.php?report=0&action=empty&message=");
			}
			else{
					$mysql = "INSERT INTO event (category) VALUES ('$name')";
						if($sqlrun = mysql_query($mysql)){
							header("Location:event.php?report=1&action=insert&message=");
						}
						else{
							header("Location:event.php?report=0&action=insert&message='Insert Fail'");
							echo mysql_error();
						}
				}
			}
			
?>