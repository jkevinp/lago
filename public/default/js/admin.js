$('.treeview').fadeOut(0);

$("body").on('blur' , "[contenteditable='true']" ,function() {
    var me = $(this);
    var l = layer.confirm("Are you sure you want to save changes?", {
      btn: ['Okay' , 'Cancel'],
      title: "information",
      skin: 'layui-layer-rim',
      icon : 1
      },function(){

       me.data('_token', csrf_token);
       me.data("newValue" , me.text());

        $.ajax({
          url: url_inlineedit,
          data : me.data(),
          type: 'POST',
          dataType: "html",
          cache: false,
          success: function (data) {
            parent.layer.close(l);
          }
        });
        //end ajax
      },function(){
     
      });

  });
