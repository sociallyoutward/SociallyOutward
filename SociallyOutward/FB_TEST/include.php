<?php
$config["fb_app_id"] = "496761540436805";
$config["fb_app_secret"] = "f5a4fef7e73a9ffb77f20a2692d50ec3";
$config["base_url"] = "http://sociallyoutward.com";
$config["fb_fields"] = array(
    array("name" => "name"),
    array("name" => "email"),
    array("name" => "location"),
    array("name" => "gender"),
    array("name" => "birthday")
);


/* Database Settings */
$dbhost = "localhost";
$dbname = "socia150_sodb";
$dbuser = "socia150_aw";
$dbpass = "socially2013!";

mysql_connect($dbhost, $dbuser, $dbpass) or die("MySQL Error: " . mysql_error());
mysql_select_db($dbname) or die("MySQL Error: " . mysql_error());