$(document).ready(function(){

if($(window).width()<630)
{
		$('#inner').css("width", "630px");
}
	
	var nameHeight = $("#name").height();
	var logoHeight = $("#logo").height();
	var lfHeight = $("#login_form").height();
	var lfMargin = $('#login_form').outerHeight();
	var comboHeight = nameHeight + logoHeight + lfHeight + lfMargin;

	if($(window).height()<comboHeight+20)
	{
		$('#inner').css("height", comboHeight+"px");
	}

$(window).resize(checkForm);
//$(window).resize(moveBar);
});

var moveBar = function()
{
	var posVal = $(window).height();

	$('#bottomBar').css("top",posVal);
}

var checkForm = function()
{
	if($(window).width()<630)
	{
		$('#inner').css("width", "630px");
	}
	else
	{
		$('#inner').css("width", "100%");
	}
	var nameHeight = $("#name").height();
	var logoHeight = $("#logo").height();
	var lfHeight = $("#login_form").height();
	var lfMargin = $('#login_form').outerHeight();
	var comboHeight = nameHeight + logoHeight + lfHeight + lfMargin;

	if(window.innerHeight<comboHeight+20)
	{
		$('#inner').css("height", comboHeight+"px");
		//console.log("* window height: "+$(window).height()+", comboHeight: "+comboHeight);
	}
	else
	{
		$('#inner').css("height", "100%");
		//console.log("+ window height: "+$(window).height()+", comboHeight: "+comboHeight);
	}
}