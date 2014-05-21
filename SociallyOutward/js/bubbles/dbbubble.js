var r;
var centerX;
var centerY;
var index;
var bubbleColors = new Array("#808080","#e9afaf","#aade87","#afdde9","#e5d5ff","#c8b7be","#ffccaa","#afe9c6","#afc6e9","#eeaaff","#917c6f","#ffeeaa","#d7f4d7","#afafe9","#e9afc6","#ffb571","#eeffaa","#d5fff6","#d5d5ff","#ffd5f6","#ffff7b");
var textColors = new Array("#333333","#d35f8d","#00aa00","#216778","#bc5fd3","#6c535d","#d38d5f","#536c5d","#2c5aa0","#ab37c8","#2b1100","#d3bc5f","#7c916f","#5d536c","#d35fbc","#c87137","#89a02c","#6f918a","#6f6f91","#d35fbc","#c8ab37");
var initial;
var add;

var bubbleCalc = function(centralNode,init,nav)
{
	
	if(!nav)
	currLevel++;
	if(!init)
	setNav(centralNode,false);
	$.ajax('/php/iNodes.php',
	{
		type: 'GET',
		data: {parent:centralNode},
		cache: false,
		success: function (data) {console.log(data); currCNode = centralNode; bubbleGeom(data,false,false);bubbleContainer.mouseEnabled = true;},
		error: function () {alert('Central node provided does not exist.');}
 	});
 	
}

var bubbleCalcMe = function(member,centralNode,init,nav)
{
	console.log("Member:" +member+" CentralNode: " + centralNode + " Init: "+ init+" Nav: "+nav);

	if(!nav)
	currLevel++;
	if(!init)
	setNav(centralNode,false);
	$.ajax('/php/m_is.php',
	{
		type: 'GET',
		data: {parent:centralNode, member:member,initial:init},
		cache: false,
		init:init,
		success: function (data) {currCNode = centralNode; var initial=this.init; bubbleGeom(data,true,initial);bubbleContainer.mouseEnabled = true;},
		error: function () {bubbleGeom(null,true,true)}
 	});
 	
}
var bubbleGeom = function(nodeArr,me,init)
{
	initial = init;	
	console.log(nodeArr);
	if(!init)
	var num = nodeArr.length-1;
	else if(nodeArr)
	var num = nodeArr.length;

	bubbleContainer.removeAllChildren();
	bubbleContainer.rotation = 0;

	centerX = canvas.width*.5;
	centerY = canvas.height*.5;
	bubbleContainer.x=centerX;
	bubbleContainer.y=centerY;
	guideContainer.x = centerX;
	guideContainer.y = centerY;

	r = radius-centerX+30;
	var ang = (360/num)*(Math.PI/180);
	
	if(!me)
	{
	index = 0;
	if(num==0)
		add=true;
	createBubble(0,0,nodeArr[index],initial,me);
	
	}
	else if(!initial)
	{
	index = 0;
	createBubble(0,0,nodeArr[index],initial,me);
	}
	else
	{
	index = -1;
	createBubble(0,0,"Me",initial,me);
	}

	var r2 = Math.pow(r,2);
	var a2 = 2*r2*(1-Math.cos(ang));
	var a = Math.sqrt(a2);

	var oang = (90-((180-(360/num))/2))*(Math.PI/180);


	var hor = a*Math.cos(oang);
	var ver = a*Math.sin(oang);

	var mid = Math.ceil(num/2);

	var xpos = 0;
	var ypos = r;

	if(num==1)
	{
		createBubble(xpos,ypos,nodeArr[index],initial,me);
	}

	else if(num==2)
	{	
		console.log(index);
		createBubble(xpos,ypos,nodeArr[index],initial,me);
		ypos+= Math.abs(2*r);

		createBubble(xpos,ypos,nodeArr[index],initial,me);
	}

	else if(num==3||num==5||num==7)
	{
		createBubble(xpos,ypos,nodeArr[index],initial,me);

		xpos+=hor;
		ypos+=ver;

		createBubble(xpos,ypos,nodeArr[index],initial,me);
		createBubble(-xpos,ypos,nodeArr[index],initial,me);

		if(num==7)
		{
		
			var z = (180-(360/7))/2;
			var b = 90-z;
			var c = 180-(2*b);
			var d = (180-c)*(Math.PI/180);

			var e = ver/Math.sin(d);
			var f = ver/Math.tan(d);
			var j = (2*hor*ver)/e;
			var k = (2*hor*f)/e;

			xpos = k;
			ypos = j+r;

			createBubble(xpos,ypos,nodeArr[index],initial,me);
			createBubble(-xpos,ypos,nodeArr[index],initial,me);
		}

		if(num==5||num==7)
		{
			xpos=(a/2);
			ypos=a/(2*Math.tan(Math.PI/num));

			createBubble(xpos,ypos,nodeArr[index],initial,me);
			createBubble(-xpos,ypos,nodeArr[index],initial,me);
		}
	}

	else if(num==4||num==8)
	{
		var i = 1;

		if(num==8)
		{
			var i = 2;
		}

		createBubble(xpos,ypos,nodeArr[index],initial,me);

		for(var x=0;x<i;x++)
		{
		if(x==0)
		{	
			xpos+=hor;
			ypos+=ver;
		}
		else
		{
			xpos+=ver;
			ypos+=hor;	
		}	

		createBubble(xpos,ypos,nodeArr[index],initial,me);
		}

		for(var x=0;x<i;x++)
		{
		if(x==0)
		{	
			xpos-=ver;
			ypos+=hor;
		}
		else
		{
			xpos-=hor;
			ypos+=ver;
		}
		createBubble(xpos,ypos,nodeArr[index],initial,me);
		}

		for(var x=0;x<i;x++)
		{
		if(x==0)
		{
			xpos-=hor;
			ypos-=ver;
		}
		else
		{
			xpos-=ver;
			ypos-=hor;
		}
		createBubble(xpos,ypos,nodeArr[index],initial,me);
		}

		if(num==8)
		{
			xpos+=ver;
			ypos-=hor;
			createBubble(xpos,ypos,nodeArr[index],initial,me);
		}

	}
	else if(num==6)
	{
		createBubble(xpos,ypos,nodeArr[index],initial,me);
		createBubble(xpos,-ypos,nodeArr[index],initial,me);

		xpos+=hor;
		ypos+=ver;

		createBubble(xpos,ypos,nodeArr[index],initial,me);
		createBubble(-xpos,ypos,nodeArr[index],initial,me);
		createBubble(xpos,-ypos,nodeArr[index],initial,me);
		createBubble(-xpos,-ypos,nodeArr[index],initial,me);
	}
}

