<?php

include '../dbconfig.php'; 

$postType = $_GET['postType'];

$sql= "SELECT * FROM posts WHERE type='" . $postType . "'";

$rs=$connection->query($sql);
 
if($rs === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
} else {
  
  while($row = $rs->fetch_assoc()){
  	print_r($row);
  	echo "<br><br>";
  }
  
}