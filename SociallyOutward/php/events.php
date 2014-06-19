<?php
if(!isset($_COOKIE['user']))
	{
	header('location: index.php');
	}
require '../fbconfig.php';
?>
<html>
<head>
	<title>Event Calendar</title>

    <!-- Bootstrap 3.1.1. Latest compiled and minified CSS -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
    
    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    
    <!-- Bootstrap 3.1.1 Latest compiled and minified JavaScript -->
    <script src="http://netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    
    <!-- Favicon -->
    <link rel="icon" href="../assets/logo.png">
    
    <script src=" http://code.createjs.com/createjs-2013.02.12.min.js"></script>
    <script type="text/javascript" src='js/showMenu.js'></script>
    <script src="http://code.createjs.com/createjs-2013.02.12.min.js"></script>
    <script src="/js/bubbles/dbinitialize2.js"></script>
    <script src="/js/bubbles/resize.js"></script>
    <script src="/js/bubbles/dbbubble.js"></script>
    <script src="/js/clearInterests.js"></script>
    <script src="/js/sideMenu.js"></script>
    
	<link rel="stylesheet" href="components/bootstrap3/css/bootstrap.css">
	<link rel="stylesheet" href="css/calendar.css">
	<link rel="stylesheet" href="css/calendarStyles.css">
    
    <!-- Socially Outward Styles -->
    <link href="../css/memberProfile.css" type="text/css" rel="stylesheet">
    <link href="../css/navigationTemplate.css" type="text/css" rel="stylesheet">
    <link href="../css/styles.css" type="text/css" rel="stylesheet">

	<style type="text/css">
		.btn-twitter {
			padding-left: 30px;
			background: rgba(0, 0, 0, 0) url(https://platform.twitter.com/widgets/images/btn.27237bab4db188ca749164efd38861b0.png) -20px 9px no-repeat;
		}
		.btn-twitter:hover {
			background-position:  -21px -16px;
		}
	</style>
	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	<script src="ajax-form.js"></script>
	
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
		      <li><a href="bulletin.php">Updates</a></li>
		      <li class="divider"></li>
		      <li><a href="bulletin.php">Promotions</a></li>
		      <li class="divider"></li>
		      <li><a href="bulletin.php">Events</a></li>
		    </ul>
		  </li>
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
			<img id='profpic' class='spaceUnder pushover' src="https://graph.facebook.com/<?php echo $user; ?>/picture?height=350&width=350">
			<ul class='po'>
			    <li class='spaceUnder'><a href='../memberprofile.php'>Home</a></li>
			    <li class='spaceUnder'><a href='#'>Messages</a></li>
			    <li class='spaceUnder'><a href='#'>Settings</a></li>
			    <li class='spaceUnder'><a href='../chooseInterests.php'>Choose Interests</a></li>
			    <li class='spaceUnder'><a href="<?php echo $logoutUrl; ?>">Logout</a></li>
			</ul>
		    </div>
		    </div>
		</div>
	    </div><!-- end toggleSide -->
	    
	    <!-- Begin calendar -->
	    <div id='content' class="row">
		
		<div class="page-header">
			
			<div class="pull-right form-inline">
				<!--Submission Form to Create Event -->
				
				<!-- Button to trigger modal -->
				<button class="btn btn-success" data-toggle="modal" data-target="#myModal">
				  Create an Event
				</button>
				
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				  <div class="modal-dialog">
				    <div class="modal-content">
				      <div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title" id="myModalLabel">Create an Event</h4>
				      </div>
				      
				      <div class="modal-body">
					<!-- Submission Form -->
					<form role="form">
						<div class="form-group">
							<label>Name</label>
							<input type="title" class="form-control" placeholder="Name">
						</div>
					</form>
					<form class="form-inline" role="form">
						<div class="form-group">
							<label>Date</label>
							<input type="date" class="form-control" placeholder="date">
						</div>
						<div class="form-group">
							<label>Time</label>
							<input type="time" class="form-control" placeholder="time">
						</div>
						<div class="form-group">
							<label>Type</label>
							<select class="form-control">
							<option>Public</option>
							<option>Private</option>
						      </select>
						</div>
					</form>
					<br>
					<form>
						<div class="form-group">
							<label>Description</label>
							<textarea type="text" class="form-control" rows="3"></textarea>
						</div>
						<div class="form-group">
							<label for="exampleInputPassword1">Interest</label>
							<select class="form-control">
							<option>Entertainment</option>
							<option>Sports</option>
							<option>Recreational Activities</option>
							<option>Food & Beverage</option>
							<option>Arts, Crafts, & Hobbies</option>
							<option>Seasonal</option>
						      </select>
						</div>
					</form>
				      </div><!-- end .modal-body -->
				      
				      <div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="submit" class="btn btn-primary">Submit Event</button>
				      </div>
				    </div>
				  </div>
				</div> <!-- end create event modal -->
				
				<div class="btn-group">
					<button class="btn btn-primary" data-calendar-nav="prev"><< Prev</button>
					<button class="btn btn-primary active" data-calendar-nav="today">Today</button>
					<button class="btn btn-primary" data-calendar-nav="next">Next >></button>
				</div>
				<div class="btn-group">
					<button class="btn btn-warning active" data-calendar-view="month">Month</button>
					<button class="btn btn-warning" data-calendar-view="week">Week</button>
				</div>
			</div>
			<h3></h3>
		</div>
	
		<div class="row">
			<div class="col-md-12">
				<div id="calendar"></div>
			</div>
		</div>
	
		<div class="clearfix"></div>
	
		<div class="modal fade" id="events-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
						<h4 class="modal-title">Event</h4>
					</div>
					<div class="modal-body" style="height: 400px">
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				</div>
			</div>
		</div>
	
		<script type="text/javascript" src="components/jquery/jquery.min.js"></script>
		<script type="text/javascript" src="components/underscore/underscore-min.js"></script>
		<script type="text/javascript" src="components/bootstrap3/js/bootstrap.min.js"></script>
		<script type="text/javascript" src="components/jstimezonedetect/jstz.min.js"></script>
		<script type="text/javascript" src="js/language/nl-NL.js"></script>
		<script type="text/javascript" src="js/language/fr-FR.js"></script>
		<script type="text/javascript" src="js/language/de-DE.js"></script>
		<script type="text/javascript" src="js/language/el-GR.js"></script>
		<script type="text/javascript" src="js/language/it-IT.js"></script>
		<script type="text/javascript" src="js/language/pl-PL.js"></script>
		<script type="text/javascript" src="js/language/pt-BR.js"></script>
		<script type="text/javascript" src="js/language/es-MX.js"></script>
		<script type="text/javascript" src="js/language/es-ES.js"></script>
		<script type="text/javascript" src="js/language/ru-RU.js"></script>
		<script type="text/javascript" src="js/language/sv-SE.js"></script>
		<script type="text/javascript" src="js/language/cs-CZ.js"></script>
		<script type="text/javascript" src="js/calendar.js"></script>
		<script type="text/javascript" src="js/app.js"></script>
	
		<script type="text/javascript">
			var disqus_shortname = 'bootstrapcalendar'; // required: replace example with your forum shortname
			(function() {
				var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
				dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
				(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
			})();
		</script>
		
	    </div> <!-- end content -->
		
	</div> <!-- end .container -->

</body>
</html>
