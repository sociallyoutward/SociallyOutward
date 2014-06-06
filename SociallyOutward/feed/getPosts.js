//function to grab all posts of type postType from the database to be passed on to function createPosts
var getPosts = function(postType,tab)
{
	$.ajax('getPosts.php',
    	{
    		type: 'GET',
    		tab:tab,
    		postType:postType,
    		data:{postType:postType},
			cache: false,
			success: function (data) {createPosts(JSON.parse(data),this.tab,this.postType);},
			error: function (e) {console.log(e);}
     	});
}