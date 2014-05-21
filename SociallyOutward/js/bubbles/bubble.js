var r;
var centerX;
var centerY;

var bubbleCalc = function(num,radius,text)
{
	currText = text;
	currBubbles = num;
	bubbleContainer.removeAllChildren()
	bubbleContainer.rotation = 0;

	centerX = canvas.width*.5;
	centerY = canvas.height*.5;
	bubbleContainer.x=centerX;
	bubbleContainer.y=centerY;
	guideContainer.x = centerX;
	guideContainer.y = centerY;

	console.log(radius);
	r = radius-centerX;
	var ang = (360/num)*(Math.PI/180);
	
	var centerCircle = new createjs.Shape(); 
	centerCircle.graphics.beginFill("#000000").drawCircle(0, 0, canvas.height*.1);
	bubbleContainer.addChild(centerCircle);

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
		createBubble(xpos,ypos,text);
	}

	else if(num==2)
	{	
		createBubble(xpos,ypos,text);

		ypos+= Math.abs(2*r);

		createBubble(xpos,ypos,text);
	}

	else if(num==3||num==5||num==7)
	{
		createBubble(xpos,ypos,text);

		xpos+=hor;
		ypos+=ver;

		createBubble(xpos,ypos,text);
		createBubble(-xpos,ypos,text);

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

			createBubble(xpos,ypos,text);
			createBubble(-xpos,ypos,text);
		}

		if(num==5||num==7)
		{
			xpos=(a/2);
			ypos=a/(2*Math.tan(Math.PI/num));

			createBubble(xpos,ypos,text);
			createBubble(-xpos,ypos,text);
		}
	}

	else if(num==4||num==8)
	{
		var i = 1;

		if(num==8)
		{
			var i = 2;
		}

		createBubble(xpos,ypos,text);

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

		createBubble(xpos,ypos,text);
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
		createBubble(xpos,ypos,text);
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
		createBubble(xpos,ypos,text);
		}

		if(num==8)
		{
			xpos+=ver;
			ypos-=hor;
			createBubble(xpos,ypos,text);
		}

	}
	else if(num==6)
	{
		createBubble(xpos,ypos,text);
		createBubble(xpos,-ypos,text);

		xpos+=hor;
		ypos+=ver;

		createBubble(xpos,ypos,text);
		createBubble(-xpos,ypos,text);
		createBubble(xpos,-ypos,text);
		createBubble(-xpos,-ypos,text);
	}
}

var createBubble = function(x,y,text)
{
	var ibc = new createjs.Container();
	ibc.x = x;
	ibc.y = y;
	ibc.regX = x;
	ibc.regY = y;
	
	var circle = new createjs.Shape();
	circle.graphics.beginFill("#000000").drawCircle(x, y, radius);

	ibc.addChild(circle);
	
	adjustFontSize(ibc,x,y,text);
	bubbleContainer.addChild(ibc);
}

var adjustFontSize = function(ibContainer,x,y,text)
{
	var t = new createjs.Text(text, "25px segoe", "#FFFFFF");
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