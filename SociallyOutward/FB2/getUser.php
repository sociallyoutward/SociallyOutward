<?php
function getUIDFromFBID($fbid,$connection){

			$query = "select UID from Users where Fuid='". $fbid . "'";
			$user = $connection->query($query);
			$row = $user->fetch_assoc();
			return $row['UID'];
}

?>