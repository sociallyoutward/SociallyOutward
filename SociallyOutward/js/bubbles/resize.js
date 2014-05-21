
var resizeCanvas = function()
{
	
	var height = window.innerHeight;
	var width = window.innerWidth;


	if(height>=348/.9)
	{
		if(height>=width)
		{
			canvas.width  = window.innerWidth * .90;
			canvas.height = window.innerWidth * .90;
		}

		else
		{
			canvas.width  = window.innerHeight * .90;
			canvas.height = window.innerHeight * .90;
		}
	}
	bubbleCalc(currBubbles,radius,currText);
	toggleGuide(iGuide,cGuide,oGuide);

}