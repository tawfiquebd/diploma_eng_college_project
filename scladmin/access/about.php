<?php
	require_once 'head_script.php';
	require_once 'header.php';
	require_once 'left_menu.php';
?>
<div class="col-lg-1 col-sm-1 col-md-1 col-xs-12">
	<div class="page_text">
		<h1>About</h1>
		<h2>Us</h2>
	</div>
</div>
<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
	<div class="right_div">
		<form class="">
		    <div class="form-group">
			    <select class="form-control about_select">
			        <option>==== CHOSE TYPE ====</option>
			        <option>SCHOOL</option>
			        <option>EXAM STORY</option>
			    </select>
		    </div>

		    <div class="form-group">
		    	<textarea class="form-control about_text_area" rows="5" placeholder="write your text here ..."></textarea>
		    </div>  

		    <div class="form-group">
		     	<input type="submit" name="" value="ABOUT UPDATE" class="about_submit">
		    </div>  
		</form>
	</div>
</div>

<?php
	require_once 'footer.php';
?>