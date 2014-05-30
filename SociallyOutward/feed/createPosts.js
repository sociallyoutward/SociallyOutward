$(function(){
	$('#post-button').click(function(){
		var title = $('#post-title').val();
		var content = $('#post-content').val();

		var posts = new Array();
		posts[0] = new Array();
		posts[0]['title']=title;
		posts[0]['content']=content;
		createPosts(posts,$('#type1'),0);

		$.ajax('addPost.php',
    	{
    		type: 'POST',
    		data:{title:title,content:content,type:0},
			cache: false,
			success: function (data) {alert("POST SUCCESS")},
			error: function (e) {console.log(e);}
     	});

		$('#myModal').modal('hide');


	});
});

var createPosts = function(posts,tab,type){
	
	var feed = tab;

	for(var p in posts)
	{
		var newPost = $('<div id=\'postID'+p+'\' class=\'item\'></div>');
	    newPost.data['pId'] = p;
	    newPost.append('<p class="title">'+posts[p]['title']+'</p>');
	    newPost.append('<p class="content">'+posts[p]['content']+'</p>');
	    //feed.prepend(newPost);
	    containers[type].append(newPost).masonry('prepended',newPost);
	}

}