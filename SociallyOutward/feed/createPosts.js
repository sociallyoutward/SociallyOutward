$(function(){
	$('#post-button').click(function(){
		//take values from the posting form upon clicking the post button
		var title = $('#post-title').val();
		var content = $('#post-content').val();

		var posts = new Array();
		posts[0] = new Array();
		posts[0]['title']=title;
		posts[0]['content']=content;
		//set input borders to appropriate colors based on presence of input (black:ok, red:no input provided)
		if(title=="")
		{
			$('#post-title').css( "border","solid thin red");
			if(content==""){
				$('#post-content').css( "border","solid thin red");
			}
			else{
				$('#post-content').css( "border","solid thin black");
			}
		}
		else if(content=="")
		{
			$('#post-title').css( "border","solid thin black");	
			$('#post-content').css( "border","solid thin red");
		}
		else{
		//call the createPosts function with the proper post type information
		createPosts(posts,$('#myModal').data("tab"),$('#myModal').data("type"));

		//add post to database
		$.ajax('addPost.php',
    	{
    		type: 'POST',
    		data:{title:title,content:content,type:$('#myModal').data("type")},
			cache: false,
			success: function (data) {},
			error: function (e) {console.log(e);}
     	});
		//hide modal upon post
		$('#myModal').modal('hide');
		}
	});
	
	$('.modal-toggle').click(function(){
			//set type of post when a tab is clicked to be fed into createPosts method upon posting
			$('#myModal').data("type",$(this).data("type"));
			$('#myModal').data("tab",$(this).data("tab"));
			//reset input colors to black for fresh post
			$('#post-title').css( "border","solid thin black");	
			$('#post-content').css( "border","solid thin black");	
	});
});
//function to generate html for posts
var createPosts = function(posts,tab,type){
	
	var feed = tab;

	for(var p in posts)
	{
		//create div with db id of post
		var newPost = $('<div id=\'postID'+posts[p]['id']+'\' class=\'item\'></div>');
	    newPost.data('pId',posts[p]['id']);
	    //append title and content to posting div
	    newPost.append('<p class="title">'+posts[p]['title']+'</p>');
	    newPost.append('<p class="content">'+posts[p]['content']+'</p>');
	    //prepend the created div to the masonry setup
	    containers[type].append(newPost).masonry('prepended',newPost);
	}

}