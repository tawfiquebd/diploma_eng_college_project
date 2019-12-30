$mcount="SELECT count(id) as id from gallery";
				if($query=mysql_query($mcount)){
					while ($ok=mysql_fetch_assoc($query)) {
						$ok1=$ok['id'];
						echo "total : ".$ok1;
					}
				}