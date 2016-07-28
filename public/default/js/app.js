$(document).ready(function() {
    $('#login-form').submit(function(event) {
        var frm = $(this);
        var submitbutton = frm.find("button:submit");
        var oldbuttonhtml = submitbutton.html();
        var post_data = $(this).serializeArray();
        $.ajax({
            type      : 'POST',
            url       : $(this).attr('action'),
            data      : post_data,
            dataType  : 'json', 
            beforeSend: function( xhr ) {
                submitbutton.attr("disabled" , true).html("<i class='fa fa-spinner fa-spin'></i>");
            },
            success   : function(data) {
                submitbutton.removeAttr("disabled").html(oldbuttonhtml);
                if (!data.status) {
                    $(".throw_error").removeClass("hidden").fadeIn("slow").html(data.message);
                    if(data.message.length)m_error(data.message);
                    if(data.others){
                        if(data.others == "reload_page")parent.location.reload();
                        if(data.others ==  "close_page")parent.location.reload();
                    }
                }else{
                   if(data.redirect)window.location.href = data.redirect;
                    parent.$('.btn-pop-up').html(data.username);
                    parent.location.reload();
                }
            }
        });
        event.preventDefault();
    });

    $('#registration-form').submit(function(event) {
        var post_data = $(this).serializeArray();
        console.log(post_data);
        $.ajax({
            type      : 'POST',
            url       : $(this).attr('action'),
            data      : post_data,
            dataType  : 'json',
            success   : function(data) {
                if (!data.status) {
                   $(".throw_error").removeClass("hidden").fadeIn("slow").html(data.message);
                   if(data.message) m_error(data.message);
                }
                else{
                    if(data.message)m_success(data.message);
                    if(data.redirect)window.location.href = data.redirect;
                }
                
            }
        });
        event.preventDefault();
    });

    var ctr= 0;
    $('.tips').each(function(index ,object){
        $(object).data("target",".tips" + ctr);
        $(object).addClass("tips" + ctr);
        ctr++;  
    });
    $('body').delegate(".tips" ,'click', function(e){
        var target = $(this).data("target");
        if(!target) target = $(this);
        m_tips($(this).data("tip") , target
            );
    });
    
    $( "body" ).delegate( ".a-confirmation", "click", function(event) {
        var url = $(this).attr("href");
        event.preventDefault();
        m_alert2("Are you sure you want to continue?" , function(){
            redirect(url);
        },function(){
            m_info("Cancelled");
        });
    });



  $('.loader').each(function(index, object){
        $.ajax({
            type: 'GET', 
            url : $(object).attr("href"),
            dataType: "json",
            beforeSend: function(data){
                $(object).html("<i class='fa fa-spinner fa-spin'></i>");
            }
        }).done(function(data){
               var json = JSON.parse(data);
               $(object).html(data);
        }, 'json').fail(function(data){
            $(object).children("p").html("N/A");
        });
    });

    $( "body" ).delegate( ".ajaxget-confirmation", "click", function(event) {
        var url = $(this).attr("href");
        var me = $(this);
        var oldbuttonhtml = me.html();
        m_alert2("Are you sure you want to continue?" , function(){
           $.ajax({
            type      : 'get',
            url       : url,
            dataType  : 'json',
            beforeSend: function( xhr ) {
              me.attr("disabled" , true).html("<i class='fa fa-spinner fa-spin'></i>");
            },
            success : function(data) {    
                if (!data.status) {
                    if(data.message.length)m_error(data.message);
                    if(data.others){
                        if(data.others == "reload_page")parent.location.reload();
                        if(data.others ==  "close_page")parent.location.reload();
                    }
                }else{
                   if(data.redirect)window.location.href = data.redirect;
                    parent.$('.btn-pop-up').html(data.username);
                    parent.location.reload();
                }
            },
            error: function(xhr, status, error) {
             m_error(xhr.responseText);
             console.log(error);
             
             me.removeAttr("disabled").html(oldbuttonhtml);
            }
        });
        },function(){

             me.removeAttr("disabled").html(oldbuttonhtml);
            m_info("Cancelled");
        });

        event.preventDefault();
    });

     $( "body" ).delegate( ".ajaxpost-confirmation", "click", function(event) {
        var url = $(this).attr("href");
        var me = $(this);
        var oldbuttonhtml = me.html();
        var params = me.data();
        params['_token'] = csrf_token;
        console.log(params);
        m_alert2("Are you sure you want to continue?" , function(){
           
           $.ajax({
            type      : 'POST',
            url       : url,
            dataType  : 'json',
            data : params,
            beforeSend: function( xhr ) {
              me.attr("disabled" , true).html("<i class='fa fa-spinner fa-spin'></i>");
            },
            success : function(data) {    
                if (!data.status) {
                    if(data.message.length)m_error(data.message);
                    if(data.others){
                        if(data.others == "reload_page")parent.location.reload();
                        if(data.others ==  "close_page")parent.location.reload();
                    }
                }else{
                   if(data.redirect)window.location.href = data.redirect;
                    parent.location.reload();
                }
            },
            error: function(xhr, status, error) {
             m_error(xhr.responseText);
             console.log(error);
             
             me.removeAttr("disabled").html(oldbuttonhtml);
            }
        });
        },function(){

             me.removeAttr("disabled").html(oldbuttonhtml);
            m_info("Cancelled");
        });

        event.preventDefault();
    });

    $('.dynamic-form').submit(function(event) {
        console.log("dynamic-form submit");
        var error = false;
        var frm = $(this);
        var submitbutton = frm.find("button:submit");
        var submitbutton1 = frm.find("input[type='submit']");
        var oldbuttonhtml = submitbutton.html();
        var oldbuttonhtml1 = submitbutton1.html();
        //var post_data =  new FormData($(this));
        //$(this).serializeArray();
        var post_data = new FormData();
        var other_data = frm.serializeArray();
        $.each(other_data,function(key,input){
            post_data.append(input.name,input.value);
        });

        if(frm.attr("files") == "true"){
            $('input[type="file"]').each(function(index ,object){
                var file_data = $(object)[0].files;
                if(typeof file_data[0] !==  "undefined"){
                    var ext = $(this).val().split('.').pop().toLowerCase();
                    var allowed = frm.data("allow");
                    if(allowed.indexOf(",") > -1){
                     allowed = frm.data("allow").split(',');
                    }
                    if($.inArray(ext, allowed ) == -1 && allowed != ext) {
                        m_error("Invalid Extension or file type.");
                        error = true;
                        event.preventDefault();
                        return;
                  
                    }
                    post_data.append($(object).attr("name"), file_data[0]);
                }

            });
        }
        
        post_data.append("_token" , window.csrf_token);
        console.log(post_data);
        if(error){
            event.preventDefault();
            return;
        }else{
          
            $.ajax({
                type      : 'POST',
                url       : $(this).attr('action'),
                data      : post_data,
                dataType  : 'json',
                contentType: frm.attr("files")  == "true" ? false : false,
                processData: frm.attr("files")  == "true" ? false : false,
                beforeSend: function( xhr ) {
                    submitbutton.attr("disabled" , true).html("<i class='fa fa-spinner fa-spin'></i>");
                    submitbutton1.attr("disabled" , true).html("<i class='fa fa-spinner fa-spin'></i>");
                },
                success : function(data) {    
                    submitbutton.removeAttr("disabled").html(oldbuttonhtml);
                    submitbutton1.removeAttr("disabled").html(oldbuttonhtml1);
                    if (!data.status) {
                       $(".throw_error").removeClass("hidden").fadeIn("slow").html(data.message);
                     
                         var url  = "";
                        if(data.redirect)url = data.redirect;
                        if(data.message){
                            m_error2(data.message, function(){ 
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
                    else{
                        $('.dynpro').each(function(i, o){
                            $(o).trigger("click");
                        });
                        parent.$('.dynpro').trigger("click");
                        // alert(parent.layer.getChildFrame("body", 0).find(".dynpro"));
                        // alert(window.parent.layer.getChildFrame("body", 0).find(".dynpro"));
                        parent.layer.getChildFrame("body" , 0).find(".dynpro").trigger("click");

                        var url  = "";
                        if(data.redirect)url = data.redirect;
                        if(data.message){
                            m_alert(data.message, function(){ 
                                console.log(url);
                                console.log(data.others);
                                 if(data.others){
                                    //redirect(url);
                                    alert(data.others);
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
                 submitbutton.removeAttr("disabled").html(oldbuttonhtml);
                  submitbutton1.removeAttr("disabled").html(oldbuttonhtml);
                  $('.dynpro').trigger("click");
                  parent.$('.dynpro').trigger("click");
                }
            });
            event.preventDefault();
            }
    });
    
    $("form.disable-enter").find("input").on("keypress", function(event) {
        
        if (event.keyCode == 13) {
            event.preventDefault();
        }
    });

 
    $('.captcha').click(function(e){
        console.log('recaptcha');
        $.ajax({
            type      : 'GET',
            url       : window.location.origin + "/captcha/1",
            success   : function(data) {
                console.log(data);
                $('.captcha').attr("src", 'data:image/jpeg;base64,' +data);
            }
        });
      
       
    });

    


});
