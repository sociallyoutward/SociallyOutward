<?php

include 'dbconfig.php';

$placeID = $_POST['placeID'];
$interests = json_decode($_POST['interest']);



for($i=0;$i<count($interests);$i++)
	{
		$sql="INSERT INTO place_interest(placeID, interestID) VALUES ('".$placeID."',".$interests[$i].")";

		if (!$connection->query($sql)) {
    		
			header("HTTP/1.1 400");
			print($placeID);
			exit();
    		// printf("Errormessage: %s\n", $connection->error);
		}
		print($placeID);
	}


