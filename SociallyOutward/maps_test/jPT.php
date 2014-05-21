<?php

$radius = $_GET['radius'];
$lat = $_GET['clat'];
$lng = $_GET['clng'];
$next = $_GET['next'];


if(!is_null($next))
{
$url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?pagetoken=".$next."&sensor=false&key=AIzaSyAvGfRfZeJAIYfrRoL9x3WvH1h0IFC7Zb8";
}
else
{
//$url = "https://maps.googleapis.com/maps/api/place/radarsearch/json?types=establishment&location=".$lat.",".$lng."&radius=".$radius."&sensor=false&key=AIzaSyAvGfRfZeJAIYfrRoL9x3WvH1h0IFC7Zb8";

$url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?types=establishment&location=".$lat.",".$lng."&radius=".$radius."&sensor=false&key=AIzaSyAvGfRfZeJAIYfrRoL9x3WvH1h0IFC7Zb8";
}
// Get cURL resource
$curl = curl_init();
// Set some options - we are passing in a useragent too here
curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => $url
));
// Send the request & save response to $resp
$resp = curl_exec($curl);
// Close request to clear up some resources
curl_close($curl);

header("Content-type: application/json");
print($resp);