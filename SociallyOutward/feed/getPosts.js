<<<<<<< HEAD
var getPosts = function(postType)
=======
var getPosts = function(postType,tab)
>>>>>>> addBootstrap
{
	$.ajax('getPosts.php',
    	{
    		type: 'GET',
<<<<<<< HEAD
    		data:{postType:postType},
			cache: false,
			success: function (data) {createPosts(JSON.parse(data));},
=======
    		tab:tab,
    		data:{postType:postType},
			cache: false,
			success: function (data) {createPosts(JSON.parse(data),this.tab);},
>>>>>>> addBootstrap
			error: function () {alert('Error');}
     	});
}