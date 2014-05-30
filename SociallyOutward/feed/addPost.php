<?php

include '../dbconfig.php'; 

$title=$_POST['title'];
$content=$_POST['content'];
$type=$_POST['type'];

$sql="INSERT INTO posts(title,content,type) VALUES ('".$title."','".$content."','".$type."')";



$rs=$connection->query($sql);
 
if($rs === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}