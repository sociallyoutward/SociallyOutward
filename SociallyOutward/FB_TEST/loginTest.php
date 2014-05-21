<?php
require 'php-sdk/facebook.php';

// Create our Application instance (replace this with your appId and secret).
  $facebook = new Facebook(array(
   'appId' => '496761540436805',
    'secret' => 'f5a4fef7e73a9ffb77f20a2692d50ec3',
       'cookie' => true));


    // Get User ID
    $user = $facebook->getUser();


    if ($user) {
    try {
      // Proceed knowing you have a logged in user who's authenticated.
      $fbuid = $facebook->getUser();
      $user_profile = $facebook->api('/me');

      header('Location: user_page.php');

      } catch (FacebookApiException $e) {
      error_log($e);
     $user = null;
    }
     }


     // Login or logout url will be needed depending on current user state.
     if ($user) {
      $logoutUrl = $facebook->getLogoutUrl();

     } else {

        $loginUrl = $facebook->getLoginUrl(Array('scope'=>    'user_interests,user_activities,user_education_history,user_likes,user_about_me,   user_birthday, user_groups, user_hometown, user_work_history, email',
          'redirect_uri' => 'http://www.sociallyoutward.com/user_page.php')
          );
          }

          ?>

