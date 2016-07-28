var COLUMNS_DEPOSIT = [

  { "data": "created_at" },
  { "data": "reference" },
  { "data": "member" },
  { "data": "depositor" },
  { "data": "bankrecipient.account_number" },
  { "data": "bankrecipient.account_name" },
  { "data": "amount" },
  { "data": "balance_on_deposit" },
  { "data": "status" },
  { "data": "modified_by" },
];
var  ADMIN_DEF_PAYMENT = [];

var COLUMNS_PAYMENT = [

  { "data": "created_at" },
  { "data": "reference" },
  { "data": "member" },
  { "data": "gateway.name" },
  { "data": "gateway_reference" },
  { "data": "promo_code" },
  { "data": "amount" },
  { "data": "status" },
  { "data": "modified_by" },
  { "data": "updated_at" },
];


var ADMIN_DEF_DEPOSIT = [
  {
  "render": function ( data, type, row ) {
      return '<a href="#"  data-type="2" class="tipdata clipboard tips layer-opener" data-w="900px" data-h="240px" data-href="'+  window.location.origin +"/admin/transactions/changeStatus/" + data +'" data-tip="Copied" data-clipboard-text="'+  data +'" >' + data + "</a>";
  },"targets": 1
  },
            { "visible": false,  "targets": [ 3 ] },
        {
            "render": function ( data, type, row ) {
                return '<a data-href="'+  window.location.origin + '/admin/members/details/'+ data + '" data-type="2" class="layer-opener" data-w="900px" data-h="600px" data-clipboard-text="'+  data +'" >' + data + "</a>";
            },
            "targets": 2,
        },
        {
  "render": function ( data, type, row ) {
  return '<label class="label-status">' + data + '</label>';
},
"targets": 8
}];



var COLUMNS_WITHDRAW = [
   { "data" : 'created_at' },
   { "data" : 'reference' },
   { "data" : 'member' },
   { "data" : 'amount' },
   { "data" : 'status' },
   { "data" : 'modified_by' },
];

var ADMIN_DEF_WITHDRAW = [
{
"render": function ( data, type, row ) {
 return '<a href="#"  data-type="2" class="tipdata clipboard tips layer-opener" data-w="900px" data-h="240px" data-href="'+  window.location.origin +"/admin/transactions/changeStatus/" + data +'" data-tip="Copied" data-clipboard-text="'+  data +'" >' + data + "</a>";
},
"targets": 1
},
{
"render": function ( data, type, row ) {
return '<a data-href="'+  window.location.origin + '/admin/members/details/'+ data + '" data-type="2" class="layer-opener" data-w="900px" data-h="600px" data-clipboard-text="'+  data +'" >' + data + "</a>";
},
"targets": 2,
},
{
"render": function ( data, type, row ) {
return '<label class="label-status">' + data + '</label>';
},
"targets": 4
}];

var DEF_PAYMENT = [];
var DEF_TRANSFER =[];

var COLUMNS_MEMBER_PAYMENT = [

  { "data": "created_at" },
  { "data": "reference" },
  { "data": "member" },
  { "data": "gateway.name" },
  { "data": "gateway_reference" },
  { "data": "promo_code" },
  { "data": "amount" },
  { "data": "status" },
  { "data": "updated_at" },
];



var COLUMNS_MEMBER_DEPOSITS =[

  { "data": "created_at" },
  { "data": "reference" },
  { "data": "depositor" },
  { "data": "bankrecipient.account_number" },
  { "data": "bankrecipient.account_name" },
  { "data": "amount" },
  { "data": "status" },
  { "data": "updated_at" },
];

var COLUMNS_MEMBER_TRANSACTION = 
[

  { "data": "created_at" },
  { "data": "reference" },
  { "data": "transaction"},
  { "data": "amount" },
  { "data": "status"},

];
var COLUMNS_PROFILEUPDATE = 
[
  { "data": "username" },
  { "data": "realname"},
  { "data": "gender" },
  { "data": "qq"},
  { "data": "telephone" },
  { "data": "email" },
  { "data": "status" },
  { "data": "updated_at" },
];

