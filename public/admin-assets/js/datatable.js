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
                if($('.serverside.table').data("date"))
                d.date = $('.serverside.table').data("date");
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
                if($('.serverside.table').data("date"))d.date = $('.serverside.table').data("date");
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
                            if($(object).data("date"))d.date = $(object).data("date");
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

function initdate(){
    if(typeof moment !== "undefined"){
          var daterangepicker =  $('#daterange-btn').daterangepicker({
        ranges: {
          'Today': [moment(), moment()],
          'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
          'Last 7 Days': [moment().subtract(6, 'days'), moment()],
          'Last 30 Days': [moment().subtract(29, 'days'), moment()],
          'This Month': [moment().startOf('month'), moment().endOf('month')],
          'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        },
        startDate: moment().subtract(29, 'days'),
        endDate: moment()
      },function (start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        var _start = start.format("YYYY-M-D H:m:s");
        var _end =   end.format("YYYY-M-D H:m:s");

        var _startdate =  Date.parse(_start) / 1000;
        var _enddate   =  Date.parse(_end) / 1000;
        $('.serverside.table').data("startdate" , _startdate);
        $('.serverside.table').data("enddate" , _enddate);

        var _start1 = start.format("YYYY-MM-DD");
        var _end1 =   end.format("YYYY-MM-DD");
        var datee =   _start1  + "," + _end1;

        $('.serverside.table').data("startdate" , _start1);
        $('.serverside.table').data("enddate" , _end1);
        $('.serverside.table').data("date" , datee);
        console.log(_startdate);
        console.log(_enddate);

        if(datatable) if(datatable.ajax)datatable.ajax.reload();

        if(datatables){
          console.log(datatables);
          $.each(datatables , function(index, object){
            object.ajax.reload();
          });
        }
      });

     }
}