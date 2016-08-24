
var translation = {
  click_on_your_profile : '完善个人资料领取礼金',
  login: '登录',
  free_trial : '试玩',
  enter_game : '输入游戏',
  deposit : '存款',
  withdraw : '提款',
  transfer : '转账',
  bonus : '红利',
  adjustment: '调整',
  commision : '返水',
  others :'其他',
  payment: '支付',
  slug : '类别',
  slug_placeholder: '平台/类别',
  export_csv :  '导出 csv',
  'okay' : 'Okay',
  'confimation_required': 'Are you sure you want to continue?',
  'information' : 'Information',
  'cancel' : 'Cancel',
  'error'  : 'Error!',
  'warning': 'Warning',
  'success': 'Success',
  'are_you_sure': '确认?',
  'cannot_continue': '无法继续',
  'are_you_sure_changes' : '确认保存?',
  'no_results_found' : '没有结果',
  'are_you_sure_continue' : '继续?',
  'cancelled' : '已取消',
  'today': '今天',
  'yesterday':   '昨天',
  'last_7_days':   '最近7日',
  'last_30_days':   '最近30日',
  'this_month':   '本月',
  'last_month':   '上月',
  'loading' : "加载中...",
  'bank' : "银行",
  'branch' : "网点",
  'amount' : "金额",
  'qr_code' : "二维码",
  'reference_no' : "流水号",
  'min_deposit_of' : "最低存款金额",
  'max_deposit_of' : " 最高存款金额",
  'platform' : '平台',
  'process' : '处理',
  'bank_account_no' : '银行账号',
  'next' : '下一步',
  'back' : '上一步',
  'submit' : '提交',
  'error_please_try_again' : '错误!请重试',
  'invalid_email' : "错误的email地址",
  'invalid_no' : "错误的号码",
  'invalid_username' : "错误的用户名",
  'invalid_qq' : "错误的qq号码",
  'invalid_phone_no' : "错误的电话号码",
  'invalid_name' : "错误的名字",
  'username' : '用户名',
  'status' : '状态',
  'date' : '日期',
  'depositor' : '存款人姓名',
  'account_name' : '账户姓名',
  'account_no' : '账户号码',
  'promo_code' : '优惠代码',
  'approve' : '批准',
  'decline' : '拒绝',
  'invalid_telephone' : '无效的电话号码',
  'please_try_again' : '请重试',
  'request' : '请求',
  'required_telephone' : '手机号码必须填写',
  'required_username' : '请填写用户名',
  'active' : '活动', 
  'enter_to_save' : 'Press enter to save.',
  'inactive' : '非活动',
   success : '成功',
  declined : '失败',
  failed : '失败', 
  pending  : '处理中',
  'in' :'转出', 
  'out' : '转入',


}; 


var DEBUG = false;

function redirect(url , closelayer){
  if(closelayer) parent.layer.closeAll();
  if(url.length)window.location.href = url;
}

function u(para){
  log("u: " +  para);
  return typeof para === "undefined";
}
function und(para, d){
  log("und:" + para + " or " + d);
  return typeof para === "undefined" ?  d : para ;
}
function log(string){
  if(DEBUG)console.log(string);
}

function handleResponse(others , param){
    param = und(param , "");
    switch(others){
        case "close_all_layer":
            if(DEBUG)console.log("close_all_layer");
            parent.layer.closeAll();
        break;
        case "close_current_layer":
            if(DEBUG)console.log("close_current_layer");
        break;
        case "close_page":
          if(DEBUG)console.log("close_page");
          parent.location.reload();
        break;
        case "reload_page":
           if(DEBUG)console.log("reload_page");
            parent.location.reload();
        break;
        case 'window':
          if(DEBUG)console.log("handleResponse:window");
          OpenInNewTab(param);
          //parent.window.location = param;
        break;
        case "layer_redirect":
          log("layer_redirect:"  + param);
          parent.$("iframe").attr("src" , param);
        break;

        case "reload_class" :
          $('.' + param).click();
        break;

        case 'reload_id':
             $('#' + param).click();
        break;

        case "layer_reload":
          log("layer_reload");
          if(DEBUG)console.log("handleResponse:"+ parent.$("iframe").attr("src"));
          parent.$("iframe").attr("src", parent.$("iframe").attr("src"));
        break;

        default:
          if(DEBUG)console.log("handleResponse: default");
        break;
    }
}

function OpenInNewTab(url) {
  var win = window.open(url, '_blank');
  win.focus();
}

function m_error2(content , callback){
  var _index = layer.confirm(content, {
    btn:  [ trans('okay') ],
    title: trans('error'),
    skin: 'layui-layer-rim',
    icon : 2
    },function(layero, index){
      log(layero);
      log(index);
      if(typeof callback == "function"){
          log("m_error2 has function");
          if(typeof callback !== "undefined"){
             log("m_error2 has no undefined callback");
             callback();
             layer.close(_index);
          }else{
            log("m_error2 has function and no callback");
            layer.close(_index);
          }
       }else{
        log("m_error2 has no function");
        layer.close(_index);
      }
    });
  log("index_" + _index);
}

function m_error(content){
  layer.alert(content, { title: trans('error'), btn: trans('okay') ,icon: 2,skin: 'layer-ext-moon'});
}
function m_info(content){
  layer.alert(content, {title: trans('information'), btn: trans('okay') ,skin: 'layer-ext-moon'});
}
function m_warning(content){
  layer.alert(content, {title: trans('warning'), btn: trans('okay') ,icon: 0,skin: 'layer-ext-moon'});
}
function m_success(content){
  layer.alert(content, {title: trans('success'), btn: trans('okay') ,icon: 1,skin: 'layer-ext-moon'});
}
function m_question(content){
  layer.alert(content, {title: trans('are_you_sure'), btn: trans('okay') ,icon: 3,skin: 'layer-ext-moon'});
}
function m_lock(content){
  layer.alert(content, {title: trans('cannot_continue'), btn: trans('okay') ,icon: 4,skin: 'layer-ext-moon'});
}
function m_tips(content , theclass){
  layer.tips(content, theclass,{
  tips: 1,
  skin: 'layer-ext-moon'
  });
}
function m_tips2(content , theclass){
  layer.tips(content, theclass,{
  tips: 1,
  time : 5000,tipsMore: false
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
function loading(type){
   type = und(type ,0);
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
    btn: [trans('okay')],
    title: trans('information'),
    skin: 'layui-layer-rim',
    icon : 1
    },function(layero, index){
      if(typeof callback == "function"){
       log("callback");
        callback();
      layer.close(_index);
      }

   layer.close(_index);
    });
}
function m_alert2(content , callback,callback2){
  layer.confirm(content, {
    btn: [trans('okay') , trans('cancel')],
    title: trans('information'),
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
  layer.confirm(trans('confimation_required'), {
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

var language = "cn";


function trans(key){
  key = key.toLowerCase();
  if(typeof translation[key] !== "undefined")
  return translation[key];
  return key;
}