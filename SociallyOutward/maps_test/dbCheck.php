<?php

include 'dbconfig.php';

$idList = $_GET['idList'];
$interestID = $_GET['interestID'];

$idList = json_decode($idList);

$len = count($idList);

$indsInts;

for($i = 0;$i<$len; $i++)
{
$sql="SELECT interestID FROM place_interest WHERE placeID='" . $idList[$i] . "' AND interestID = '" .$interestID."'";
 
$rs=$connection->query($sql);

if($rs->num_rows>0)
{
	$rs->data_seek(0);
	while($row = $rs->fetch_assoc()){
    $indsInts[$i] = $row['interestID'];
	}
}
}
header("Content-type: application/json");
print(json_encode($indsInts));
