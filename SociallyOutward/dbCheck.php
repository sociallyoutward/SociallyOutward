<?php

include 'dbconfig.php';

$idList = $_GET['idList'];

$idList = json_decode($idList);

$len = count($idList);

$sql='SELECT interestID FROM place_interest WHERE placeID=' . $idList[0];
 
$rs=$connection->query($sql);
 
if($rs === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
} else {
  echo $rows_returned = $rs->num_rows;
}

// for($i = 0;$i<1; $i++)
// {
// 	$check = mysqli_query($connection,"select interestID from place_interest");
// 	mysqli_fetch()
	
// } 

// $check = mysql_query("select * from Users where Fuid='$fuid'");
// $check = mysql_num_rows($check);
// if (empty($check)) { // if new user . Insert a new record		
// $query = "INSERT INTO Users (Fuid,Funame,Ffname,Femail) VALUES ('$fuid','$funame','$ffname','$femail')";
// mysql_query($query);	
// } else {   // If Returned user . update the user record		
// $query = "UPDATE Users SET Funame='$funame', Ffname='$ffname', Femail='$femail' where Fuid='$fuid'";
// mysql_query($query);
// }





//print(empty($check));
