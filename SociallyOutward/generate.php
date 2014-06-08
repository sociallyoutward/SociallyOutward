<?php
define('ROOTPATH', __DIR__);

// require proper php files
//require 'noUserRedir.php'; ***
require 'fbconfig.php';

//start html output
echo "<html>";

//start head output
echo "<head>";
echo    "<title>".$thisPage['title']."</title>";
echo    "<!-- Bootstrap 3.1.1. Latest compiled and minified CSS -->";
echo    "<link rel='stylesheet' href='http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>";
    
echo    "<!-- JQuery -->";
echo    "<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>";
    
echo   "<!-- Bootstrap 3.1.1 Latest compiled and minified JavaScript -->";
echo   "<script src='http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>";
    
echo    "<!-- Socially Outward Styles -->";
echo    "<link href='css/memberProfile.css' type='text/css' rel='stylesheet'>";
echo    "<link href='css/navigationTemplate.css' type='text/css' rel='stylesheet'>";
echo    "<link href='css/styles.css' type='text/css' rel='stylesheet'>";
    
echo   "<link rel='icon' href='assets/logo.png'>";
    
echo    "<script src=' http://code.createjs.com/createjs-2013.02.12.min.js'></script>";
echo    "<script type='text/javascript' src='js/showMenu.js'></script>";
echo    "<script src='http://code.createjs.com/createjs-2013.02.12.min.js'></script>";
echo    "<script src='/js/bubbles/dbinitialize2.js'></script>";
echo    "<script src='/js/bubbles/resize.js'></script>";
echo    "<script src='/js/bubbles/dbbubble.js'></script>";
echo    "<script src='/js/clearInterests.js'></script>";
echo    "<script src='/js/sideMenu.js'></script>";
echo    "</head>";

//start body output
echo "<body>";
echo "<div class='container'>";

//start top nav
echo "<nav class='navbar navbar-default navbar-fixed-top' role='navigation'>";
echo	    "<div class='container-fluid'>";
echo	      "<!-- Brand and toggle get grouped for better mobile display -->";
echo	      "<div class='navbar-header'>";
echo		"<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>";
echo		  "<span class='sr-only'>Toggle navigation</span>";
echo		  "<span><img src='assets/toggle_down.png' height='15px'</span>";
echo		"</button>";
echo		"<a class='navbar-brand' href='memberprofile.php'><img src='assets/brand.png' height='45px' /></a>";
echo	      "</div>";		
echo	      "<!-- Collect the nav links, forms, and other content for toggling -->";
echo	      "<div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>";
echo		"<ul class='nav navbar-nav'>";
echo		  "<li><a href='calendar/events.php'>Events</a></li>";
echo		  "<li><a href='neighbors.php'>Neighbors</a></li>";
echo		  "<li><a href='community.php'>Community</a></li>";
echo		  "<li class='dropdown'>";
echo		    "<a href='bulletin.php' class='dropdown-toggle' data-toggle='dropdown'>Bulletin Board <b class='caret'></b></a>";
echo		    "<ul class='dropdown-menu'>";
echo		      "<li><a href='feed/bulletin.php'>Updates</a></li>";
echo		      "<li class='divider'></li>";
echo		      "<li><a href='feed/bulletin.php'>Promotions</a></li>";
echo		      "<li class='divider'></li>";
echo		      "<li><a href='feed/bulletin.php'>Events</a></li>";
echo		    "</ul>";
echo		  "</li>";
echo		"</ul>";
echo		"<p class='navbar-text navbar-right hidden-sm hidden-xs'>changing social media</p>";
echo	      "</div><!-- /.navbar-collapse -->";
echo	    "</div><!-- /.container-fluid -->";
echo	"</nav>";

//start row
echo "<div class='row'>";
	    
echo	    "<!--Absolute Position on Md/Lg Screen-->";
echo	    "<div id='absolute' class='hidden-xs'>";
echo		"<div class='col-xs=2'>";
echo		    "<img src='assets/toggle_empty.png' height='30px'/>";
echo		"</div>";
echo		"<div class='col-xs-10'>";
echo		    "<div id='sideNav side-Navigation' class='sNav'>";
echo			"<div id='sNav-inner'>";
echo			"<p id='name' class='pushover'>". $fbfullname ."</p>";
echo			"<img id='profpic' class='spaceUnder pushover' src='https://graph.facebook.com/".$user."/picture?height=350&width=350'>";
echo			"<ul class='po'>";
echo			    "<li class='spaceUnder'><a href='memberprofile.php'>Home</a></li>";
echo			    "<li class='spaceUnder'><a href='#'>Messages</a></li>";
echo			    "<li class='spaceUnder'><a href='#'>Settings</a></li>";
echo			    "<li class='spaceUnder'><a href='chooseInterests.php'>Choose Interests</a></li>";
echo			    "<li class='spaceUnder'><a href='". $logoutUrl."'>Logout</a></li>";
echo			"</ul>";
echo		    "</div>";
echo		    "</div>";
echo		"</div>";
echo	    "</div><!-- end toggleSide -->";
	    
echo	    "<!--Toggle Nav on Sm/Xs Screen-->";
echo	    "<div id='toggleSide' class='hidden-sm hidden-md hidden-lg'>";
echo		"<div class='col-xs=2'>";
echo		    "<img src='assets/toggle_right.png' height='30px'/>";
echo		"</div>";
echo		"<div class='col-xs-10'>";
echo		    "<div id='sideNav side-Navigation' class='sNav'>";
echo			"<div id='sNav-inner'>";
echo			"<p id='name' class='pushover'>". $fbfullname ."</p>";
echo			"<img id='profpic' class='spaceUnder pushover' src='https://graph.facebook.com/<?php echo $user; ?>/picture?height=350&width=350'>";
echo			"<ul class='po'>";
echo			    "<li class='spaceUnder'><a href='memberprofile.php'>Home</a></li>";
echo			    "<li class='spaceUnder'><a href='#'>Messages</a></li>";
echo			    "<li class='spaceUnder'><a href='#'>Settings</a></li>";
echo			    "<li class='spaceUnder'><a href='chooseInterests.php'>Choose Interests</a></li>";
echo			    "<li class='spaceUnder'><a href='<?php echo $logoutUrl; ?>'>Logout</a></li>";
echo			"</ul>";
echo		    "</div>";
echo		    "</div>";
echo		"</div>";
echo	    "</div><!-- end toggleSide -->";
	    
echo	    "<div id='user' hidden='true'>" . print_r($_COOKIE['user']). "</div>";
	    
echo	"</div><!-- end .row -->";
echo    "</div><!-- end .container-->";

?>

