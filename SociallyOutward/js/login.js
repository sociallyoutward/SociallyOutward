$(document).ready(function () {

    $('#login_form').on('submit', function (e) {
	e.stopPropagation();
	e.preventDefault();
	var stayLoggedIn = $(this).find('#stayLoggedIn').is(':checked');
    var username = $('#login_form').find('#username').val();
    var pass = $('#login_form').find('#password').val();
    $.ajax('php/members.php',
    	{
    		type: 'GET',
			data: {username: username,password: pass},
			cache: false,
			success: function (data) {loginCookie(data, stayLoggedIn);},
			error: function () {alert('Invalid Username or Password Provided');}
     	}); 
    });
});

var loginCookie = function(data, stayLoggedIn){

    $.ajax('php/setCookie.php',
	{type: 'GET',
	 data: {userid: data.id, stayLoggedIn: stayLoggedIn},
	 cache: false,
	 success: function() {
	    window.location = 'http://www.sociallyoutward.com/updates';
	},
	 error: function() {
	    alert("cookie set failure");
	 }
	 });
}

var firstTime = true;
var clearField = function(ftc)
{
	if(firstTime)
	{
	$(ftc).val("");
	firstTime = false;
	}
}