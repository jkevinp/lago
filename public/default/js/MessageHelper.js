function redirect(url , closelayer = false){
  if(closelayer) parent.layer.closeAll();
  if(url.length)window.location.href = url;
}
function handleResponse(others , param = ""){
    switch(others){
        case "close_all_layer":
            parent.layer.closeAll();
        break;
        case "close_current_layer":
            
        break;
        case "close_page":
        console.log("close_page");
            parent.location.reload();
        break;
        case "reload_page":
            parent.location.reload();
        break;
        case 'window':
          console.log("window");
          OpenInNewTab(param);
          //parent.window.location = param;
        break;
        case "layer_redirect":
          parent.$("iframe").attr("src" , param);
        break;
    }
}

function OpenInNewTab(url) {
 
  var win = window.open(url, '_blank');
  win.focus();
}

function m_error2(content , callback){
  var _index = layer.confirm(content, {
    btn: ['Okay'],
    title: "Error",
    skin: 'layui-layer-rim',
    icon : 2
    },function(layero, index){
      if(typeof callback == "function"){
        console.log("callback");
        callback();
        parent.layer.close(_index);
      }
    });
}

function m_error(content){
	layer.alert(content, {title: "Error!", btn: 'Okay.',icon: 2,skin: 'layer-ext-moon'});
}
function m_info(content){
	layer.alert(content, {title: "Information", btn: 'Okay.',skin: 'layer-ext-moon'});
}
function m_warning(content){
	layer.alert(content, {title: "Warning!", btn: 'Okay.',icon: 0,skin: 'layer-ext-moon'});
}
function m_success(content){
	layer.alert(content, {title: "Success!", btn: 'Okay.',icon: 1,skin: 'layer-ext-moon'});
}
function m_question(content){
	layer.alert(content, {title: "Are you sure?", btn: 'Okay.',icon: 3,skin: 'layer-ext-moon'});
}
function m_lock(content){
	layer.alert(content, {title: "Cannot continue.", btn: 'Okay.',icon: 4,skin: 'layer-ext-moon'});
}
function m_tips(content , theclass){
  layer.tips(content, theclass,{
  tips: 1
  });
}
function number_format(number)
{
    number = parseFloat(number).toFixed(2) + '';
    x = number.split('.');
    x1 = x[0];
    x2 = x.length > 1 ? '.' + x[1] : '';
    var rgx = /(\d+)(\d{3})/;
    while (rgx.test(x1)) {
        x1 = x1.replace(rgx, '$1' + ',' + '$2');
    }
    return x1 + x2;
}
function loading(type = 0){
  var index = layer.load(type, {shade: false});
  return index;
}
function m_text(title,content){
	layer.ready(function(){ 
        layer.open({
          type: 1,
          skin: 'layui-layer-rim', //加上边框
          area: ['420px', '240px'], //宽高
          content: content,
          title : title
        });
    });
}
function prompt(text){
layer.prompt(function(val){
    var input = val;
    layer.msg(text);
  });
  return val;
}
function m_alert(content , callback){
  var _index = layer.confirm(content, {
    btn: ['Okay'],
    title: "information",
    skin: 'layui-layer-rim',
    icon : 1
    },function(layero, index){
      if(typeof callback == "function"){
        console.log("callback");
        callback();
        parent.layer.close(_index);
      }
    });
}
function m_alert2(content , callback,callback2){
  layer.confirm(content, {
    btn: ['Okay' , 'Cancel'],
    title: "information",
    skin: 'layui-layer-rim',
    icon : 1
    },function(){
      if(typeof callback == "function") 
      callback();
    },function(){
      if(typeof callback2 == "function") 
      callback2();
    });
}
function m_confirm(content){
  layer.confirm('Confirmation required.', {
  btn: ['重要','奇葩'] //按钮
}, function(){
  layer.msg('的确很重要', {icon: 1});
}, function(){
  layer.msg('也可以这样', {
    time: 20000, //20s后自动关闭
    btn: ['明白了', '知道了']
  });
});
}

$('body').delegate(".memberdetails" ,"click" , function(event){
  var _index = parent.layer.load();
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
        }
  });
});


var l_edit_phone = "Please edit your phone #";
var l_click_here = "Click here ";