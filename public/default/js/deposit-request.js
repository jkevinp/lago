var cn_loading = "Loading..",
cn_bank = "Bank",
cn_branch = "Branch",
cn_amount = "Amount",
cn_qr_code = "QR Code",
cn_reference_no = "Reference #";
function setattr(theclass, field, value){
	$(theclass).attr(field, value);
}
function chooseBank(){
	var bankid= $('.img.active').data("bankid");
	var amt =  $('.number_amount').val();
	var result = getBank(parseFloat(amt).toFixed(2),bankid);
	return result;
}
function getBank(amt, bankid){
	var _index = parent.layer.load();
	var result = false;
	var ajax = $.ajax({
		type      : 'post',
		url       : window.location.origin + "/ajax/get_random_reciepient_account/" +bankid,
		dataType  : 'json', 
		data : {'amount' : amt , _token: window.csrf_token},
		beforeSend: function( xhr ) {
			$('.btn-checkBank').text(cn_loading);
			resetdepositinfo();
		}, success: function(data){
			$('.btn-checkBank').text("Find Available Bank Accounts");
			parent.layer.close(_index);
			if(data.bankaccount){
				result = true;
				m_success("Found bank account to accept your deposit, please click next.");
				// addToInfoTable("Bank" ,data.bank.name);
				addToInfoTable("Bank URL" , "<a target='_newTab' href='"+ data.bank.url +"'><img width='100px' height='50px' src='"+ window.location.origin + "/standard-assets/img/" + data.bank.logo +" ' /></a>")
				addToInfoTable( "Branch" ,data.bankaccount.branch );
				addToInfoTable( data.bankaccount.account_name_label ,data.bankaccount.account_name );
				addToInfoTable( data.bankaccount.account_number_label ,data.bankaccount.account_number );
				if(data.bankaccount.qr_code != "")
				addToInfoTable( "QR" ,data.bankaccount.qr_code);
				$('.receiving_bank_id').val(data.bankaccount.id);
			}else{
				m_error("Could not find bank that accepts the amount you specified.");
				result = false;
			}
		}
	});
	return result;
}
function addToInfoTable(key, value){
	var t= $('table.info'); 
	t.append('<tr><td>' + key +'</td><td>' + '<a href="#"  class="tipdata clipboard tips" data-tip="Copied" data-clipboard-text="'+  value +'" >' + value + '</a>' +'</td></tr>');	
}
function resetdepositinfo(){
	var t = $('table.info');
	t.empty();
	$('.txt_reference').val("");
	return true;
}
function validateAmount(){
	var min  = parseFloat($('.img.active').data("minimum"));
	var max  = parseFloat($('.img.active').data("maximum"));
	var amt = parseFloat($('.number_amount').val()).toFixed(2);
	console.log(amt + ">=" + min + "&&" + amt + "<=" + max);
	if(amt >= min && amt <= max){
		confirm(amt);
		console.log("is between amt");
		return true;	
	}
	m_error("Minimum deposit amount of " + min + " and maximum " + max );
	return false;
}
function confirm(amt){
	var _index = parent.layer.load();
	
	$.ajax({
		type      : 'GET',
		url       : window.location.origin + "/ajax/get_reference_code/D" ,
		dataType  : 'json', 
		beforeSend: function( xhr ) {
			var _bank = $('.img.active');
			// addToInfoTable("Bank" , _bank.data("bankname"));
			addToInfoTable(cn_bank , "<a target='_newTab' href='"+ _bank.data('url') +"'><img width='100px' height='50px' alt='" + _bank.data("bankname") +"' src='"+ _bank.data('logo') +" ' /></a>")
			addToInfoTable(cn_branch , _bank.data("branch"));
			addToInfoTable( _bank.data("account_name_label") ,_bank.data('account_name'));
			addToInfoTable( _bank.data('account_number_label') , _bank.data('account_number'));
			addToInfoTable(cn_amount ,amt);
			if(_bank.data("qr_code") != "")addToInfoTable(cn_qr_code, "<img width='100px' height='50px' src='"+ _bank.data('qr_code') +"' alt='QR code' />" );

			$('.receiving_bank_id').val(_bank.data('id'));
		}, success: function(data){
			$('.txt_reference').val(data.ref_code);
			addToInfoTable( cn_reference_no ,data.ref_code);
			parent.layer.close(_index);
		}});
}

$(document).ready(function(e){

	$('.btn-wiz-b1').data("function" , "resetdepositinfo");
	$('.btn-wiz-0').data("function" , "validateAmount");
	$('.select_banks').click(function(e){
		$('.select_banks').removeClass("active").removeClass("on");
		var min =  $(this).data('minimum');
		var max = $(this).data('maximum');
		$(this).addClass("active").addClass("on").addClass("actived");
	});
	$('.select_banks').first().trigger("click");
	parent.layer.close(window['loader_index']);
});
