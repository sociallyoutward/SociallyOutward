var containers; 
//on page load initialize the three tab divs as masonry containers
$(function(){
	$('#type1').masonry({
        itemSelector: '.item',
        columnWidth: 300
    });

	$('#type2').masonry({
        itemSelector: '.item',
        columnWidth: 300
    });

    $('#type3').masonry({
        itemSelector: '.item',
        columnWidth: 300
    });

	containers =[$('#type1'),$('#type2'),$('#type3')];
});