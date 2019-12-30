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
		<h1> Teacher List  </h1>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<form action="" enctype="multipart/form-data" method="post">
			<div class="form-group">
			    <input type="text" name="cname" class="form-control about_select" placeholder="Teacher Name">
		    </div>

		    <div class="form-group">
			    <input type="text" name="pos"  class="form-control about_select" placeholder="Position">
		    </div>

		    <div class="form-group">
			    <input type="text" name="ocu"  class="form-control about_select" placeholder="Secondary Occupasion">
		    </div>

		    <div class="form-group">
			    <input type="text" name="face"  class="form-control about_select" placeholder="https://www.facebook.com/profile">
		    </div>


		    <div class="form-group">
			    <input type="text" name="linkedin" class="form-control about_select" placeholder="https://www.linkedin.com/profile">
		    </div>

		    <div class="form-group" >
			    <input type="text" name="gplus"  class="form-control about_select" placeholder="https://www.plus.google.com/profile">
		    </div>

			<div class="form-group">
				<input type="FILE" name="mypic" class="file_upload">
			</div>
				       
			<div class="form-group ">
				<input type="submit" class=" about_submit" name="submit" value=" Add Teacher">
			</div>
		</form>
		
		
		
		
		
		
		
		<div class="clearfix"></div>
        <hr>
		
		
		
		
		
		
		
		
		
		<table class="table table-hover admin_table">
			<thead>
				<tr>
					<th>S.NO</th>
					<th>IMAGE</th>
					<th>NAME</th>
					<th>POSITION</th>
					<th>OCCUPATION</th>
					<th>FACEBOOK</th>
					<th>MANAGE</th>
				</tr>
			</thead>
			<tbody>
			<?php

				$img="SELECT * FROM teacher  ORDER BY id DESC";
				if($imgfound=mysql_query($img)){
					$i=1;
					while($imginfo=mysql_fetch_assoc($imgfound)){
						$id=$imginfo['id'];
						$cname=$imginfo['cname'];
						$position=$imginfo['position'];
						$occupation=$imginfo['occupation'];
						$image=$imginfo['image'];
						$facebook=$imginfo['facebook'];

						echo '<tr>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$i.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1" style="display:none;">'.$id.'</td>
								
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									<div class="img_div_uploaded ">
										<img src="../images/upload/'.$image.'"  class="img-responsive img_updated">
									</div>
								</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">'.$cname.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$position.'</td>
								<td class="col-lg-1 col-sm-1 col-md-1 col-xs-1">'.$occupation.'</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-12">'.$facebook.'</td>
								<td class="col-lg-2 col-sm-2 col-md-2 col-xs-2">
									<a href="coedit.php?editid='.$id.'" ><i class="fa fa-pencil-square-o btn-success ad_edit" aria-hidden="true"></i>
									</a>
									<a href="'.$current_page.'?post_id='.$id.'&action=delete&from=teacher&media=" title="Completely Delete">
										    <i class="fa fa-trash ad_delete" aria-hidden="true"></i>
									</a>
								</td>
							</tr>';
							$i++;
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
		$cname=$_POST['cname'];
		$pos=$_POST['pos'];
		$face=$_POST['face'];
		$ocu=$_POST['ocu'];
		$linkedin=$_POST['linkedin'];
		$gplus=$_POST['gplus'];
		$title=$_POST['title'];
		$img_tmp =$_FILES['mypic']['tmp_name'];
		$image=$_FILES['mypic']['name'];
		$image_type =$_FILES['mypic']['type'];
		$temp = explode(".",$image);
		$newfile=time().'.'.end($temp);
		$storage=basename($newfile);
		
		if(empty($cname) || empty($pos) ||  empty($ocu)   || empty($image)){
				header("Location:teacher.php?report=0&action=empty&message= ");

		}
		else{
			if ($image_type=='image/jpeg' || $image_type=='image/png') {	 
				$mysql = "INSERT INTO teacher(cname,position,occupation,image,facebook,gplus,linkedin) VALUES ('$cname','$pos','$ocu','$storage','$face','$linkedin','$gplus')";
					move_uploaded_file($img_tmp,"../images/upload/".$storage);
					if($sqlrun = mysql_query($mysql)){
						header("Location:teacher.php?report=1&action=insert&message= ");
					}
					else{
						echo mysql_error();
					}
				}
				else{
					header("Location:teacher.php?report=0&action=mediaimage&message= ");

			}
	}

		


	}
?>