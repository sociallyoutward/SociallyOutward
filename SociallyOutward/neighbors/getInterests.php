<?php
//script to grab user interst list from the database
include '../dbconfig.php'; 


function getInterests($userid,$connection){

$sql= "SELECT interestid FROM member_interest WHERE memberid='" . $userid . "'";

$rs=$connection->query($sql);
 
if($rs === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
} 
else {

while($row = $rs->fetch_assoc()){
  	$output[] = $row["interestid"];
  }
  return $output;
}

}