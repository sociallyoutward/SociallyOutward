<?php

function ProcessCurl($URL, $fieldString){ //Initiate Curl request and send back the result
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
        curl_setopt($ch, CURLOPT_URL, $URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        //curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fieldString);
        $resulta = curl_exec ($ch);
        if (curl_errno($ch)) {
                print curl_error($ch);
        } else {
        curl_close($ch);
        }
        echo $resulta;
    }

$jsonpost = '{
  "location": {
    "lat": -33.8669710,
    "lng": 151.1958750
   },
  "accuracy": 50,
   "name": "&&&&&&&",
   "types": ["shoe_store"],
  "language": "en-AU",
  "so": 4
}';

$url = "https://maps.googleapis.com/maps/api/place/add/json?sensor=false&key=AIzaSyAvGfRfZeJAIYfrRoL9x3WvH1h0IFC7Zb8";

$results = ProcessCurl($url, $jsonpost);

print_r("<br><br>");

$url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=36.001785,-78.860509&radius=500&sensor=false&key=AIzaSyAvGfRfZeJAIYfrRoL9x3WvH1h0IFC7Zb8";

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

echo $resp;

