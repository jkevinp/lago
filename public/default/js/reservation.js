$(document).ready(function(){
	$('#cno').keypress(function(e){
		if(!isNumberKey(e))
		{
			e.preventDefault();
		}
	});

	$('.text-only').keypress(function(e){
		var letter = String.fromCharCode(e.which);
		if(!isLetter(letter))
		{
			e.preventDefault();
		}
	});

});