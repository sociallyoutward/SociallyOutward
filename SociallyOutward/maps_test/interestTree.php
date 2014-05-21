<?php

include 'dbconfig.php';

$tree;
$sql="SELECT * FROM iNode WHERE parent<>-1";
$rs=$connection->query($sql);

if($rs->num_rows>0)
{
	$rs->data_seek(0);
	while($row = $rs->fetch_assoc()){
    
    	$tree[$row['parent']][] = $row['id'];
    	$tree[$row['id']][] = $row['name'];
	}
}


print_r(json_encode($tree));