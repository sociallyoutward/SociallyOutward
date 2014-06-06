
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

    <style>
        #menu{
        margin-left: -5px;
    }
    
    ul{
        list-style: none;
    }
    
    .category{
        width: 95%;
        background-color: #ccc;
        margin-bottom: 5px;
        padding: 5px;
    }
    
    .btn{
        text-align: left;
        padding-left: 10px;
        border-radius: 0;
        border: 1px solid #ccc;
    }
    
    .btn-default{
        background-color: #afe9c6;
    }
    
    .btn-warning{
        background-color: #E2F7EB;
        color: black;
    }
    
    .btn-warning:active, .btn-warning:hover{
        background-color: #D7D9D9;
        color: black;
    }
    
    .btn-primary{
        background-color: white;
        color: black;
    }
    
    a:link{
        color: black;
    }
    
    </style>

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
                            <li><a href="#"><button type="button" class="btn btn-default btn-block">Sports</button></a>
                                <ul class="sub-menu">
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Field Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Football</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Baseball/Softball</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Soccer</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Cricket</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Lacrosse</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Rugby</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Field Hockey</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Ultimate Frisbee</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Court Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Basketball</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Volleyball</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Water Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Swimming</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Motorized</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Scuba/Snorkeling</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Paddle Sports</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Free Diving</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Racket Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Tennis</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Badminton</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Racquetball</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Squash</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Cardio & Fitness</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Running</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Club Sports</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Dance</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">On & Off the Trail</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Weightlifting</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Aerobics</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Winter Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Snowboarding</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Hockey</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Downhill Skiing</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Cross-Country Skiing</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Snowmobiling</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Ice Skating</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Motor Sports</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">NASCAR</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Motocross</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">ATV</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Drag Racing</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Monster Trucks</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Karate</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Boxing</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Karate</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Self Defense</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">MMA</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Jujitzu</button></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><button type="button" class="btn btn-default btn-block">Entertainment</button></a>
                                <ul class="sub-menu">
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Educational</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Cultural Events</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">University Events</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Dance Clubs</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Conventions</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Performance Lessons</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Performing Arts</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Music</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Shows</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Cinema</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Movie Theaters</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Drive-In Movies</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Movie Clubs</button></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><button type="button" class="btn btn-default btn-block">Food & Beverage</button></a>
                                <ul class="sub-menu">
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Cooking</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Classes</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Organic</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Ethnic</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Local</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Coffee & Tea</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">xxxxxx</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Alcohol</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Wine</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Beer</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Dining</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Fine Dining</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Casual Dining</button></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                            <li><a href="#"><button type="button" class="btn btn-default btn-block">Recreational</button></a>
                                <ul class="sub-menu">
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Outdoors</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Camping</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Zoos</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Parks/Hiking</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Picknicking</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Dog Parks</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Botanical Gardens</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Family</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Museums</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Bowling</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Laser Tag</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Bowling</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Go Karting</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Art Exhibits</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Mini Golf</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Amusement Parks</button></li>
                                        </ul>
                                    </li>
                            </li>
                            </ul>
                            </li>
                            <li><a href="#"><button type="button" class="btn btn-default btn-block">Arts, Crafts, & Hobbies</button></a>
                                <ul class="sub-menu">
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Arts & Crafts</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Painting</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Crafts</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Ceramics</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Tech</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Programming</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Design</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Gaming</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Hobbies</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Book Club</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Writing</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Collectables</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Model Making</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Relaxation</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Meditation</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Massage</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Acupuncture</button></li>
                                        </ul>
                                    </li>
                                    <li><a href="#"><button type="button" class="btn btn-warning btn-block">Autmobiles</button></a>
                                        <ul class="sub-menu">
                                            <li><button type="button" class="btn btn-primary btn-block">Motorcylces</button></li>
                                            <li><button type="button" class="btn btn-primary btn-block">Cars</button></li>
                                        </ul>
                                    </li>
                                </ul>
                                <li><a href="#"><button type="button" class="btn btn-default btn-block">Seasonal</button></a>
                                    <ul class="sub-menu">
                                        <li><a href="#"><button type="button" class="btn btn-warning btn-block">Spring</button></a>
                                            <ul class="sub-menu">
                                                <li><button type="button" class="btn btn-primary btn-block">Berry Picking</button></li>
                                                <li><button type="button" class="btn btn-primary btn-block">Garden Tours</button></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><button type="button" class="btn btn-warning btn-block">Winter</button></a>
                                            <ul class="sub-menu">
                                                <li><button type="button" class="btn btn-primary btn-block">Sleigh Rides</button></li>
                                                <li><button type="button" class="btn btn-primary btn-block">Religious</button></li>
                                                <li><button type="button" class="btn btn-primary btn-block">Carolling</button></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><button type="button" class="btn btn-warning btn-block">Summer</button></a>
                                            <ul class="sub-menu">
                                                <li><button type="button" class="btn btn-primary btn-block">Camps</button></li>
                                                <li><button type="button" class="btn btn-primary btn-block">Fesitvals</button></li>
                                                <li><button type="button" class="btn btn-primary btn-block">Egg Hunts</button></li>
                                            </ul>
                                        </li>
                                        <li><a href="#"><button type="button" class="btn btn-warning btn-block">Autumn</button></a>
                                            <ul class="sub-menu">
                                                <li><button type="button" class="btn btn-primary btn-block">Hay Rides</button></li>
                                                <li><button type="button" class="btn btn-primary btn-block">Pumpkin Picking</button></li>
                                                <li><button type="button" class="btn btn-primary btn-block">Corn Maze</button></li>
                                                <li><button type="button" class="btn btn-primary btn-block">Haunted Houses</button></li>
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