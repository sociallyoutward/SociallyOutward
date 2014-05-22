<?php
ob_start();
if(!isset($_COOKIE['user']))
{
header( 'Location: http://www.sociallyoutward.com' ) ;
}
?>

<html lang="en">
<head>
<meta charset="utf-8"/>
<title>BubbleTest</title>
<link href="/css/bubbletest.css" type="text/css" rel="stylesheet">
<script src=" http://code.createjs.com/createjs-2013.02.12.min.js"></script>
<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
<script src="/js/bubbles/initialize.js"></script>
<script src="/js/bubbles/resize.js"></script>
<script src="/js/bubbles/bubble.js"></script>
<script src="/js/bubbles/toggle.js"></script>
<script src="/js/bubbles/toggleform.js"></script>

</head>
<body>
<button onclick= 'bubbleCalc(1,radius,currText)'>1</button>
<button onclick= 'bubbleCalc(2,radius,currText)'>2</button>
<button onclick= 'bubbleCalc(3,radius,currText)'>3</button>
<button onclick= 'bubbleCalc(4,radius,currText)'>4</button>
<button onclick= 'bubbleCalc(5,radius,currText)'>5</button>
<button onclick= 'bubbleCalc(6,radius,currText)'>6</button>
<button onclick= 'bubbleCalc(7,radius,currText)'>7</button>
<button onclick= 'bubbleCalc(8,radius,currText)'>8</button>

<div id='s'>
<form>
<input class='itext' type='text' id='speed'></input>
<button type='submit'>Change Speed</button>
</form>
</div>

<div id='g'>
<form>
<p><input type='checkbox' id='innerGuide'>Inner Guide</input></p>
<p><input type='checkbox' id='centerGuide'>Center Guide</input></p>
<p><input type='checkbox' id='outerGuide'>Outer Guide</input></p>
<p><button type='submit'>Toggle Guides</button></p>
</form>
</div>

<div id='r'>
<form>
<input class='itext' type='text' id='radius'></input>
<button type='submit'>Change Circle Radius</button>
</form>
</div>

<p>Initial radius is .15</p>
<p>Increase and decrease by .01</p>

<div id='t'>
<form>
<p><input type='text' id='textInput'></input></p>
<p><button type='submit'>Change Text</button></p>
</form>
</div>


<canvas id='myCanvas' width='400' height='400' style='border : 1px solid;'></canvas>
</body>
</html>


