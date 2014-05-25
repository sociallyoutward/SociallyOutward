<?php

include '../dbconfig.php'; 
$posts;
$postType = $_GET['postType'];
$output;

$sql= "SELECT * FROM posts WHERE type='" . $postType . "'";

$rs=$connection->query($sql);
 
if($rs === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
} else {
  
  while($row = $rs->fetch_assoc()){
<<<<<<< HEAD
  	$posts[$row['id']]= $row;
  }
  print_r(json_encode($posts));
  
=======
  	$output[] = $row;
  }
  print json_encode($output);
>>>>>>> addBootstrap
}