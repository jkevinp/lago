var c_validation_enabled = false;
var c_validation_error = "zy_txt";
var c_validation_error_tag = "p";




$('.dynpro').each(function(index,object){});

  $('.check_balance').on('click' ,function(){
    	var me = $(this);
            var platform = $(this).data("platform");
            var user = window['user'] ;
            $.ajax({
                type: 'GET', 
                url : window.location.origin + "/api/" + platform + "/GetBalance",
                data : {userName : user.username, created_at : user.created_at },
                dataType: "json",
                beforeSend: function(data){
                    me.find("p").html("<i class='fa fa-spinner fa-spin'></i>");
                }
            }).done(function(data){
                   var json = JSON.parse(data);
                    $(this).val(json.Data);
                     me.find("p").html(parseFloat(json.Data).toFixed(2));
            }, 'json').fail(function(data){
                me.find("p").html("N/A");
            });
 });

$('.get_balance').click(function(e){	
	var me = $(this);
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_current_balance'},
		success : function(data){
			console.log(data);
			$(me.data('target')).text(parseInt(data.balance).toFixed(2));	
		}
	});
});

$('.get_messages').click(function(e){	
	var me = $(this);
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_messages'},
		success : function(data){
			console.log(data);
			if(typeof me.data('target') === "undefined")
				$(me).text(parseInt(data.length));
			else
			$(me.data('target')).text(parseInt(data.length));	
		}
	});
});

$('.admin_get_messages').click(function(e){	
	var me = $(this);
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_messages'},
		success : function(data){
			console.log(data);
			if(typeof me.data('target') === "undefined")
				$(me).text(parseInt(data.length));
			else
			$(me.data('target')).text(parseInt(data.length));	
		}
	});
});

$('.get_popular_games').click(function(e){	
	var me = $(this); 
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_popular_games'},
		success : function(data){
			var html = buildlayout('popular_games' , data);
			me.empty();
			me.append(html);
		}
	});
});

$('.index_get_popular_games').click(function(e){	
	var me = $(this); 

	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_popular_games'},
		success : function(data){
			var html = buildlayout('index_popular_games' , data);
			me.empty();
			me.append(html);
		}
	});
});

$('.get_new_games').click(function(e){	
	var me = $(this); 
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_new_games'},
		success : function(data){
			var html = buildlayout('popular_games' , data);
			me.empty();
			me.append(html);
		}
	});
});

$('.get_profitable_games').click(function(e){	
	var me = $(this); 
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_profitable_games'},
		success : function(data){
			var html = buildlayout('popular_games' , data);
			me.empty();
			me.append(html);
		}
	});
});

$('.index_get_profitable_games').click(function(e){	
	var me = $(this); 
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_profitable_games'},
		success : function(data){
			var html = buildlayout('index_popular_games' , data);
			me.empty();
			me.append(html);
		}
	});
});

$('.index_get_newest_games').click(function(e){	
	var me = $(this); 
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_newest_games'},
		success : function(data){
			var html = buildlayout('index_popular_games' , data);
			me.empty();
			me.append(html);
		}
	});
});

//use blank 
$('body').delegate('.gamehit' , 'click',function(e){
    var me = $(this);
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('addhiturl'),
		'data' : {'type' : 'add_hit'},
		success : function(data){

		}
	});
});



$('.masstransfer').click(function(e){

	var me = $(this);
	var oldbuttonhtml = me.html();

	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'dataType' : 'json',
		 beforeSend: function( xhr ) {
            me.attr("disabled" , true).html("<i class='fa fa-spinner fa-spin'></i>");
         },
		success : function(data) {    
			resetdynpro();
                	me.removeAttr("disabled").html(oldbuttonhtml);
                    if (!data.status) {
                       $(".throw_error").removeClass("hidden").fadeIn("slow").html(data.message);
                       if(data.message) m_error(data.message);
                    }
                    else{
              
                
                        var url  = "";
                        if(data.redirect)url = data.redirect;
                        console.log(data);
                        if(data.message){
                            m_alert(data.message, function(){ 
                                console.log(url);
                                console.log(data.others);
                                 if(data.others){
                                    //redirect(url);

                                    handleResponse(data.others , url);
                                }
                                else redirect(url);
                                return true;
                            });
                        }else{
                            if(data.others)handleResponse(data.others , url);
                        }
                    } 
                },
                error: function(xhr, status, error) {
                 m_error(xhr.responseText);
                 console.log(error);
                 me.removeAttr("disabled").html(oldbuttonhtml);
                }
	})
});

$('.get_announcement_sitenotice').click(function(e){	
	var me = $(this);
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_announcement_sitenotice'},
		'dataType' : 'json',
		success : function(data){
			console.log(data);
			var html = buildlayout('sitenotice' ,data);
			if(typeof me.data('target') === "undefined")$(me).html(html);
			else $(me.data('target')).html(html);	
			
			
		}
	});
});

$('.get_announcement').click(function(e){	
	var me = $(this);
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : me.data('type') },
		'dataType' : 'json',
		success : function(data){
			console.log(data);
			var html = buildlayout('sitenotice' ,data);
			if(typeof me.data('target') === "undefined")$(me).html(html);
			else $(me.data('target')).html(html);	
			
			
		}
	});
});

