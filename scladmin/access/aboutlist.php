<?php
ob_start();
session_start();
require_once '../db/db.php';
require_once '../pages/head_script.php';
require_once '../pages/header.php';
require_once '../pages/left_menu.php';
if($_SESSION['Uname']){
}else{
	header('Location:../index.php');
}
?>
<div class="col-lg-1 col-sm-1 col-md-1 col-xs-12">
	<div class="page_text_gallery">
		<h1> ABOUT </h1>
		<h2>UPDATE</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
			
		<table class="table table-hover admin_table">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>CATEGORY</th>
					<th> TITLE</th>
					<th> DETAILS</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>

				<?php
					$about="SELECT * FROM post WHERE category='about'";
					if($found=mysql_query($about)){
						while ($aboutinfo=mysql_fetch_assoc($found)) {
							$id=$aboutinfo['id'];
							$category=$aboutinfo['category'];
							$ptitle=$aboutinfo['posttitle'];
							$pdetail=$aboutinfo['postdetail'];
							echo '<tr>
										<td>'.$id.'</td>
										<td>'.$category.'</td>
										<td>'.$ptitle.'</td>
										<td>'.$pdetail.'</td>
										<td style="width:11%;"><a href="long-post.php?category='.$category.'"><i class="fa fa-pencil-square-o  ad_edit" aria-hidden="true"></i></a>
											<a href="long-post.php&category='.$category.'"><i class="fa fa-trash  ad_delete" aria-hidden="true"></i></a>
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
?>
