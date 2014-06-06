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
var currLevel = 0;
var navCircles;
var member;
var tester = 0;
var whichPage = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
function init(){
	canvas = document.getElementById("myCanvas");
	nav = document.getElementById("navCanvas");
	scene = new createjs.Stage(canvas);
	navScene = new createjs.Stage(nav);
	navLayer = new createjs.Container();
	navScene.addChild(navLayer);
	member = $('#user').html();
	member = parseInt(member);
	initNav();
	radius = canvas.height*.13;
	bubbleContainer = new createjs.Container();
	scene.addChild(bubbleContainer);
	guideContainer = new createjs.Container();
	scene.addChild(guideContainer);
	createjs.Ticker.useRAF=true;
	createjs.Ticker.setFPS(40);
	createjs.Ticker.addListener(window);
	createjs.Ticker.addEventListener("tick", ticktate);
	
	if(whichPage=="chooseInterests.php")
	{
		bubbleCalc(1,true,true);

	}

	else if(whichPage=="memberprofile.php")
	{
		bubbleCalcMe(member,1,true,true);
	}
}

var initNav = function()
{
	var nav1 = new createjs.Shape();
	nav1.navIndex = 0;
	nav1.yCoord = 27;
	nav1.graphics.setStrokeStyle(3);
	nav1.graphics.beginStroke("black").drawCircle(50, 27, 25);
	
	var nav2 = new createjs.Shape();
	nav2.navIndex = 1;
	nav2.yCoord = 175;
	nav2.graphics.setStrokeStyle(3);
	nav2.graphics.beginStroke("black").drawCircle(50, 175, 25);
	nav1.graphics.beginFill("white").drawCircle(50, 175, 25);
	
	var nav3 = new createjs.Shape();
	nav3.navIndex = 2;
	nav3.yCoord = 325;
	nav3.graphics.setStrokeStyle(3);
	nav3.graphics.beginStroke("black").drawCircle(50, 325, 25);
	nav1.graphics.beginFill("white").drawCircle(50, 325, 25);
	
	var nav4 = new createjs.Shape();
	nav4.navIndex = 3;
	nav4.yCoord = 473;
	nav4.graphics.setStrokeStyle(3);
	nav4.graphics.beginStroke("black").drawCircle(50, 473, 25);
	nav1.graphics.beginFill("white").drawCircle(50, 473, 25);
	
	var lines = new createjs.Shape();
	lines.graphics.setStrokeStyle(3);
	lines.graphics.moveTo(50,0);
	lines.graphics.beginStroke("black");
	lines.graphics.lineTo(50,500);
	navLayer.addChild(lines);
	navLayer.addChild(nav1);
	navLayer.addChild(nav2);
	navLayer.addChild(nav3);
	navLayer.addChild(nav4);
	navScene.update();
	navCircles= [nav1,nav2,nav3,nav4];
	setNav(1,true);
	// if(whichPage=="bubble2.php")
	// {
	// 	setNav(1,true);

	// }

	// else if(whichPage=="memberProfile.php")
	// {
	// 	setNav(1,true);
	// }


}

var setNav = function(interestID)
{
	navCircles[currLevel].graphics.beginFill("black").drawCircle(50,navCircles[currLevel].yCoord,25);

	if(currLevel>0)
	{
	$.ajax('/php/iNodes.php',
		{
			type: 'GET',
			data: {child:interestID},
			cache: false,
			success: function (data) {setNavFinish(data)},
			error: function () {alert('Problem');}
 		});
	}
	navScene.update();
	//Upon click above, clear below circles and set current level appropriately according to the index of the circle pressed
}

var setNavFinish = function(parentID)
{	
	var c;

	if(currLevel==1)
	{
		c = true;
	}
	else
	{
		c = false;
	}
	if(whichPage=="chooseInterests.php")
	{
		navCircles[currLevel-1].removeAllEventListeners("click");
		navCircles[currLevel-1].addEventListener("click",function(event){navClickHandler(event); bubbleCalc(parentID,c,true);});
	}
	else if(whichPage=="memberprofile.php")
	{
		console.log("INITIAL:"+initial);
		navCircles[currLevel-1].removeAllEventListeners("click");
		navCircles[currLevel-1].addEventListener("click",function(event){navClickHandler(event); bubbleCalcMe(member,parentID,c,true);});
	}
	else
	{
		console.log(whichPage);
	}
	
}

var navClickHandler = function(event)
{
	if(event.target.navIndex<currLevel)
	{
		
		currLevel = event.target.navIndex;
		for(var i = currLevel;i<navCircles.length;i++)
		{
			if(navCircles[i].hasEventListener("click"))
			{
				navCircles[i].removeAllEventListeners("click");
			}
			if(i!=currLevel)
			navCircles[i].graphics.beginFill("white").drawCircle(50,navCircles[i].yCoord,25);
			navScene.update();
		}
	}
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

