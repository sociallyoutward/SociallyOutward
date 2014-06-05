<?php
require 'fbconfig.php';
require 'getUser.php';

$UID = getUIDFromFBID($fbid,$connection);
setcookie('user', $UID, time()+60*60*24*30, '/', "sociallyoutward.com", false);
header("location: memberprofile.php");

?>