function log(item){
	console.log(item);
}

$(document).ready(function(){

    var groupElement = '<div class="multiply-group"><div class="item-handle"></div><div class="group-handle"></div></div>'

    $('.multiply-container').multiplier({
        allowGroups: true

    });

    //handling images
    $images = $('.images input');
    $deleteButton = $('.delete-btn');
    imagesToDelete = [];

    $deleteButton.on('click', function(){
    	var img = $(this).parent().find('img').attr('id');
	    $('.images').append('<input type="hidden" name="imagesToDelete[]" value="' + img + '" />');
	    $(this).parent().remove();
    });



});