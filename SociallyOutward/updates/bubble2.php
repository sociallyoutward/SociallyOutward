<?php
if(!isset($_COOKIE['user']))
{
header( 'Location: http://www.sociallyoutward.com' ) ;
}
?>

<html lang="en">
<head>
<meta charset="utf-8"/>
<title>BubbleTest with database integration (Main Web)</title>
<script src=" http://code.createjs.com/createjs-2013.02.12.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="/js/bubbles/dbinitialize2.js"></script>
<script src="/js/bubbles/resize.js"></script>
<script src="/js/bubbles/dbbubble.js"></script>
</head>
<body>
<a href= "../memberProfile.php">Member Profile</a>
<span id = 'user' hidden='true'><?php print($_COOKIE['user']); ?></span>	
<canvas id='myCanvas' width='500' height='500' style='border : 1px solid;'></canvas>
<canvas width='100px' height='500px' id="navCanvas" style='border : 1px solid;'></canvas>
</body>
</html>


