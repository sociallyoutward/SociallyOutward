
$(function(){
	//call deletePosts function upon clicking the clear posts button
	$('#clear-posts').click(function(){deletePosts();});
	
});

//function to delete all posts in the database
var deletePosts = function(){

	$.ajax('deletePosts.php',
    	{
    		type: 'GET',
			cache: false,
			success: function (data) {clearDivs();},
			error: function (e) {console.log(e);}
     	});

}
//function to clear the divs after all posts hae been deleted
var clearDivs = function(){
	$('#type1').html("");
	$('#type2').html("");
	$('#type3').html("");
}