function log(item){
	console.log(item);
}

$(document).ready(function(){

    //handling images
    var $images = $('.images input');
    var $deleteButton = $('.delete-btn');
    var imagesToDelete = [];

    $deleteButton.on('click', function(){
    	var img = $(this).parent().find('img').attr('id');
	    $('.images').append('<input type="hidden" name="imagesToDelete[]" value="' + img + '" />');
	    $(this).parent().remove();
    });

    //member experiences
    var $addExperienceBtn = $('.add-experience');
    var $delExperienceBtn = $('.remove-experience');
    var $experiencesContainer = $('.experiences');

    $addExperienceBtn.on('click', function(){
        var $experience = $('.experience');
        var $experienceCount = $experience.length;
        var $newExperience = $('<div class="row experience"><div class="col-xs-2"><input name="experiences[' + $experienceCount + '][start]" value=""></div><div class="col-xs-2"><input name="experiences[' + $experienceCount + '][end]" value=""></div><div class="col-xs-3"><input name="experiences[' + $experienceCount + '][role]" value=""></div><div class="col-xs-3"><input name="experiences[' + $experienceCount + '][company]" value=""></div><div class="col-xs-2 remove-experience">x</div></div>');

        $newExperience.appendTo($experiencesContainer);
    });

    $('.remove-experience').on('click', function(index, item){
        log($('.remove-experience').length);
        //$experienceToDel = $('.experience-id');
        //$experiencesContainer.append('<input type="hidden" name="experiencesToDelete[]" value="' + $experienceToDel.val() + '" />')
        //$(this).parent().remove();
    });


});