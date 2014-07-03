<?php
if(!isset($_COOKIE['user']))
{
    header('location: index.php');
}

require 'fbconfig.php';
?>
<html>
<head>
    <title>My Profile</title>
    
    <!-- Bootstrap 3.1.1. Latest compiled and minified CSS -->
    <link rel='stylesheet' href='http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
    
    <!-- JQuery -->
    <script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
    
    <!-- Bootstrap 3.1.1 Latest compiled and minified JavaScript -->
    <script src='http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js'></script>
    
    <!-- Socially Outward Styles -->
    <link href='css/memberProfile.css' type='text/css' rel='stylesheet'>
    <link href='css/navigationTemplate.css' type='text/css' rel='stylesheet'>
    <link href='css/styles.css' type='text/css' rel='stylesheet'>
    <link href='css/webPosition.css' type='text/css' rel='stylesheet'>
    <link href="css/boxTransition.css" type="text/css" rel="stylesheet"/>
    
    <link rel='icon' href='assets/logo.png'>
    
    <script src='http://code.createjs.com/createjs-2013.12.12.min.js'></script>
    <script src='http://code.createjs.com/createjs-2013.02.12.min.js'></script>
    
    <script src='js/bubbles/dbinitialize2.js'></script>
    <script src='js/bubbles/resize.js'></script>
    <script src='js/bubbles/dbbubble.js'></script>
    <script src='js/clearInterests.js'></script>
    <script type='text/javascript' src='js/showMenu.js'></script>
    <script src='js/sideMenu.js'></script>
    <script src="js/modernizr.custom.js"></script>
</head>

