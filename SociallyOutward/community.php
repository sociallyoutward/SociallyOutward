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
</head>
<body>
<img id='mpl' src='/assets/memberProfileLogo.png'>
<div id='top-Navigation' class='tNav'>
    <ul>
        <li class='mid'><a href='#'>Events</a></li>
        <li class ='mid'><a href='#'>Neighbors</a></li>
        <li><a href='community.php'>Community</a></li>
    </ul>
</div>
<div id='side-Navigation' class='sNav'>
    <div id='sNav-inner'>
        <p id='name' class='pushover'><?php echo $fbfullname; ?></p>
        <img id='profpic' class='spaceUnder pushover' src="https://graph.facebook.com/<?php echo $user; ?>/picture?height=350&width=350">
        <ul class='po'>
            <li class='spaceUnder'><a href='#'>Home</a></li>
            <li class='spaceUnder'><a href='#'>Messages</a></li>
            <li class='spaceUnder'><a href='#'>Settings</a></li>
            <li class='spaceUnder'><a href='chooseInterests.php'>Choose Interests</a></li>
            <li class='spaceUnder'><a href="<?php echo $logoutUrl; ?>">Logout</a></li>
        </ul>
    </div>
    <img class='arrow' src='/assets/left_arrow.png'>
</div>
<div id='content'>
    <div id="googleMap" style="width:500px;height:380px;"></div>
    <div id="interestList">
        <div id="div1"></div>
        <div id="div2"></div>
        <div id="div3"></div>
        <div id="div4"></div>
    </div>
</div>


</div>
<div id='user' hidden='true'><?php  print_r($_COOKIE['user']); ?></div>


</body>
</html>