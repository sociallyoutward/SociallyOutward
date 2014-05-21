<? ob_start(); ?>

<?php
ob_start();
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
<p>This is where all of the updates will go from now on</p>
<p>Bubble Test:</p>
<p><a href = 'bubbletest.php'>Bubble Test</a></p>
<p>ReCaptcha Test:</p>
<p><a href = 'captchatest.php'>ReCaptcha Test</a></p>
<p>Bubble Test with Database Integration (Main Web):</p>
<p><a href = 'bubble2.php'>Bubble Test 2</a></p>
<p>Bubble Test with Database Integration (User Web):</p>
<p><a href = 'bubble2.php'>Bubble Test 3</a></p>
<p>Maps Test</p>
<p><a href = '../maps_test/json.html'>Maps Test</a></p>

</body>
</html>

<? ob_flush(); ?>