var COLUMNS_ANNOUCEMENT = 
[
  { "data": "category" },
  { "data": "title"},
  { "data": "text" },
  { "data": "status"},
  { "data": "visible_from" },
  { "data": "visible_to" },
  { "data": "updated_at" },

];


var COLUMNS_TRANSACTION = [
  { "data": "created_at" },
  { "data": "reference" },
  { "data": "member" },
  { "data": "transaction" },
  { "data": "agent_path" },
  { "data": "amount" },
  { "data": "summary" },
  { "data": "action_by" },
];

var COLUMNS_TRANSFER = [
  { "data": "reference" },
  { "data": "amount" },
  { "data": "platform.name" },
  { "data": "status" },
  { "data": "created_at" },
];
var COLUMNS_MEMBER_TRANSFER = [

  { "data": "created_at" },
  { "data": "reference" },
  { "data": "amount" },
  { "data": "platform.name" },
  { "data": "status" },
];

var COLUMNS_AGENT = [
    {"data" : 'parent_agent' },
    {"data" : 'username' },
    {"data" : 'realname',},
    {"data" : 'qq_number'},
    {"data" : 'status'},
    {"data" : 'password_encrypted'},
  ];


  var COLUMNS_AGENTLIST = [

    {"data" : 'username' },
    {"data" : 'agents.username' },
    {"data" : 'path' },
    {"data" : 'realname',},
    {"data" : 'qq_number'},
    {"data" : 'status'},
    {"data" : 'created_on'},
  ];

var COLUMNS_AGENTMARKETCODE = [
		{ "data" : 'agent_id' },
		{ "data" : 'marketing_code' },
		{ "data" : 'callback'},

		];
var COLUMNS_AGENTHOST = [
	{	"data" : 'agent_id' },
	{	"data" : 'hostname' },

];


var COLUMNS_MEMBER_WITHDRAW = [

   { "data" : 'created_at' },
   { "data" : 'reference' },
   { "data" : 'amount' },
   { "data" : 'status' },
   { "data" : 'updated_at' },
];

var COLUMNS_PLATFORM = [
   { "data" : 'id' },
   { "data" : 'name' },
   { "data" : 'status' }
];

function getCol(c){
	return window[c];
}

var DEF_DEPOSIT = [
  {
  "render": function ( data, type, row ) {
      return '<a href="#"  data-type="2" class="tipdata clipboard tips layer-opener" data-w="900px" data-h="600px" data-href="'+  window.location.origin +"/admin/transactions/changeStatus/" + data +'" data-tip="Copied" data-clipboard-text="'+  data +'" >' + data + "</a>";
  },"targets": 0
  },
            { "visible": false,  "targets": [ 3 ] },
        {
            "render": function ( data, type, row ) {
                return '<a data-href="'+  window.location.origin + '/admin/members/details/'+ data + '" data-type="2" class="layer-opener" data-w="900px" data-h="600px" data-clipboard-text="'+  data +'" >' + data + "</a>";
            },
            "targets": 1,
        },
        {
"render": function ( data, type, row ) {
return '<label class="label-status">' + data + '</label>';
},
"targets": 8
},];

var DEF_WITHDRAW = [
{
"render": function ( data, type, row ) {
 return '<a href="#"  data-type="2" class="tipdata clipboard tips layer-opener" data-w="900px" data-h="600px" data-href="'+  window.location.origin +"/admin/transactions/changeStatus/" + data +'" data-tip="Copied" data-clipboard-text="'+  data +'" >' + data + "</a>";
            
},
"targets": 0
},
{
"render": function ( data, type, row ) {
return '<a data-href="'+  window.location.origin + '/admin/members/details/'+ data + '" data-type="2" class="layer-opener" data-w="900px" data-h="600px" data-clipboard-text="'+  data +'" >' + data + "</a>";
},
"targets": 1,
},
{
"render": function ( data, type, row ) {
return '<label class="label-status">' + data + '</label>';
},
"targets": 4
}];

