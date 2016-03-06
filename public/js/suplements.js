function log(item){
    console.log(item);
}
$(document).ready(function(){
    log('sim');
    $('.rect1').on('click', function(){
        $(this).append('<div class="modal"></div>');
        log($(this));
    });    
});