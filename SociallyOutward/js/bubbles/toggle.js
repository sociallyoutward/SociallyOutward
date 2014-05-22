var changeSpeed = function(newSpeed)
{
	speed = newSpeed;	
}

var toggleGuide = function(i,c,o)
{
	guideContainer.removeAllChildren();
	
	guideCircles = new createjs.Shape();

	if(c)
		guideCircles.graphics.beginStroke("#000000").drawCircle(0, 0, Math.abs(r));
	
	if(o)
		guideCircles.graphics.beginStroke("#000000").drawCircle(0, 0, Math.abs(r)+radius);
	
	if(i)
		guideCircles.graphics.beginStroke("#000000").drawCircle(0, 0, Math.abs(r)-radius);

	guideContainer.addChild(guideCircles);

}

var changeRadius = function(newRadius)
{
	radius = canvas.height*newRadius;
	bubbleCalc(currBubbles,radius);
}