
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
    <link href="css/accordion.css" type="text/css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">

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
		<a class="navbar-brand" href="memberprofile.php"><img src="assets/brand.png" height="45px" /></a>
	      </div>
		
	      <!-- Collect the nav links, forms, and other content for toggling -->
	      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
		  <li><a href="calendar/events.php">Events</a></li>
		  <li><a href="neighbors.php">Neighbors</a></li>
		  <li><a href="community.php">Community</a></li>
		  <li class="dropdown">
		    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Bulletin Board <b class="caret"></b></a>
		    <ul class="dropdown-menu">
		      <li><a href="feed/bulletin.php">Updates</a></li>
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
			    <li class='spaceUnder'><a href='memberprofile.php'>Home</a></li>
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
                <div class="row">
                    <div class="col-md-9">
                        <div id="googleMap" style="width:100%;height:380px;"></div>
                        <div id="interestList">
                            <div id="div1"></div>
                            <div id="div2"></div>
                            <div id="div3"></div>
                            <div id="div4"></div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        
                        <!-- Accordian -->
                        <ul id="menu" class="menu">
                            <li><a href="#"><button type="button" class="btn btn-block inner1">Sports</button></a>
                                <ul class="sub-menu">
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Field Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Football</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Baseball/Softball</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Soccer</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Cricket</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Lacrosse</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Rugby</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Field Hockey</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Ultimate Frisbee</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Court Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Basketball</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Volleyball</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Water Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Swimming</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Motorized</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Scuba/Snorkeling</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Paddle Sports</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Free Diving</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Racket Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Tennis</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Badminton</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Racquetball</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Squash</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Cardio & Fitness</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Running</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Club Sports</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Dance</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> On & Off the Trail</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Weightlifting</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Aerobics</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Winter Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Snowboarding</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Hockey</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Downhill Skiing</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Cross-Country Skiing</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Snowmobiling</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Ice Skating</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Motor Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> NASCAR</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Motocross</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> ATV</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Drag Racing</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Monster Trucks</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Karate</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Boxing</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Karate</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Self Defense</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> MMA</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Jujitzu</button></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><button type="button" class="btn btn-block inner1">Entertainment</button></a>
                                <ul class="sub-menu">
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Educational</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Cultural Events</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> University Events</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Dance Clubs</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Conventions</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Performance Lessons</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Performing Arts</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Music</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Shows</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Cinema</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Movie Theaters</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Drive-In Movies</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Movie Clubs</button></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><button type="button" class="btn btn-block inner1">Food & Beverage</button></a>
                                <ul class="sub-menu">
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Cooking</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Classes</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Organic</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Ethnic</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Local</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Coffee & Tea</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> xxxxxx</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Alcohol</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Wine</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Beer</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Dining</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Fine Dining</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Casual Dining</button></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><button type="button" class="btn btn-block inner1">Recreational</button></a>
                                <ul class="sub-menu">
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Outdoors</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Camping</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Zoos</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Parks/Hiking</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Picknicking</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Dog Parks</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Botanical Gardens</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Family</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Museums</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Bowling</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Laser Tag</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Bowling</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Go Karting</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Art Exhibits</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Mini Golf</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Amusement Parks</button></li>
                                        </ul>
                                    </li>
                            </li>
                            </ul>
                            </li>
                            <li><a href="#"><button type="button" class="btn btn-block inner1">Arts, Crafts, & Hobbies</button></a>
                                <ul class="sub-menu">
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Arts & Crafts</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Painting</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Crafts</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Ceramics</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Tech</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Programming</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Design</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Gaming</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Hobbies</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Book Club</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Writing</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Collectables</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Model Making</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Relaxation</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Meditation</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Massage</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Acupuncture</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Automobiles</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Motorcycles</button></li>
                                            <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Cars</button></li>
                                        </ul>
                                    </li>
                                </ul>
                                <li><a href="#"><button type="button" class="btn btn-block inner1">Seasonal</button></a>
                                    <ul class="sub-menu">
                                        <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Spring</button></a>
                                            <ul class="sub-menu">
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Berry Picking</button></li>
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Garden Tours</button></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Winter</button></a>
                                            <ul class="sub-menu">
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Sleigh Rides</button></li>
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Religious</button></li>
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Carolling</button></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Summer</button></a>
                                            <ul class="sub-menu">
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Camps</button></li>
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Fesitvals</button></li>
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Egg Hunts</button></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><button type="button" class="btn btn-block inner2"><i class="fa fa-chevron-right arrow1"></i> Autumn</button></a>
                                            <ul class="sub-menu">
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Hay Rides</button></li>
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Pumpkin Picking</button></li>
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Corn Maze</button></li>
                                                <li><button type="button" class="btn btn-block inner3"><i class="fa fa-chevron-right arrow1"></i><i class="fa fa-chevron-right arrow2"></i> Haunted Houses</button></li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div><!-- end accordion -->
                    </div><!-- end col-md-3 -->
                </div><!-- end row -->
	    </div><!-- end #content and end .row-->
	    
	    <div id='user' hidden='true'><?php  print_r($_COOKIE['user']); ?></div>
	    
	</div><!-- end .row -->
    </div><!-- end .container-->

    <script>
        function initMenu() {
            $(".sub-menu").hide();
            $(".current_page_item .sub-menu").show();
            $('#menu li a').click(
            
            function () {
                var checkElement = $(this).next();
                if ((checkElement.is('ul')) && (checkElement.is(':visible'))) {
                    $('#menu ul:visible').not(checkElement.parentsUntil('#menu')).slideUp('normal');
                    checkElement.slideUp('normal');
                    return false;
                }
                if ((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
                    console.log(checkElement.parentsUntil('#menu'));
                    $('#menu ul:visible').not(checkElement.parentsUntil('#menu')).slideUp('normal');
                    checkElement.slideDown('normal');
                    return false;
                }
            });
        }
        $(function () {
            initMenu();
        });
    </script>

</body>
</html>