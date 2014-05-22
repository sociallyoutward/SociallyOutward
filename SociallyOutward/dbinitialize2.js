var canvas;
var scene;
var nav;
var navScene;
var navLayer;
var bubbleContainer;
var moon1;
var speed = .5;
var currBubbles = 6;
var iGuide = false;
var cGuide = false;
var oGuide = false;
var radius;
var currText = "Socially Outward";
var currCNode = 1;
var navCircles;

function init(){
	canvas = document.getElementById("myCanvas");
	nav = document.getElementById("navCanvas");
	scene = new createjs.Stage(canvas);
	navScene = new createjs.Stage(nav);
	navLayer = new createjs.Container();
	navScene.addChild(navLayer);
	initNav();
	radius = canvas.height*.15;
	bubbleContainer = new createjs.Container();
	scene.addChild(bubbleContainer);
	guideContainer = new createjs.Container();
	scene.addChild(guideContainer);
	createjs.Ticker.useRAF=true;
	createjs.Ticker.setFPS(40);
	createjs.Ticker.addListener(window);
	createjs.Ticker.addEventListener("tick", ticktate);
	
	var member = $('#user').html();
	member = parseInt(member);

	bubbleCalcMe(member,-1,true);
	//resizeCanvas();
	//$(window).resize(resizeCanvas);
}

var initNav = function()
{
	var nav1 = new createjs.Shape();
	nav1.graphics.setStrokeStyle(3);
	console.log("*****");
	nav1.graphics.beginFill("black").drawCircle(50, 50, 50);
	setNav(0,-1);
	var nav2 = new createjs.Shape();
	nav2.graphics.setStrokeStyle(3);
	nav2.graphics.beginStroke("black").drawCircle(50, 183.3, 50);
	var nav3 = new createjs.Shape();
	nav3.graphics.setStrokeStyle(3);
	nav3.graphics.beginStroke("black").drawCircle(50, 316.6, 50);
	var nav4 = new createjs.Shape();
	nav4.graphics.setStrokeStyle(3);
	nav4.graphics.beginStroke("black").drawCircle(50, 449.9, 50);
	var lines = new createjs.Shape();
	lines.graphics.setStrokeStyle(3);
	lines.graphics.moveTo(50,100);
	lines.graphics.beginStroke("black");
	lines.graphics.lineTo(50,133.3);
	lines.graphics.moveTo(50,233.3);
	lines.graphics.lineTo(50,266.6);
	lines.graphics.moveTo(50,366.6);
	lines.graphics.lineTo(50,399.9);
	navLayer.addChild(lines);
	navLayer.addChild(nav1);
	navLayer.addChild(nav2);
	navLayer.addChild(nav3);
	navLayer.addChild(nav4);
	navScene.update();
	navCircles= [nav1,nav2,nav3,nav4];


}

var setNav(whichCircle,interestID)
{
	navCircles[whichCircle].addEventListener("click",function(){alert("hello world");});
}

var ticktate = function()
{
	
	for(var x=0;x<bubbleContainer.getNumChildren();x++)
	{	
	bubbleContainer.getChildAt(x).rotation-= speed;
	}
	bubbleContainer.rotation+= speed;
	scene.update();
}

window.onload=init;

