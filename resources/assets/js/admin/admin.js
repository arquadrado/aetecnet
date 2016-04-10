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

    $('.add-item').on('click', function(){
        $('.item-container').append($item);
    });

    $('.item-container').on('click', '.remove-btn', function() {
        $(this).parent().remove();
    });

    $addExperienceBtn.on('click', function(){
        var $experience = $('.experience');
        var $experienceCount = $experience.length;
        var $newExperience = $('<div class="row experience"><div class="col-xs-2"><input name="experiences[' + $experienceCount + '][start]" value=""></div><div class="col-xs-2"><input name="experiences[' + $experienceCount + '][end]" value=""></div><div class="col-xs-3"><input name="experiences[' + $experienceCount + '][role]" value=""></div><div class="col-xs-3"><input name="experiences[' + $experienceCount + '][company]" value=""></div><div class="col-xs-2 remove-experience">x</div></div>');
        $newExperience.appendTo($experiencesContainer);
    });

    $experiencesContainer.on('click', '.remove-experience', function(){
        $experienceToDel = $(this).parent().find('.experience-id');
        log($experienceToDel.val());
        log($experienceToDel.val() !== undefined);
        if($experienceToDel.val() !== undefined){
            $experiencesContainer.append('<input type="hidden" name="experiencesToDelete[]" value="' + $experienceToDel.val() + '" />')
        }
        $(this).parent().remove();
    });
});