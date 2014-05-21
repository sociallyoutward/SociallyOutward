$(document).ready(function(){

	$('#add').click(showMenu);

});

var showMenu = function(){

	if($('#addInterestMenu').css("visibility")=="hidden")
	{
		$('#addInterestMenu').css("visibility","visible");
	}
	else{
		$('#addInterestMenu').css("visibility","hidden");
	}
}