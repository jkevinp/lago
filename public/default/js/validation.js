$(document).ready(function(){

	$('.validation-creditcard').keyup(function() {

	    var inputVal = $(this).val();
	    var ccReg = /^4[0-9]{12}(?:[0-9]{3})?$/;
	    if(!ccReg.test(inputVal)) {
	        $(this).after('<span class="hidable alert col-md-12 alert-danger">Invalid visa card number</span>');
	    }else{
	    	$('.hidable').remove();
	    }
	});

	$('.validation-email').keyup(function() {
	    $(this).next(".hidable").remove();
	    var inputVal = $(this).val();
	    var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
	    if(!emailReg.test(inputVal)) {
	        $(this).after('<div class="hidable alert col-md-12 alert-danger">Invalid Email Address.</div>');
	        $(this).css({"border-style" : "solid", "border-color":"red"});
	    }else{
	    	 $(this).next(".hidable").remove();
	    	 $(this).css({"border-style" : "solid", "border-color":"green"});
	    }
	});

	$('.validation-length').keyup(function(e) {
	    $(this).next(".hidable").remove();
	    if($(this).val().length >= $(this).data('length')) {
	    	e.preventDefault();
	    	console.log("validation-length");
	        $(this).after('<div class="hidable alert col-md-12 alert-danger">Up to ' + $(this).data('length') + ' characters only.</div>');
	        $(this).css({"border-style" : "solid", "border-color":"red"});
	        
	    }else{
	    	 $(this).next(".hidable").remove();
	    	 $(this).css({"border-style" : "solid", "border-color":"green"});
	    }
	});

	$('.validation-date').keyup(function() {

	    var inputVal = $(this).val();
	    var dateReg = /^[0,1]?\d{1}\/(([0-2]?\d{1})|([3][0,1]{1}))\/(([1]{1}[9]{1}[9]{1}\d{1})|([2-9]{1}\d{3}))$/;
	    if(!dateReg.test(inputVal)) {
	        $(this).after('<span class="hidable alert col-md-12 alert-danger">Invalid date format.</span>');
	    }else{
	    	$('.hidable').remove();
	    }
	});



	$('.validation-number').keyup(function() {
		$(this).next(".hidable").remove();
	    var inputVal = $(this).val();
	    var numericReg = /^\d*[0-9](|.\d*[0-9]|,\d*[0-9])?$/;
	    
	    if(!numericReg.test(inputVal)) {
	    	layer.tips('Numbers Only.', $(this), {
			  tips: [1, '#d94845'],
			  tipsMore: true,
			  time: 1000
			});
	        $(this).after('<div class="hidable alert col-md-12 alert-danger">Numbers Only.</div>');
	        $(this).css({"border-style" : "solid", "border-color":"red"});
	    }else{
	    	 $(this).next(".hidable").remove();
	    	 $(this).css({"border-style" : "solid", "border-color":"green"});
	    }
	});

	$('.validation-text').keyup(function() {
		$(this).next(".hidable").remove();
	    var inputVal = $(this).val();
	    var characterReg = /^[a-z][a-z0-9_]$/;
	    console.log("checking " + characterReg.test(inputVal));
	    if(!characterReg.test(inputVal)) {
	        $(this).after('<div class="hidable alert col-md-12 alert-danger">Invalid Username.</div>');
	        $(this).css({"border-style" : "solid", "border-color":"red"});
	    }else{
	    	 $(this).next(".hidable").remove();
	    	 $(this).css({"border-style" : "solid", "border-color":"green"});
	    }
	});

	$('.validation-qq').keyup(function() {
		$(this).next(".hidable").remove();
	    var inputVal = $(this).val();
	    var characterReg = /^[0-9]{4,15}$/;
	    console.log("checking " + characterReg.test(inputVal));
	    if(!characterReg.test(inputVal)) {
	        $(this).after('<div class="hidable alert col-md-12 alert-danger">Invalid QQ Number.</div>');
	        $(this).css({"border-style" : "solid", "border-color":"red"});
	    }else{
	    	 $(this).next(".hidable").remove();
	    	 $(this).css({"border-style" : "solid", "border-color":"green"});
	    }
	});

	$('.validation-telephone').keyup(function() {
		$(this).next(".hidable").remove();
	    var inputVal = $(this).val();
	    var characterReg = /^0*(13|15|18|17|16)\d{9}$/;
	    console.log("checking " + characterReg.test(inputVal));
	    if(!characterReg.test(inputVal)) {
	        $(this).after('<div class="hidable alert col-md-12 alert-danger">Invalid Phone Number.</div>');
	        $(this).css({"border-style" : "solid", "border-color":"red"});
	    }else{
	    	 $(this).next(".hidable").remove();
	    	 $(this).css({"border-style" : "solid", "border-color":"green"});
	    }
	});

	$('.validation-realname').keyup(function() {
		$(this).next(".hidable").remove();
	    var inputVal = $(this).val();
	    var characterReg = /^[a-zA-Z ]{2,30}$/;
	    console.log("checking " + characterReg.test(inputVal));
	    if(!characterReg.test(inputVal)) {
	        $(this).after('<div class="hidable alert col-md-12 alert-danger">Invalid Name.</div>');
	        $(this).css({"border-style" : "solid", "border-color":"red"});
	    }else{
	    	 $(this).next(".hidable").remove();
	    	 $(this).css({"border-style" : "solid", "border-color":"green"});
	    }
	});


	$('.validation-username').keyup(function() {
		$(this).next(".hidable").remove();
	    var inputVal = $(this).val();
	    var characterReg = /^[a-z][a-z0-9_]{5,10}$/;
	    console.log("checking " + characterReg.test(inputVal));
	    if(!characterReg.test(inputVal)) {
	        $(this).after('<div class="hidable alert col-md-12 alert-danger">Invalid Username.</div>');
	        $(this).css({"border-style" : "solid", "border-color":"red"});
	    }else{
	    	 $(this).next(".hidable").remove();
	    	 $(this).css({"border-style" : "solid", "border-color":"green"});
	    }
	});

	$('.validation-password').keyup(function() {
		$(this).next(".hidable").remove();
	    var inputVal = $(this).val();
	    var characterReg = /^[a-z0-9_]{6,12}$/;
	    console.log("checking " + characterReg.test(inputVal));
	    if(!characterReg.test(inputVal)) {
	    	if(window['c_validation_enabled'])$(this).after('<' + window['c_validation_error_tag']  +' class="hidable '  +   window['c_validation_error']  + '">Invalid Password.</'+ window['c_validation_error_tag'] +'>');
	        $(this).css({"border-style" : "solid", "border-color":"red"});
	    }else{
	    	if(window['c_validation_enabled'])$(this).next(".hidable").remove();
	    	 $(this).css({"border-style" : "solid", "border-color":"green"});
	    }
	});

	$('.validation-custom').keyup(function() {

	    var inputVal = $(this).val();
	    var characterReg = $(this).data('regex');
	    if(!characterReg.test(inputVal)) {
	        $(this).after('<span class="hidable alert col-md-12 alert-danger">' + $(this).data("errormessage")  +  '.</span>');
	    }else{
	    	$('.hidable').remove();
	    }
	});


});