<?php
if(!isset($_COOKIE['user']))
{
header( 'Location: http://www.sociallyoutward.com' ) ;
}
?>

<html lang="en">
<head>
<meta charset="utf-8"/>
<title>BubbleTest with database integration (User Web)</title>
<link href="/css/bubbletest.css" type="text/css" rel="stylesheet">
<script src=" http://code.createjs.com/createjs-2013.02.12.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="/js/bubbles/dbinitialize2.js"></script>
<script src="/js/bubbles/resize.js"></script>
<script src="/js/bubbles/dbbubble.js"></script>
<script src="/js/clearInterests.js"></script>
</head>
<body>
<span id = 'user' hidden='true'><?php $user = unserialize($_COOKIE['user']); print($user['id']); ?></span>	
<canvas id='myCanvas' width='400' height='400' style='border : 1px solid;'></canvas>

<button onclick='clearInterests()'>Clear</button>
</body>
</html>


