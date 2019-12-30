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
		<form action="" method="post" enctype="multipart/form-data">
			    <?php
			    	if(isset($_GET['editid'])){
			    		$id=$_GET['editid'];
			    		$mysql = "SELECT * FROM Committiee WHERE id='$id'";
			    		if($sql=mysql_query($mysql)){
			    			while($sqlrun=mysql_fetch_assoc($sql)){
			    				$id=$sqlrun['id'];
			    				$cname=$sqlrun['cname'];
			    				$possition=$sqlrun['position'];
			    				$occupation=$sqlrun['occupation'];
			    				$image=$sqlrun['image'];
			    				$facebook=$sqlrun['facebook'];
			    				$gplus=$sqlrun['gplus'];
			    				$linkedin=$sqlrun['linkedin'];

			    				echo '
										<div class="form-group" style="display:none">
										    <input type="text" name="id" class="form-control about_select" value="'.$id.'">
									    </div>

									    <div class="form-group">
										    <input type="text" name="cname" class="form-control about_select" value="'.$cname.'">
									    </div>

									    <div class="form-group">
										    <input type="text" name="pos"  class="form-control about_select" value="'.$possition.'">
									    </div>

									    <div class="form-group">
										    <input type="text" name="ocu"  class="form-control about_select" value="'.$occupation.'">
									    </div>

									    <div class="form-group" style="max-height:200px;overflow:hidden">

											<img src="../images/upload/'.$image.'" >
										</div>

									    <div class="form-group">
										    <input type="text" name="face"  class="form-control about_select" value="'.$facebook.'">
									    </div>


									    <div class="form-group">
										    <input type="text" name="linkedin" class="form-control about_select" value="'.$linkedin.'">
									    </div>

									    <div class="form-group" >
										    <input type="text" name="gplus"  class="form-control about_select" value="'.$gplus.'">
									    </div>

										<div class="form-group">
											<input type="FILE" name="mypic" class="file_upload">
										</div>
											       
										<div class="form-group ">
											<input type="submit" class=" about_submit" name="submit" value="PROFILE UPDATE">
										</div>';
			    			}
			    		}
			    	}
				?>
			    
		</form>
	</div>
</div>

<?php
	require_once '../pages/footer.php';
	/*Update Query */

    	if(isset($_POST['submit'])){
    		$myid=$_POST['id'];
    		$cname=$_POST['cname'];
			$pos=$_POST['pos'];
			$face=$_POST['face'];
			$ocu=$_POST['ocu'];
			$linkedin=$_POST['linkedin'];
			$gplus=$_POST['gplus'];
			/* old system */
			$img_tmp =$_FILES['mypic']['tmp_name'];
			$image=$_FILES['mypic']['name'];
			$image_type =$_FILES['mypic']['type'];
			

			$temp = explode(".",$image);
			$newfile= time().'.'.end($temp);
			$storage=	basename($newfile);
			
			if(empty($cname) || empty($pos) || empty($face) || empty($ocu) || empty($linkedin) || empty($gplus) || empty($image)){
				header("Location:coedit.php?editid=".$myid."&report=0&action=empty&message= ");
				}
			
			else{
				if ($image_type=='image/jpeg' || $image_type=='image/png') {	 
					$mysql = "UPDATE committiee SET cname='$cname', position='$pos', occupation='$ocu', image='$storage', facebook ='$face', gplus='$gplus',linkedin='$linkedin'  WHERE id='$myid'";
						if($sqlrun = mysql_query($mysql)){
							move_uploaded_file($img_tmp,"../images/upload/".$storage);
							header("Location:mcupdate.php?report=1&action=update&message=");
						}
	    		else{
	    			echo mysql_error();
	    		}

	    	}
	    	else{
					header("Location:coedit.php?report=0&action=mediaimage&message= ");

	    	}
    	}
    }
?>