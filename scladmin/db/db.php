<?php
	//First Line for No Error Reporting by Mysql
	error_reporting(E_ALL ^ E_DEPRECATED);
	define('Host', 'localhost');
	define('User', 'root');
	define('Pass', '');
	define('Database', 'college');

	$db = mysqli_connect(Host,User,Pass);
	$connect = mysqli_select_db($db,Database);

	if($db && $connect ){
		// echo "Database connected successfully";
		// exit();
	}

	// $db = mysqli_connect("localhost","root","");
	// $connect = mysqli_select_db($db,"college");
	
	$current_page=basename($_SERVER['PHP_SELF']);
    

	
	function class_info(){
		global $db;
		$sql="SELECT * From class_info";
		$return_data='';
		
		
		if($sql_run=mysqli_query($db,$sql)){
			while($data=mysqli_fetch_assoc($sql_run)){
				$class=$data['class_name'];
				$return_data.='<option>'.$class.'</option>';
			}
			
			return $return_data;
		}
		
	}
	
	
	function global_report($report,$action,$custom_message){
		global $db;
	    if(empty($custom_message)){
	        $custom_message='';
	    }else{
	        $custom_message=' | '.$custom_message;
	    }
	    
	    if($action=='insert'){
	        $message_part_one='Insertion ';
	        $class='alert-success';
	        $icon='<i class="fa fa-check "></i>';
	    }
	    if($action=='update'){
	        $message_part_one='Updated ';
	        $class='alert-success';
	        $icon='<i class="fa fa-check "></i>';
	    }
	    if($action=='delete'){
	        $message_part_one='Deleted';
	        $class='alert-danger';
	        $icon='<i class="fa fa-trash "></i>';
	    }
	    if($action=='jobsubmit'){
	        $message_part_one='jobsubmit';
	        $class='alert-success';
	        $icon='<i class="fa fa-check "></i>';
	    }
	    
	    if($action=='login'){
	        $message_part_one='Login';
	        $class='alert-success';
	        $icon='<i class="fa fa-lock "></i>';
	    }
	    if($action=='reg'){
	        $message_part_one='Registration';
	        $class='alert-success';
	        $icon='<i class="fa fa-id-card-o "></i>';
	    }
	    if($action=='mediaimage'){
	        $message_part_one='Invalid Image File Format. Insertion ';
	        $class='alert-success';
	        $icon='<i class="fa fa-id-card-o "></i>';
	    }

	     if($action=='empty'){
	        $message_part_one='Someting Wrong ! empty field Found . Please Fill-up first .';
	        $class='alert-success';
	        $icon='<i class="fa fa-id-card-o "></i>';
	    }

	      if($action=='imgselect'){
	        $message_part_one='Please Select Image File For Update Previews Image !.';
	        $class='alert-success';
	        $icon='<i class="fa fa-id-card-o "></i>';
	    }

	     if($action=='pdfselect'){
	        $message_part_one='Please Select PDF File For Update Previews PDF File !.';
	        $class='alert-success';
	        $icon='<i class="fa fa-id-card-o "></i>';
	    }

	    if($action=='passname'){
	        $message_part_one='Your Passing Name or Id Sent Fail!';
	        $class='alert-success';
	        $icon='<i class="fa fa-id-card-o "></i>';
	    }

	    if($action=='found'){
	        $message_part_one='Student ID or Class Roll Almost Exists !';
	        $class='alert-success';
	        $icon='<i class="fa fa-id-card-o "></i>';
	    }

	    if($report==1){
	        $message='
	        <div class="container">
	        <div class="alert  '.$class.' alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>'.$icon.' '.$message_part_one.'</strong>  successful. '.$custom_message.'
                      </div>
                      </div>
                      ';
	    }
	    if($report==0){
	         $icon='<i class="fa fa-info-circle "></i>';
	        $message='
	        <div class="container">
	        <div class="alert  alert-danger alert-dismissable fade in">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>'.$icon.' '.$message_part_one.'</strong>  Failed!. '.$custom_message.'
                      </div></div>';
	    }
	    return  $message;
	}
	
	function global_delete($post_id,$action,$from,$media){
		GLOBAL $db;

	    if(empty($media)){
	        $dsql="DELETE FROM $from WHERE id='$post_id'";
    	    if($dsqlrun=mysqli_query($db,$dsql)){
    	        return 1;
    	    }else{
    	        return 0;
    	    }
	    }else{
	       
	        $dsql="DELETE FROM $from WHERE id='$post_id'";
    	    if($dsqlrun=mysqli_query($db,$dsql)){
    	        unlink('images/upload/'.$media);
    	        return 1;
    	    }else{
    	        return 0;
    	    }
	    
	    }
	    
	}
	
	function user_exist($uname){
		global $db;
	    //Checking User Exists or Not
        $usl="SELECT * FROM user WHERE user_name='$uname'";
        if($uslrun=mysqli_query($db,$usl)){
            if(mysqli_num_rows($uslrun)<1){
                return true;
            }else{
                return false;
            }
        }
	}
	
	
	function password_update($uname,$old_password,$new_password){
		global $db;
	    //Checking User Exists or Not
	    $old_password=md5($old_password);
	    $new_password=md5($new_password);
        $usl="SELECT * FROM user WHERE user_name='$uname' AND pass='$old_password'";
        if($uslrun=mysqli_query($db,$usl)){
            if(mysqli_num_rows($uslrun)==1){
                $update_pass="UPDATE user SET pass='$new_password' WHERE user_name='$uname'";
                if($update_pass_run=mysql_query($update_pass)){
                    return true;
                }else{
                    return false;
                }
            }else{
                return false;
            }
        }
	}
	
	function file_upload($temp_name,$file_name){
	    $file_fraction = explode(".",$file_name);
        $newfile= time().'.'.end($file_fraction);
        $new_name=basename($newfile);
        if(move_uploaded_file($temp_name,"images/upload/".$new_name)){
            return $new_name;
        }else{
            return false;
        }
	    
	}
	
	
		function file_upload_admin($temp_name,$file_name){
	    $file_fraction = explode(".",$file_name);
        $newfile= time().'.'.end($file_fraction);
        $new_name=basename($newfile);
        if(move_uploaded_file($temp_name,"../images/upload/".$new_name)){
            return $new_name;
        }else{
            return false;
        }
	    
	}
	
?>