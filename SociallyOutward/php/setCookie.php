<?php
  
  ob_start();

  $userid = $_GET['userid'];
  $stayLoggedIn = $_GET['stayLoggedIn'];
  $userInfo = array();
  $userInfo['id'] = $userid;
  print_r($stayLoggedIn);
  
  if($stayLoggedIn=="true")
  {
    setcookie('user', serialize($userInfo), time()+60*60*24*30, '/', '.sociallyoutward.com', false);
    print(json_encode(true));
  }
  else
  {
    setcookie('user', serialize($userInfo), 0, '/', '.sociallyoutward.com', false);
    print(json_encode(true));

  }

  
  
  // if(isset($_COOKIE['user']))
  // header('Location: http://www.sociallyoutward.com/updates');

?> 