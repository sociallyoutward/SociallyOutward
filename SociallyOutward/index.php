<!-- Took out php here for testing MAMP -->

<html xmlns:fb="http://www.facebook.com/2008/fbml">
<head>
    <title>SociallyOutward</title>
    
    <!-- Bootstrap 3.1.1. Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    
    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
    <!-- Bootstrap 3.1.1 Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <!-- Socially Outward Styles -->
    <link href="css/memberProfile.css" type="text/css" rel="stylesheet">
    <link href="css/navigationTemplate.css" type="text/css" rel="stylesheet">
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <link href="css/index2.css" type="text/css" rel="stylesheet">

    <script src=" http://code.createjs.com/createjs-2013.02.12.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="js/login.js"></script>
    <script src="js/bottombar.js"></script>
</head>

<body>
	<div class="header row">
		<img src="assets/socially.png" height="65px" /><img src="assets/outward.png" height="65px" />
	</div>
	
	<img src="assets/logo.png" height="100px" id="centerlogo" />
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
		
		<!--Changed link for testing-->
		<a href="#"><img src = "assets/fb_login.png" id = 'fb_login'></a>
	</form>
	
	
</body>
</html>

<!-- Lucida sans
Segoe print  -->