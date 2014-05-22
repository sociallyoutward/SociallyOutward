<?php
require 'src/facebook.php';  // Include facebook SDK file
require 'functions.php';  // Include functions
require 'dbconfig.php';
$facebook = new Facebook(array(
  'appId'  => '496761540436805',   // Facebook App ID 
  'secret' => 'f5a4fef7e73a9ffb77f20a2692d50ec3',  // Facebook App Secret
  'cookie' => true,	
));
$user = $facebook->getUser();
if ($user) {
  try {
    $user_profile = $facebook->api('/me');
  	 $fbid = $user_profile['id'];                 // To Get Facebook ID
 	    $fbuname = $user_profile['username'];  // To Get Facebook Username
 	    $fbfullname = $user_profile['name']; // To Get Facebook full name
	    $femail = $user_profile['email'];    // To Get Facebook email ID
           checkuser($fbid,$fbuname,$fbfullname,$femail,$connection);    // To update local DB
  } catch (FacebookApiException $e) {
    echo '<script>console.log(' . $e . ');</script>';
    error_log($e);
   $user = null;
  }
}
if ($user) {
  $logoutUrl = $facebook->getLogoutUrl(array(
		 'next' => 'http://sociallyoutward.com/logout.php',  // Logout URL full path
		));
} else {
 $loginUrl = $facebook->getLoginUrl(array(
		'scope'		=> 'email', // Permissions to request from the user
    'redirect_uri' => 'http://sociallyoutward.com/setCookie.php' 
		));
}
?>