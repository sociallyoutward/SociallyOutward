$(function(){

getPosts(0,$("#type1"));

$('#tab1 a').click(function(e){
	e.preventDefault();
  	$(this).tab('show');
  	$("#type1").html("");
	getPosts(0,$("#type1"));
});

$('#tab2 a').click(function(e){
	e.preventDefault();
  	$(this).tab('show');
  	$("#type2").html("");
	getPosts(1,$("#type2"));
});

$('#tab3 a').click(function(e){
	e.preventDefault();
  	$(this).tab('show');
  	$("#type3").html("");
	getPosts(2,$("#type3"));
});

});