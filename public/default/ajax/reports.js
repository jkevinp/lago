$('#model').on('change' ,function(e){
    var value = $(this).val();
    if(value == "booking"){
        $('#producttype').attr('disabled');
        $('#producttype').fadeOut();
    }else{
        $('#producttype').removeAttr('disabled');
        $('#producttype').fadeIn();
    }
});