<body>
    <div class='container'>
	<nav class='navbar navbar-default navbar-fixed-top' role='navigation'>
	    <div class='container-fluid'>
	      <!-- Brand and toggle get grouped for better mobile display -->
	      <div class='navbar-header'>
		<button type='button' class='navbar-toggle' data-toggle='collapse' data-target='#bs-example-navbar-collapse-1'>
		  <span class='sr-only'>Toggle navigation</span>
		  <span><img src='assets/toggle_down.png' height='15px'</span>
		</button>
		<a class='navbar-brand' href='memberprofile.php'><img src='assets/brand.png' height='45px' /></a>
	      </div>
		
	      <!-- Collect the nav links, forms, and other content for toggling -->
	      <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
		<ul class='nav navbar-nav'>
		  <li><a href='calendar/events.php'>Events</a></li>
		  <li><a href='neighbors.php'>Neighbors</a></li>
		  <li><a href='community.php'>Community</a></li>
		  <li class='dropdown'>
		    <a href='bulletin.php' class='dropdown-toggle' data-toggle='dropdown'>Bulletin Board <b class='caret'></b></a>
		    <ul class='dropdown-menu'>
		      <li><a href='feed/bulletin.php'>Updates</a></li>
		      <li class='divider'></li>
		      <li><a href='feed/bulletin.php'>Promotions</a></li>
		      <li class='divider'></li>
		      <li><a href='feed/bulletin.php'>Events</a></li>
		    </ul>
		  </li>
		</ul>
		<p class='navbar-text navbar-right hidden-sm hidden-xs'>changing social media</p>
	      </div><!-- /.navbar-collapse -->
	    </div><!-- /.container-fluid -->
	</nav>
	
	<div class='row'>
	    
	    <!--Absolute Position on Md/Lg Screen-->
	    <div id='absolute' class='hidden-xs'>
		<div class='col-xs=2'>
		    <img src='assets/toggle_empty.png' height='30px'/>
		</div>
		<div class='col-xs-10'>
		    <div id='sideNav side-Navigation' class='sNav'>
			<div id='sNav-inner'>
			<p id='name' class='pushover'><?php echo $fbfullname; ?></p>
			<img id='profpic' class='spaceUnder pushover' src='https://graph.facebook.com/<?php echo $user; ?>/picture?height=350&width=350'>
			<ul class='po'>
			    <li class='spaceUnder'><a href='memberprofile.php'>Home</a></li>
			    <li class='spaceUnder'><a href='messages.php'>Messages</a></li>
			    <li class='spaceUnder'><a href='settings.php'>Settings</a></li>
			    <li class='spaceUnder'><a href='chooseInterests.php'>Choose Interests</a></li>
			    <li class='spaceUnder'><a href='<?php echo $logoutUrl; ?>'>Logout</a></li>
			</ul>
		    </div>
		    </div>
		</div>
	    </div><!-- end toggleSide -->
	    
	    <!--Toggle Nav on Sm/Xs Screen-->
	    <div id='toggleSide' class='hidden-sm hidden-md hidden-lg'>
		<div class='col-xs=2'>
		    <img src='assets/toggle_right.png' height='30px'/>
		</div>
		<div class='col-xs-10'>
		    <div id='sideNav side-Navigation' class='sNav'>
			<div id='sNav-inner'>
			<p id='name' class='pushover'><?php echo $fbfullname; ?></p>
			<img id='profpic' class='spaceUnder pushover' src='https://graph.facebook.com/<?php echo $user; ?>/picture?height=350&width=350'>
			<ul class='po'>
			    <li class='spaceUnder'><a href='memberprofile.php'>Home</a></li>
			    <li class='spaceUnder'><a href='messages.php'>Messages</a></li>
			    <li class='spaceUnder'><a href='settings.php'>Settings</a></li>
			    <li class='spaceUnder'><a href='chooseInterests.php'>Choose Interests</a></li>
			    <li class='spaceUnder'><a href='<?php echo $logoutUrl; ?>'>Logout</a></li>
			</ul>
		    </div>
		    </div>
		</div>
	    </div><!-- end toggleSide -->
	    
	    <div id='content' class='row'>
		<div id="bl-main" class="bl-main">
		    <section>
			<div class="bl-box">
			    <h2 class="bl-icon bl-icon-about">Interest Web</h2>
			    <img src="assets/web-icon.png">
			</div>
			<div class="bl-content">
			    <h2>Interest Web</h2>
			    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
				<div id='can'>
				    <canvas width='460px' height='500px' id='myCanvas'></canvas>
				</div>
			    </div>
			    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
				    <canvas width='230px' height='580px' id='navCanvas'></canvas>
			    </div>
			</div>
			<span class="bl-icon bl-icon-close">X</span>
		    </section>
		    <section id="bl-work-section">
			<div class="bl-box">
			    <h2 class="bl-icon bl-icon-works">Socially Outward Status</h2>
			    <img src="assets/vs-icon.png">
			</div>
			<div class="bl-content">
			    <h2>You vs. Friend</h2>
			    <p>Beginner</p>
			    <p>Expert</p>
			</div>
			<span class="bl-icon bl-icon-close">X</span>
		    </section>
		    <section>
			<div class="bl-box">
			    <h2 class="bl-icon bl-icon-blog">Recent Activity</h2>
			    <img src="assets/feed-icon.png">
			</div>
			<div class="bl-content">
			    <h2>What's the 411 in CH</h2>
			    <div>
				<h3>Random Thing</h3>
				<p>extra deets</p>
			        <hr />
			    </div>
			    <div>
				<h3>Random Thing</h3>
				<p>extra deets</p>
				<hr />
			    </div>
			</div>
			<span class="bl-icon bl-icon-close">X</span>
		    </section>
		    <section>
			<div class="bl-box">
			    <h2 class="bl-icon bl-icon-contact">What's Hot Nearby</h2>
			    <img src="assets/explore-icon.png">
			</div>
			<div class="bl-content">
			    <h2>Cool stuff in Raleigh</h2>
			    <p>blah blah blah</p>
			</div>
			<span class="bl-icon bl-icon-close">X</span>
		    </section>
		</div>
	    </div> <!-- end #content -->
	    
	    <div id='user' hidden='false'><?php  print_r($_COOKIE['user']); ?></div>
	    
	</div><!-- end .row -->
    </div><!-- end .container-->

    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="js/boxTransition.js"></script>
    <script>
	$(function() {
	    Boxlayout.init();
	});
    </script>

</body>
</html>