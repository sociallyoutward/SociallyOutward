<?php
//function to check whether or not someone logging in through facebook is already a user
function checkuser($fuid,$funame,$ffname,$femail,$connection){
    		
    		$sql = "select * from Users where Fuid='".$fuid."'";
			$check = $connection->query($sql);
			$check = $check->num_rows;
			if ($check==0) { // if new user . Insert a new record		
			$query = "INSERT INTO Users (Fuid,Funame,Ffname,Femail) VALUES ('".$fuid."','".$funame."','".$ffname."','".$femail."')";
			$connection->query($query);	
			} else {   // If Returned user . update the user record		
			$query = "UPDATE Users SET Funame='".$funame."', Ffname='".$ffname."', Femail='".$femail."' where Fuid='".$fuid."'";
			$connection->query($query);	
			}

}?>