var DEF_AGENTS = [
{
"render": function ( data, type, row ) {
return '<a href="'+  window.location.origin + '/admin/agents/details/'+ data + '" data-type="2" class="" target="_blank" data-w="900px" data-h="600px" data-clipboard-text="'+  data +'" >' + data + "</a>";

},
"targets": 0
},

{
"render": function ( data, type, row ) {

return '<a href="'+  window.location.origin + '/admin/agents/details/'+ data + '" data-type="2" class="" target="_blank" data-w="900px" data-h="600px" data-clipboard-text="'+  data +'" >' + data + "</a>";
},
"targets": 1,
},
{
"render": function ( data, type, row ) {
return '<label class="label-status">' + data + '</label>';
},
"targets": 5
},

{
"render": function ( data, type, row ) {
return '<label class="" contenteditable="true" data-model="agent_repo" data-id="' + row.id + '" data-field="realname">' + data + '</label>';
},
"targets": 3,
},

{
"render": function ( data, type, row ) {
return '<label class="" contenteditable="true" data-model="agent_repo" data-id="' + row.id + '" data-field="qq_number">' + data + '</label>';
},
"targets": 4,
},


];

var DEF_PLATFORM = [{
            "render": function ( data, type, row ) {
               return '<a data-href="'+  window.location.origin + '/admin/system/platforms/details/'+ data + '" data-type="2" class="layer-opener" data-w="350px" data-h="225px">' + data + "</a>";
            },
            "targets": 1
        },
        {
        "render": function ( data, type, row ) {
        return '<label class="label-status">' + data + '</label>';
        },
        "targets": 2
        }];

var DEF_ANNOUNCEMENT =[
        {
        "render": function ( data, type, row ) {
        return '<label class="label-status">' + data + '</label>';
        },
        "targets": 3
        },

        {
        "render": function ( data, type, row ) {
        return '<label class="" contenteditable="true" data-model="announcement" data-id="' + row.id + '" data-field="title">' + data + '</label>';
        },
        "targets": 1
        },
        {
        "render": function ( data, type, row ) {
        return '<label class="" contenteditable="true" data-model="announcement" data-id="' + row.id + '" data-field="text">' + data + '</label>';
        },
        "targets": 2
        }

        // data-id="<% $config->id %>" contenteditable="true" data-model="systemconfig" data-route="<% route('admin.inlineedit') %>" data-field="value"
];

var DEF_PROFILEUPDATE = [
  {
            "render": function ( data, type, row ) {
                 return '<a data-href="'+  window.location.origin + '/admin/profileupdate/details/'+ row.id + '" data-type="2" class="label-status layer-opener" data-w="350px" data-h="400px" data-clipboard-text="'+  data +'" >' + data + "</a>";
           },
            "targets": 6
        },
        {
            "render": function ( data, type, row ) {
                return '<label class="label-status">' + data + '</label>';  ;
        },"targets": 6
        },
];

var DEF_U = [
  {
            "render": function ( data, type, row ) {
                return '<a href="#"  class="tipdata clipboard tips" data-tip="Copied" data-clipboard-text="'+  data +'" >' + data + "</a>";
            },
            "targets": 0
        },
        {
            "render": function ( data, type, row ) {
                return '<a data-href="'+  window.location.origin + '/admin/members/details/'+ data + '" data-type="2" class="layer-opener" data-w="900px" data-h="600px" data-clipboard-text="'+  data +'" >' + data + "</a>";
            },
            "targets": 1
        },
];
// The `data` parameter refers to the data for the cell (defined by the
// `data` option, which defaults to the column being worked with, in
// this case `data: 0`.