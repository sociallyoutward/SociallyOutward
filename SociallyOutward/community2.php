<!--Add php back in-->
<html>
<head>
    <title>Community</title>
    
    <!-- Bootstrap 3.1.1. Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    
    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
    <!-- Bootstrap 3.1.1 Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <!--Favicon-->
    <link rel="icon" href="assets/logo.png">
    
    <link href="css/memberProfile.css" type="text/css" rel="stylesheet">
    <link href="css/navigationTemplate.css" type="text/css" rel="stylesheet">
    <script src=" http://code.createjs.com/createjs-2013.02.12.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://code.createjs.com/createjs-2013.02.12.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?key=AIzaSyAvGfRfZeJAIYfrRoL9x3WvH1h0IFC7Zb8&libraries=places,geometry&sensor=false"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script src="maps_test/jtInitialize.js"></script>
    <script src='maps_test/jsonParseTest.js'></script>
    <script src='maps_test/interestTree.js'></script>
    <script src="/js/sideMenu.js"></script>
    
    <!-- Socially Outward Styles -->
    <link href="css/memberProfile.css" type="text/css" rel="stylesheet">
    <link href="css/navigationTemplate.css" type="text/css" rel="stylesheet">
    <link href="css/styles.css" type="text/css" rel="stylesheet">
</head>

<body>
    <div class="container">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	    <div class="container-fluid">
	      <!-- Brand and toggle get grouped for better mobile display -->
	      <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		  <span class="sr-only">Toggle navigation</span>
		  <span><img src="assets/toggle_down.png" height="15px"</span>
		</button>
		<a class="navbar-brand" href="index.php"><img src="assets/brand.png" height="45px" /></a>
	      </div>
		
	      <!-- Collect the nav links, forms, and other content for toggling -->
	      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
		  <li><a href="#">Events</a></li>
		  <li><a href="#">Neighbors</a></li>
		  <li><a href="community.php">Community</a></li>
		  <li class="dropdown">
		    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bulletin Board <b class="caret"></b></a>
		    <ul class="dropdown-menu">
		      <li><a href="#">Updates</a></li>
		      <li class="divider"></li>
		      <li><a href="#">Promotions</a></li>
		      <li class="divider"></li>
		      <li><a href="#">Events</a></li>
		    </ul>
		  </li>
		</ul>
		<p class="navbar-text navbar-right hidden-sm hidden-xs">changing social media</p>
	      </div><!-- /.navbar-collapse -->
	    </div><!-- /.container-fluid -->
	</nav>
	
	<div class="row">
	    <div id="toggleSide">
		<div class="col-xs=2">
		    <img src="assets/toggle_right.png" height="30px"/>
		</div>
		<div class="col-xs-10">
		    <div id="sideNav side-Navigation" class="sNav">
			<div id='sNav-inner'>
			<p id='name' class='pushover'><?php echo $fbfullname; ?></p>
			<img id='profpic' class='spaceUnder pushover' src="https://graph.facebook.com/<?php echo $user; ?>/picture?height=350&width=350">
			<ul class='po'>
			    <li class='spaceUnder'><a href='index.php'>Home</a></li>
			    <li class='spaceUnder'><a href='#'>Messages</a></li>
			    <li class='spaceUnder'><a href='#'>Settings</a></li>
			    <li class='spaceUnder'><a href='chooseInterests.php'>Choose Interests</a></li>
			    <li class='spaceUnder'><a href="<?php echo $logoutUrl; ?>">Logout</a></li>
			</ul>
		    </div>
		    </div>
		</div>
	    </div><!-- end toggleSide -->
	    
	    <div id='content' class="row">
		<div id="googleMap" style="width:100%;height:380px;"></div>
		    <div id="interestList">
			<div id="div1"></div>
			<div id="div2"></div>
			<div id="div3"></div>
			<div id="div4"></div>
		    </div>
		</div>
	    </div><!-- end #content and end .row-->
	    
	    <div id='user' hidden='true'><?php  print_r($_COOKIE['user']); ?></div>
	    
	</div><!-- end .row -->
    </div><!-- end .container-->


</body>
</html>