<?php
if(!isset($_COOKIE['user']))
{
header( 'Location: http://www.sociallyoutward.com' ) ;
}
?>
<html>
<head>
    <title>SociallyOutward</title>
    <script src=" http://code.createjs.com/createjs-2013.02.12.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
</head>
<body>
<form action="/php/members.php" method="POST">

<?php
  require_once('recaptchalib.php');
  $publickey = "6LfltOESAAAAAA1VsTe2rUtdbBCYGsYtNeIXGIEc";
  echo recaptcha_get_html($publickey);
?>


<span>first:</span><input type="text" name="first">
<span>last:</span><input type="text" name="last">
<span>username:</span><input type="text" name="username">
<span>password:</span><input type="text" name="password">
<input type="submit">
</form>
</body>
</html>
