<?php
define('DB_USERNAME','socia150_aw');
define('DB_PASSWORD','socially2013!');
define('DB_SERVER','localhost');
define('DB_DATABASE','socia150_sodb');
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD) or die( "Unable to connect");
$database = mysqli_select_db($connection,DB_DATABASE) or die( "Unable to select database");
?>