var createBubble = function(x,y,t,init,me)
{
	console.log(index);
	console.log(t);
	var ibc = new createjs.Container();
	ibc.x = x;
	ibc.y = y;
	ibc.regX = x;
	ibc.regY = y;

	var choice = Math.floor((Math.random()*bubbleColors.length));
	
	var circle = new createjs.Shape();
	var color = bubbleColors[choice];
	console.log(color);
	circle.graphics.beginFill(color).drawCircle(x, y, radius);

	circle.shadow = new createjs.Shadow("#80B3FF", 0, 0, 30);

	if(x==0&&y==0)
	{}
	else if(!me)
	circle.addEventListener("click",function(event){bubbleContainer.mouseEnabled = false;bubbleCalc(t[0],false,false);});
	else if(!init)
	circle.addEventListener("click",function(event){bubbleContainer.mouseEnabled = false;bubbleCalcMe(t[0],t[1],false,false);});
	if(add)
	{
		addToMe(t[0]);
	}

	ibc.addChild(circle);
	
	if(!me)
	adjustFontSize(ibc,x,y,t[1],choice);
	else if(!init)
	{
		$.ajax('/php/iNodes.php',
		{
			type: 'GET',
			data: {id:t[1]},
			cache: false,
			success: function (data) {adjustFontSize(ibc,x,y,data.name,choice);},
			error: function () {alert('Central node provided does not exist.');}
 		});
	}
	else
	{
	adjustFontSize(ibc,x,y,t,choice);
	initial = false;
	}
	bubbleContainer.addChild(ibc);
	index++;
}

var adjustFontSize = function(ibContainer,x,y,tex,colorChoice)
{
	

	var t = new createjs.Text(tex, "25px segoe", textColors[colorChoice]);
 	t.x = x;
 	t.y = y;
 	t.textAlign = "center";
 	t.textBaseline = "alphabetic";
 	t.maxWidth = (2*radius)-10;

 	var fontSize = t.font.substring(0,2);
 	fontSize = parseInt(fontSize);
 	var linewidth = 2*radius;

 	ibContainer.addChild(t);

}

var addToMe = function(iid)
{
	picture=new Image();
    picture.src="/assets/add.png";
    bm=new createjs.Bitmap(picture);
    bm.x=canvas.width-62;
    bm.y=canvas.height-53;
    bm.addEventListener("click",function(){finishAdding(iid)});
    scene.addChild(bm);
}

var finishAdding = function(iid)
{
	console.log(iid);
	var iid=iid;
	var member = $('#user').html();
	member = parseInt(member);
	$.ajax('/php/m_is.php',
		{
			type: 'POST',
			data: {mid:member,iid:iid},
			cache: false,
			success: function (data) {alert('ADDED')},
			error: function () {alert('Problem');}
 		});
}
 