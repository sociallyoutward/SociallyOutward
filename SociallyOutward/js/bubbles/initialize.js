var canvas;
var scene;
var bubbleContainer;
var moon1;
var speed = .5;
var currBubbles = 6;
var iGuide = false;
var cGuide = false;
var oGuide = false;
var radius;
var currText = "Socially Outward";

function init(){
	canvas = document.getElementById("myCanvas");
	scene=new createjs.Stage(canvas);
	radius = canvas.height*.15;
	bubbleContainer = new createjs.Container();
	scene.addChild(bubbleContainer);
	guideContainer = new createjs.Container();
	scene.addChild(guideContainer);
	createjs.Ticker.useRAF=true;
	createjs.Ticker.setFPS(40);
	createjs.Ticker.addListener(window);
	createjs.Ticker.addEventListener("tick", ticktate);
	bubbleCalc(currBubbles,radius,currText);
	$(window).resize(resizeCanvas);
}

var ticktate = function()
{
	
	for(var x=1;x<bubbleContainer.getNumChildren();x++)
	{	
	bubbleContainer.getChildAt(x).rotation-= speed;
	}
	bubbleContainer.rotation+= speed;
	scene.update();
}

window.onload=init;

