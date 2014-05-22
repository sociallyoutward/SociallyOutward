<?php
require 'fbconfigScope.php';// Include fbconfig.php file
//echo '<script>console.log(' . $user . ');</script>';
?>
<html>
<head>
    <title>My Profile</title>
    <link href="../css/memberProfile.css" type="text/css" rel="stylesheet">
    <link href="../css/navigationTemplate.css" type="text/css" rel="stylesheet">
    <script src=" http://code.createjs.com/createjs-2013.02.12.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript" src='../js/showmenu.js'></script>
</head>
<body>
<div id='top-Navigation' class='tNav'>
    <ul>
        <li><a href='#'>Events</a></li>
        <li><a href='#'>Neighbors</a></li>
        <li><a href='community.php'>Community</a></li>
    </ul>
</div>
<div id='side-Navigation' class='sNav'>
	<p><?php echo $fbfullname; ?></p>
	<img id='profpic' src="https://graph.facebook.com/<?php echo $user; ?>/picture?height=200&width=200">
	<ul>
        <li><a href='#'>Home</a></li>
        <li><a href='#'>Messages</a></li>
        <li><a href='#'>Settings</a></li>
    </ul>
</div>
<div id='content'>
    <canvas width='500px' height='500px'></canvas>
    <img id='add' src='../assets/add.png' alt='add'>
    <ul id='addInterestMenu'>
        <li><a href='#'>Add Interest</a></li>
        <li><a href='#'>Create Event</a></li>
    </ul>
</div>
<div><a href="<?php echo $logoutUrl; ?>">Logout</a></div>


</body>
</html>