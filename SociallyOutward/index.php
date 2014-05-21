<?php
require 'fbconfig.php';   // Include fbconfig.php file
if(isset($_COOKIE['user']))
{
    header('location: memberProfile.php');
}
?>
<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title>SociallyOutward</title>
    <link href="css/bordertest2.css" type="text/css" rel="stylesheet">
    <script src=" http://code.createjs.com/createjs-2013.02.12.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="js/login.js"></script>
    <script src="js/bottombar.js"></script>
</head>
<body>
<div id='inner'>
<p id="name"><span class="ls">Socially</span><span class="sp">Outward</span></p>
<div id='logo'><img src="assets/logo.png" id="logopic"></div>

<form id='login_form'>
    <div id='lText'>
    <input type="text" value="username" id="username" class="lInput" onfocus="clearField(this,0);"></input>
    <input type="password" value="password" id="password" class="lInput" onfocus="clearField(this,1);"></input>
    </div>
    <div id="lOther">
    <span id="kmli"><input type="checkbox" id='stayLoggedIn'>Keep me logged in</input></span>
    <a href="" id="fp">forgot password?</a>
    </div>
    <div id="unplug">
    <input type="submit" value="unplug" id="up" class="subbutton"></input>
    <a href='newmember.php'><input type="button" value="create new account" id="up" class="subbutton"></input></a>
    </div>
    <a href="<?php echo $loginUrl; ?>"><img src = "assets/fb_login.png" id = 'fb_login'></a>
</form>
</div>
</body>
</html>

<!-- Lucida sans
Segoe print  -->