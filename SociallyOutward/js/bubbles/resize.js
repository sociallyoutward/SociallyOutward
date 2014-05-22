
var resizeCanvas = function()
{
	
	var height = window.innerHeight;
	var width = window.innerWidth;


	if(height>=348/.8)
	{
		if(height>=width)
		{
			canvas.width  = window.innerWidth * .80;
			canvas.height = window.innerWidth * .80;
		}

		else
		{
			canvas.width  = window.innerHeight * .80;
			canvas.height = window.innerHeight * .80;
		}
	}
	bubbleCalc(currBubbles,radius,currText);
	toggleGuide(iGuide,cGuide,oGuide);

}