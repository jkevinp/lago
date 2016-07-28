function setattr(theclass, field, value){
	$(theclass).attr(field, value);
}
function addToInfoTable(key, value){
	var t= $('table.info');
		t.append('<tr><td>' + key +'</td><td>' + '<a href="#"  class="tipdata clipboard tips" data-tip="Copied" data-clipboard-text="'+  value +'" >' + value + '</a>' +'</td></tr>');	
}
function resetwithdrawinfo(){
	var t = $('table.info');
	t.empty();
	$('.txt_reference').val("");
}
function validateAmount(){
	resetwithdrawinfo();
	var min  = parseFloat($('.number_amount').attr("min"));
	var max  = parseFloat($('.number_amount').attr("max"));
	var amt =  parseFloat($('.number_amount').val()).toFixed(2);
	if(amt >= min && amt <= max){
		confirm();

		return true;	
	}
	m_error("Minimum deposit amount of " + min + " and maximum " + max );
	return false;
}
function confirm(){
	var _index = parent.layer.load();
	addToInfoTable( "Amount" ,parseFloat($('.number_amount').val()).toFixed(2));
	$.ajax({
		type      : 'GET',
		url       : window.location.origin + "/ajax/get_reference_code/T" ,
		dataType  : 'json', 
		beforeSend: function( xhr ) {

		}, success: function(data){
			$('.txt_reference').val(data.ref_code);
			addToInfoTable("Reference Code" ,data.ref_code);
			// addToInfoTable("Platform" , $('.rdb_platform:checked').data("text"));
			// addToInfoTable("Process" ,  $('.rdb_process:checked').data("text"));
			addToInfoTable("Platform" , $('.select_platform.on').data("name"));
			addToInfoTable("Process" ,  $('.rdb_process').attr("value"));

			$('.btn_transfer_submit').show(0);
			parent.layer.close(_index);
		}});
}
$(document).ready(function(e){
	$('.number_amount').on('keyup' , function(){
		var val  = parseFloat($('.number_amount').val());
		var max = parseFloat($(this).data("max"));
		var next = $('.btn-wiz-next.btn-wiz-0');
		if(val > max){
			next.text("Invalid Amount.").attr("disabled" , true);
		}
		else{
			next.text("Next >").removeAttr("disabled");
		} 	

	});
	$('.btn-wiz-0').data("function" , "validateAmount");
	$('.rdb_platform').first().attr("checked" , true);

	
});


$(document).on('change' , '.rdb_platform' ,function(){
		alert(1);
	});