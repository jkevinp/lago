$(document).ready(function(e){
      var index = parent.layer.getFrameIndex(window.name); 


      $('.showtransactiondetails').find(".reference").keyup(function(e){
        var post_data = $(this).serializeArray();
           $.ajax({
            type      : 'GET',
            url       : $('.showtransactiondetails').attr('action'),
            data      : post_data,
            dataType  : 'json', 
            beforeSend: function( xhr ) {
              $('.box-content').html("<p class='text-center'><i class='fa fa-spinner fa-spin'></i> Loading..</p>");
                  parent.layer.iframeAuto(index);
            },
            success   : function(data) {
              console.log(data);
              $('.box-content-left').html("");
              $('.box-content-right').html("");
              if(data.status){
                if(data.data){
                  console.log(data.data);

                  $('.box-content-left').append("<div class='form-group'><label>Reference</label>: " + data.data.reference  +"</div>");
                  $('.box-content-left').append("<div class='form-group'><label>Member</label>:" + data.data.member  +"</div>");
                  $('.box-content-left').append("<div class='form-group'><label>Amount</label>:" + data.data.amount  +"</div>");
                  $('.box-content-left').append("<div class='form-group'><label>Status</label>:" + data.data.status  +"</div>");
                  $('.box-content-left').append("<div class='form-group'><label>Date</label>:" + data.data.updated_at  +"</div>");

                  $('.box-content-right').append("<div class='form-group'><label>Depositor</label>:" + data.user.depositor  +"</div>");
                  $('.box-content-right').append("<div class='form-group'><label>Bank</label>:" + data.user.bank.name  +"</div>");
                  $('.box-content-right').append("<div class='form-group'><label>Account Name</label>:" + data.user.bank_acname  +"</div>");
                  $('.box-content-right').append("<div class='form-group'><label>Account Number</label>:" + data.user.bank_acno  +"</div>");
                  $('.box-content-right').append("<div class='form-group'><label>Branch</label>:" + data.user.bank_branch  +"</div>");

                  if(data.data.status =="PENDING"){
                    $('.box-content-left').append("<a href='" + $('.showtransactiondetails').data('changestatus') + "/" + data.data.reference + "/SUCCESS"  +  "'  class='btn btn-success ajaxget-confirmation btn-block'>Approve</button>");
                    $('.box-content-right').append("<a href='" + $('.showtransactiondetails').data('changestatus') + "/" + data.data.reference + "/DECLINED"  +  "' class='btn btn-warning ajaxget-confirmation btn-block'>Decline</button>");
                  }
                  parent.layer.iframeAuto(index);
                }
              }else{
                  $('.box-content').html("<p class='text-center'><i class='fa fa-warning'></i> No results found.</p>");
              }
              if(data.others)handleResponse(data.others);
              }
          });//end ajax
      });

       $('.showtransactiondetails').find(".reference").trigger("keyup");
    });