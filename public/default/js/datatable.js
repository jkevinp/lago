var datatable;
var datatables = [];
$(document).ready(function(event){


     $('.label-status').each(function(index,object){
        var _text = $(object).text().toLowerCase();
        if(_text == "pending" || _text == "requested"){
          $(object).addClass("label label-warning");
        }else if(_text == "approved" || "active"){
          $(object).addClass("label label-success");
        }else{
          $(object).addClass("label label-danger");
        }
     });
});
function initadmindatatable(){
    if($('.table.datatable').not(".serverside").length){
        datatable = $('.datatable').not(".serverside").DataTable(); 
    }

// $(document).ready(function() {
// var oTable = $('#test').dataTable( {
// "bPaginate": true,
// "bLengthChange": true,
// "bFilter": true,
// "bSort": true,
// "bInfo": true,
// "bAutoWidth": true } );

// } );
        datatable = $('.serverside.table').DataTable({
        serverSide : true,
        processing : true,
        destroy: true,
        columns    : getCol($('.serverside.table').data("c")),
        columnDefs : getCol($('.serverside.table').data("d")),
        ajax : { 
            url : $('.serverside.table').data("ajax"),
            type : 'POST',
            data : function(d){ 
                d._token= csrf_token;
                d.startdate = $('.serverside.table').data("startdate");
                d.enddate = $('.serverside.table').data("enddate");
            },
            dataType : "json"
        },
        initComplete : function(settings, json){
            label();
        }
    });



}

function initdatatable(){
    if($('.table.datatable').not(".serverside").length){
        datatable = $('.datatable').not(".serverside").DataTable(); 
    }

    console.log("serverside table length:" + $('.serverside.table').length);

    if($('.serverside.table').length == 1 ){
        console.log("table serverside =1");
        datatable = $('.serverside.table').DataTable({
        serverSide : true,
        processing : true,
            destroy: true,
        columns    : getCol($('.serverside.table').data("c")),
        columnDefs : getCol($('.serverside.table').data("d")),
        ajax : { 
            url : $('.serverside.table').data("ajax"),
            type : 'POST',
            data : function(d){ 
                d._token= csrf_token;
                d.startdate = $('.serverside.table').data("startdate");
                d.enddate = $('.serverside.table').data("enddate");
            },
            dataType : "json"
        },
        initComplete : function(settings, json){
            label();
        }
    });
    }
    else if ($('.serverside.table').length >= 2 )
    {
        console.log("table serverside greater than 2");
        $('.serverside.table').each(function(index, object){ 
            console.log(object);
            var temp = $(object).DataTable({
                    serverSide : true,
                    processing : true,
                    columns    : getCol($(object).data("c")),
                    columnDefs : getCol($(object).data("d")),
                    ajax : { 
                        url : $(object).data("ajax"),
                        type : 'POST',
                        data : function(d){ 
                            d._token= csrf_token;
                            d.startdate = $(object).data("startdate");
                            d.enddate = $(object).data("enddate");
                        },
                        dataType : "json"
                    }
                });
            datatables.push(temp);
        });
    }

}
function initSearch(){
    console.log("init search");
    $('.serverside.table').on('click', 'td', function () {
        var data = table.row( this ).data();
        alert( 'You clicked on '+data[0]+'\'s row' );
    });

        if($('.serverside.table').length >= 2 ){

               $('.serverside.table input').each(function(index , object)
               {
                    $(object).find("input").unbind();
                    $(object).find("input").on('keyup','input', function(e) {
                        if(e.keyCode == 13) {
                            alert(1);
                            datatable.fnFilter(this.value);    
                        }
                    });  
               }); 
               
        }else{
            $('.dataTables_filter').find("input").unbind();
            $('.dataTables_filter').find("input").on('keyup', function(e) {
                if(e.keyCode == 13) {
                  
                    datatable.search(this.value) .draw();
                }
            }); 
        }
}
function destroydatatable(){
    if(datatable)datatable.destroy();
}
function label(){

        
    $('.label-status').each(function(index,object){
        var _text = $(object).text().toLowerCase();
        console.log($(object));
        if(_text == "pending" || _text == "requested"){
          $(object).addClass("label label-warning");
        }else if(_text == "approved" || "active"){
          $(object).addClass("label label-success");
        }else{
          $(object).addClass("label label-danger");
        }
     });
}
