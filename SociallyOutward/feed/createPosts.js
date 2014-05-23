var createPosts = function(posts){
	
	var feed = $('#feed');

	for(var p in posts)
	{
		var newPost = $('<div id=\'postID'+p+'\'></div>');
	    newPost.data['pId'] = p;
	    newPost.append('<p class="title">'+posts[p]['title']+'</p>');
	    newPost.append('<p class="content">'+posts[p]['content']+'</p>');
	    feed.prepend(newPost);
	}

}