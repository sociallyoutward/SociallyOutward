
<?php
//script to grab users from the database
include '../dbconfig.php'; 
include 'getInterests.php';

$curUser = $_GET['curUser'];

$curUserIntList = getInterests($curUser,$connection);
$numUser = count($curUserIntList);


$sql= "SELECT UID,Ffname FROM Users WHERE UID!='" . $curUser . "'";

$rs=$connection->query($sql);
 
if($rs === false) {
  trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $connection->error, E_USER_ERROR);
} else {

while($row = $rs->fetch_assoc()){
  	$othUserIntList = getInterests($row['UID'],$connection);
  	if(count($othUserIntList)!=0)
  	{
  		
  		$numOther = count($othUserIntList);
  		$intList = array_intersect($curUserIntList, $othUserIntList);
  		$numInt = count($intList);
  		$others[$row['UID']]['intersect'] = $intList;
   		$others[$row['UID']]['percent'] = round((count($intList)/((count($othUserIntList)+count($curUserIntList))-count($intList)))*100);

  	}
  	else
  	{
  		$others[$row['UID']]['intersect'] = array();
  		$others[$row['UID']]['percent'] = 0;
  	}
  	$others[$row['UID']]['name'] = $row['Ffname'];
  }

  print_r(json_encode($others));
}