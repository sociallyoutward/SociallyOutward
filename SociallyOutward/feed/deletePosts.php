<?php

include '../dbconfig.php'; 


$sql="DELETE FROM posts WHERE 1";



$rs=$connection->query($sql);
 
if($rs === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
}