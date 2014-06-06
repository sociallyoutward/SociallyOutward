<?php
if(!isset($_COOKIE['user']))
{
    header('location: index.php');
}

require '../fbconfig.php';
?>
<html>
<head>
    <title>Bulletin Board</title>
    
    <!-- Bootstrap 3.1.1. Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    
    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
    <!-- Bootstrap 3.1.1 Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <!-- Favicon -->
    <link rel="icon" href="../assets/logo.png">
    
    <script src=" http://code.createjs.com/createjs-2013.02.12.min.js"></script>
    <script type="text/javascript" src='../js/showMenu.js'></script>
    <script src="http://code.createjs.com/createjs-2013.02.12.min.js"></script>
    
    <script src="masonry.js"></script>
	<script src="masonryInit.js"></script>
	<script src="getPosts.js"></script>
	<script src="createPosts.js"></script>
	<script src="deletePosts.js"></script>
	<script src="populateFeed.js"></script>
	<script src="tabs.js"></script>
	<link href="masonryTest.css" type="text/css" rel="stylesheet">
    
    <!-- Socially Outward Styles -->
    <link href="../css/memberProfile.css" type="text/css" rel="stylesheet">
    <link href="../css/navigationTemplate.css" type="text/css" rel="stylesheet">
    <link href="../css/styles.css" type="text/css" rel="stylesheet">
</head>

<body>
    <div class="container">
	<nav class="navbar navbar-default navbar-fixed-top" role="navigation">
	    <div class="container-fluid">
	      <!-- Brand and toggle get grouped for better mobile display -->
	      <div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
		  <span class="sr-only">Toggle navigation</span>
		  <span><img src="../assets/toggle_down.png" height="15px"</span>
		</button>
		<a class="navbar-brand" href="../memberprofile.php"><img src="../assets/brand.png" height="45px" /></a>
	      </div>
		
	      <!-- Collect the nav links, forms, and other content for toggling -->
	      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		<ul class="nav navbar-nav">
		  <li><a href="../calendar/events.php">Events</a></li>
		  <li><a href="../neighbors.php">Neighbors</a></li>
		  <li><a href="../community.php">Community</a></li>
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
		    <img src="../assets/toggle_right.png" height="30px"/>
		</div>
		<div class="col-xs-10">
		    <div id="sideNav side-Navigation" class="sNav">
			<div id='sNav-inner'>
			<p id='name' class='pushover'><?php echo $fbfullname; ?></p>
			<a href="../memberprofile.php"><img id='profpic' class='spaceUnder pushover' src="https://graph.facebook.com/<?php echo $user; ?>/picture?height=350&width=350"></a>
			<ul class='po'>
			    <li class='spaceUnder'><a href='../memberprofile.php'>Home</a></li>
			    <li class='spaceUnder'><a href='messages.php'>Messages</a></li>
			    <li class='spaceUnder'><a href='settings.php'>Settings</a></li>
			    <li class='spaceUnder'><a href='../chooseInterests.php'>Choose Interests</a></li>
			    <li class='spaceUnder'><a href="<?php echo $logoutUrl; ?>">Logout</a></li>
			</ul>
		    </div>
		    </div>
		</div>
	    </div><!-- end toggleSide -->
	    
	    <div id='content' class="row">
		<!-- Button trigger modal -->
		<button class="btn btn-primary btn-lg modal-toggle" data-toggle="modal" data-target="#myModal" id="button1">
		  Create Update
		</button>
		<button class="btn btn-primary btn-lg modal-toggle" data-toggle="modal" data-target="#myModal" id="button2">
		  Create Promotion
		</button>
		<button class="btn btn-primary btn-lg modal-toggle" data-toggle="modal" data-target="#myModal" id="button3">
		  Create Event
		</button>
		<button class="btn btn-primary btn-lg" id="clear-posts">
		  Clear Post Database
		</button>

		<!-- Modal -->
		<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
		    <div class="modal-content">
		      <div class="modal-header">
		        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		        <h4 class="modal-title" id="myModalLabel">Create Post</h4>
		      </div>
		      <div class="modal-body">
		      		<form role="form">
					  <div class="form-group">
					    <label for="post-title">Title</label>
					    <input type="text" class="form-control" id="post-title" placeholder="Title">
					  </div>
					  <div class="form-group">
					    <label for="post-content">Content</label>
					    <textarea class="form-control" id="post-content"></textarea>
					  </div>
					</form>
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
		        <button type="button" class="btn btn-primary" id="post-button">Post</button>
		      </div>
		    </div>
		  </div>
		</div>

		<!-- Nav tabs -->
		<ul class="nav nav-tabs">
		  <li class="active" id="tab1"><a href="#type1" data-toggle="tab">Updates</a></li>
		  <li id="tab2"><a href="#type2" data-toggle="tab">Promotions</a></li>
		  <li id="tab3"><a href="#type3" data-toggle="tab">Events</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
		  <div class="tab-pane active" id="type1">
		  </div>
		  <div class="tab-pane" id="type2"></div>
		  <div class="tab-pane" id="type3"></div>
		</div>
	    </div><!-- end #content and end .row-->
	    
	    <div id='user' hidden='true'><?php  print_r($_COOKIE['user']); ?></div>
	    
	</div><!-- end .row -->
    </div><!-- end .container-->


</body>
</html>