if ($image_type=='image/jpeg' || $image_type=='image/png'){
									$mysql = "INSERT INTO student (std_id,cls,sec,clsroll,sname,fname,mname,bgroup,nationality,preadd,peradd,gphone,age,hcond,religion,day,month,year,image) VALUES ('$stdid','$class','$sec','$croll','$sname','$fname','$mname','$blood','$nationality','$present','$parmanent','$gphone','$age','$hcond','$religion','$day','$month','$year','$storage')";
										move_uploaded_file($img_tmp,"../images/upload/".$storage);
										if($sqlrun = mysql_query($mysql)){
											header("Location:sregister.php?report=1&action=insert&message=");

										}
										else{
											header("Location:sregister.php?report=0&action=insert&message='Insert Fail'");

											echo mysql_error();
										}

					        /* roll and id checking */
					      }