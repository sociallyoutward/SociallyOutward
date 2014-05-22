<?php
function getUIDFromFBID($fbid,$connection){

			$query = "select UID from Users where Fuid='". $fbid . "'";
			$user = $connection->query($query);
			$row = $user->fetch_assoc();
			return $row['UID'];
			// $rs=$connection->query($sql);

			// if($rs->num_rows>0)
			// {
			// 	$rs->data_seek(0);
			// 	while($row = $rs->fetch_assoc()){
			//     $indsInts[$i] = $row['interestID'];
			// 	}
			// }

			//user = mysql_query("select UID from Users where Fuid='$fbid'");
			//$sqlArray = mysql_fetch_array($user);
			//return $sqlArray['UID'];
}

?>