$(document).ready(function(e){
  var parentlayer = parent.layer.getFrameIndex(window.name); 
    var currentlayer;
    layer.config({ skin: 'layer-ext-moon' });
    $('.btn-pop-up').on('click', function(){
         $('.btn-login').trigger('click');
    });

    $('body').delegate(".layer-opener" , "click" , function(e){
        var _index = parent.layer.load();
        window["loader_index"] = _index;
        var content = $(this).data('href');
        var type =    $(this).data("type").length ? $(this).data("type") : 2;
        var width =   $(this).data("w") ? $(this).data("w") :"800px";
        var height =  $(this).data("h") ? $(this).data("h") :"720px";
        console.log(content);
        var _layer = parent.layer.open({
            type : type,
            content : [content, 'yes'],
            area : [ width, height],
            title: 'panel',
            success: function (layero, index) {
              parent.layer.close(_index);
                  console.log("success");
            },
            ready: function(layero, index){
              console.log("ready");
            },
            end: function(layero, index){
              parent.layer.close(_index);
              console.log("end");
            },
            always: function (layero , index){
              console.log("always");
            }
        });
        currentlayer = _layer;
    });
     $('.parent-layer-opener').click(function(e){
        var _index = parent.layer.load();
        window["loader_index"] = _index;
        var content = $(this).data('href');
        var type = $(this).data("type").length ? $(this).data("type") : 2;
        var target = $(this).data("to");
        var targetElement = $(target);
         $.ajax({
          url: content,
          type: 'GET',
           dataType: "html",
            cache: false,
        success: function (result) {

          parent.layer.close(_index);
          targetElement.html(result);
        },
        end: function(layero, index){
              parent.layer.close(_index);
              console.log("end");
            }
        });
      });

     $('.layer-tab-opener').click(function(e){
      layer.tab ({
        area: [ '600px', '300px'],
        tab: [{
          title: 'TAB1', 
          content: 'Contents'
        }, {
          title: 'TAB2', 
          content: 'Content 2'
        }, {
          title: 'TAB3', 
          content: 'Content 3'
        }]
      }); 
     });
    
});
