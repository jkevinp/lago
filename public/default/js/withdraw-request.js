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
		url       : window.location.origin + "/ajax/get_reference_code/W" ,
		dataType  : 'json', 
		beforeSend: function( xhr ) {

		}, success: function(data){
			$('.txt_reference').val(data.ref_code);
			addToInfoTable("Bank Account Number" , $('.bankaccountnumber').val());
			addToInfoTable("Reference Code" ,data.ref_code);
			parent.layer.close(_index);
		}});
}
$(document).ready(function(e){
	$('.btn-wiz-0').data("function" , "validateAmount");
});

