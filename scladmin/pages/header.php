<section class="contianer-fluid main-header-fluid">
	<div class="container main-header-fluid-container">
		<div class="col-lg-2 col-md-3 col-sm-2 col-xs-12">
			<div class="logo-img">
			<a href="http://localhost/college/scladmin/access/profile.php">
				<img src="../../images/logo.png" alt="here is a logo" class="img-responsive">
			</a>
			</div>
		</div>
		
		<div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
				<h1 style="margin-top: 30px;" class="text-center">Welcome to Admin Pannel</h1>
		</div>

		<div class="col-lg-5 col-md-3 col-sm-5 col-xs-12 log-btn">
				<a class="btn btn-primary" href="logout.php"> Logout</a>
				<a href="http://localhost/college/scladmin/access/profile.php" class="btn btn-primary"> Back To Admin Page</a>
				<a href="http://localhost/college/" class="btn btn-primary"> Back To Home Page</a>
		</div>
		
	</div>
</section>
<?php
    if(isset($_GET['report']) && isset($_GET['action']) && isset($_GET['message'])){
        $report=$_GET['report']; // 0 or 1
        $action=$_GET['action']; // insert, update,delete
        $message=$_GET['message'];
        echo global_report($report,$action,$message);
    }
    
    
    if(isset($_GET['post_id']) && isset($_GET['action']) && isset($_GET['from']) && isset($_GET['media'])){
        $post_id=$_GET['post_id']; // 0 or 1
        $action=$_GET['action']; // insert, update,delete
        $from=$_GET['from'];
        $media=$_GET['media'];
        $message='';
        $report= global_delete($post_id,$action,$from,$media);
        
        echo global_report($report,$action,$message);
    }
?>

<section class="container-fluid admin-post-fluid">


