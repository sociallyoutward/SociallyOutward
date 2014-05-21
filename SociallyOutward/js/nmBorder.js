var preScreenWidth;
$(document).ready(function(){

preScreenWidth = $(window).width();

if($(window).width()<630)
{
		$('#inner').css("width", "630px");
}
	
var logoHeight = $(".tplogo").height();
var formHeight = $("#creation_form").height();

var comboHeight = logoHeight+formHeight;

if($(window).height()<comboHeight+20)
{
	$('#inner').css("height", comboHeight+"px");
	$('#gradient').css("height", comboHeight+20+"px");
}

$(window).resize(checkForm);
});

var checkForm = function()
{
	
	curScreenWidth = $(window).width();
	
	if($(".linputLarge").width()<=250)
	{
		 $('#inner').css("width", $('#inner').css("width"));
	}
	else if($(".linputLarge").width()>250)
	{
		$('#inner').css("width", "100%");
	}
	var logoHeight = $(".tplogo").height();
	var formHeight = $("#creation_form").height();

	var comboHeight = logoHeight+formHeight;
	if(window.innerHeight<comboHeight+20)
	{
		$('#inner').css("height", comboHeight+"px");
		
		var pxLoc = $('#inner').css("height").indexOf("px");
		var pxVal = parseInt($('#inner').css("height").substr(0,pxLoc))+20;
		console.log(pxVal);
		$('#gradient').css("height", pxVal+"px");
	}
	else
	{
		$('#inner').css("height", "100%");
		$('#gradient').css("height", "100%");
		//console.log("+ window height: "+$(window).height()+", comboHeight: "+comboHeight);
	}
}