$('.get_messages_data').click(function(e){	
	var me = $(this);
	var loaderIndex = loading(1);
	var baseHtml = me.html();
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_messages'},
		'dataType' : 'json',
		success : function(data){
			var html = buildlayout('message' ,data);
			if(typeof me.data('target') === "undefined")$(me).html(html);
			else $(me.data('target')).html(html);	
			layer.close(loaderIndex);
		}
	});
});

$('.admin_get_messages_data').click(function(e){	
	var me = $(this);
	$.ajax({
		'type' : 'GET',
		'url'  : me.data('href'),
		'data' : {'type' : 'get_messages'},
		'dataType' : 'json',
		success : function(data){
			console.log(data);
			var html = buildlayout('admin_message' ,data);
			if(typeof me.data('target') === "undefined")$(me).append(html);
			else $(me.data('target')).append(html);	
			
			
		}
	});
});



function buildlayout(type , arr){
	switch(type){
		 case 'sitenotice':
		 var html ="";
		 $.each(arr ,function(index,row){
		 html +="<li>";
	     html += "<p><b>●</b> " + row.updated_at  +  "</p>";
	     html += '<p><b>' + row.title + '</b></p>';
	     html += '<p class="info_txt">'+  row.text  + '</p>';
	 	});

	     html += '</li>';
	     return html;
		 break;  

		 case 'message':
		 var html ="";
		 $.each(arr ,function(index,row){
             html+='       <tr>';
             html+='         <td><label><input type="checkbox" value=""></label></td>';
             html+='         <td>'+ row.title +'</td>';
             html+='         <td>'+ row.updated_on +'</td></tr>';
	 	});

	     return html;


	      case 'admin_message':
		 var html ="";
		 $.each(arr ,function(index,row){
            html += 	'<li><a href="#"><div class="pull-left"><i class="fa fa-user fa-3x"></i></div>';
			html += 	'<h4>' +  row.sender + '<small><i class="fa fa-clock-o"></i> '+ row.updated_on +'</small></h4>';
			html += 	'<p>' +  row.title + '</p></a></li>';


	 	});


		
	     return html;



		 break;

		 case 'popular_games':
		 var html ="";
		 $.each(arr ,function(index,row){
		

            html += '<li style="float: left; width:130px !important;height:110px !important;">';
		    

		    if(!ISLOGGEDIN ){
				html += '<a href="#" href="#"  data-addhiturl="'+ row.addhiturl +'" data-type="2" class="layer-opener gamehit" data-w="500px" data-h="380px" data-href="'+ row.url +'">';
			  }else{
			    html +='<a data-addhiturl="'+ row.addhiturl +'" target="_blank"   href="' + row.url + '" class="enter gamehit" >';
			  }

		    html +='<img src="'+  row.assets1 +'" alt="" style="width:150px !important;height:85px !important;"></a>';
		    html += '   <p><a href="#">'+ row.name_cn +'</a></p>';
		    html += '</li>';
	 	});
	     return html;
		 break;

		 case 'index_popular_games':
		 	var html ="";
			
		$.each(arr ,function(index,row){
			html +='  <div class="item clearfix">';
	        html +='    <div class="img_rim">';
	          if(!ISLOGGEDIN ){
				html += '<a href="#" href="#"  data-addhiturl="'+ row.addhiturl +'" data-type="2" class="layer-opener gamehit" data-w="500px" data-h="380px" data-href="'+ row.url +'">';
			  }else{
			    html +='<a data-addhiturl="'+ row.addhiturl +'" target="_blank"   href="' + row.url + '" class="enter gamehit" >';
			  }

	        html+= '<img src="'+  row.assets1 +'" alt="" style="width:153px;height:100px;" /></div>';
	        html += '</a>';
	        html +='    <div class="game_info">';
	        html +='      <a href="#">'+  row.name_cn +'</a>';
	        html +='      <p><span>8.9</span><img src="'+CURRENT_ASSET+'images/pf_4.png" alt="" /></p>';
	        html +='      <p><i class="play"><img src="'+CURRENT_ASSET+'images/icon_01.png" alt="" />2004</i><i class="sc"><img src="'+CURRENT_ASSET+'images/icon_02.png" alt="" />'+ row.hits +'</i></p>';
	        html +='    </div>';
	        html +='  </div>';
	    });
         return html;
		 break;
    }
}

$('.balance_total').click(function(){
	  var _repeatingChecker = setInterval(function(){ 
      var totalAmount = 0;
      var test = 0;

      $('.check_balance').find("p").each(function(i, o){
          var _text = $(o).text();
          test +=  ((!isNaN(_text) && _text != "") || _text == "NaN") ? 1 : 0;
          if(!isNaN(_text))totalAmount += parseFloat(_text);
          console.log(test);
            if(test == $('.check_balance').length) {
              console.log("ending : " + test);
              clearTimeout(_repeatingChecker);
               $('.balance_total').text(totalAmount.toFixed(2));
            }
      });

   }, 300);
});

function resetdynpro(){
  window.parent.$('.dynpro').trigger("click");
  window.parent.layer.getChildFrame("body" , 0).find(".dynpro").trigger("click");
  window.parent.layer.getChildFrame("body" , 1).find(".dynpro").trigger("click");

}

$(document).ready(function(){
	$('.dynpro').trigger('click');
});
	


//alert col-md-12 alert-danger