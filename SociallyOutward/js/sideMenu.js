var out=true;

$(document).ready(function(){
$(".arrow").click(function(){
  
  if(out)
  {
  	$("#side-Navigation").animate({left:'-180px'});
  	out=false;
  	$(".arrow").attr("src","/assets/right_arrow.png");
  }
  else
  {
  	$("#side-Navigation").animate({left:'0px'});
  	out=true;
  	$(".arrow").attr("src","/assets/left_arrow.png");
  }
  
}); 

});