<?php
function gradeByMarks($marks){
	$grade='';
	if($marks>=80){
		$grade= "A+";
	}
	else if($marks>=75){
		$grade= "A";
	}
	else if($marks>=70){
		$grade= "A-";
	}
	else if($marks>=65){
		$grade= "B+";
	}
	else if($marks>=60){
		$grade= "B";
	}
	else if($marks>=55){
		$grade= "B-";
	}
	else if($marks>=50){
		$grade= "C+";
	}
	else if($marks>=45){
		$grade= "C";
	}
	else if($marks>=40){
		$grade= "D";
	}
	else{
		$grade= "F";
	}
	return $grade;
} 


function pointByMarks($marks){
	$point=0;
	if($marks>=80){
		$point=4;
	}
	else if($marks>=75){
		$point=3.75;
	}
	else if($marks>=70){
		$point=3.50;
	}
	else if($marks>=65){
		$point=3.25;
	}
	else if($marks>=60){
		$point=3.00;
	}
	else if($marks>=55){
		$point=2.75;
	}
	else if($marks>=50){
		$point=2.50;
	}
	else if($marks>=45){
		$point=2.25 ;
	}
	else if($marks>=40){
		$point=2;
	}
	else{
		$point=0.00;
	}
	return $point;
} 
?>