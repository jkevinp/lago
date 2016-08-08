<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{APP_NAME}} - Admin Dashboard</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="{{ asset('admin-assets/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('admin-assets/css/AdminLTE.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('admin-assets/plugins/datatables/dataTables.bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-assets/css/skins/skin-blue.min.css') }}">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
      </head>

      <body class="">
        <section class="content">
          @yield('content')
        </section><!-- /.content -->
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->

    
    <script src="{{ asset('default/js/jquery.min.js') }}"></script>
    <script src="{{ asset('admin-assets/js/app.min.js') }}"></script>
    <script src="{{ asset('default/js/layer.js') }}"></script>
    <script src="{{ asset('default/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('default/js/app.js') }}"></script>
    <script src="{{ asset('default/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('default/js/app-layer.js') }}"></script>
    <script src="{{ asset('default/js/MessageHelper.js') }}"></script>
     <script src="{{ asset('default/js/datatable.js') }}"></script>

    <script src="{{ asset('default/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('default/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('default/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('default/plugins/fastclick/fastclick.min.js') }}"></script>
    <script>
      $(function () {
         $('.table').DataTable();
        //initdatatable();
        $('.mt').removeClass("mt").addClass("box box-primary");

       
        $('.searchlinks').keyup(function(e){

           var all = $('#sidebar-menulink').find("li");
           var me = $(this).val().toLowerCase();
           if(me.length == 0){
              all.fadeIn(0);
           }else{
            all.fadeOut(0);
            all.each(function(i, o ){
             
              var t = $(o).text().toLowerCase().trim();
              if(t.indexOf(me) > -1){
                  $(o).fadeIn(0);
              }
            });
            }
        });
      });
    </script>
    @if(isset($errors) && $errors->first())
    <script type="text/javascript">
      $(document).ready(function(){
        m_error("{{ $errors->first }}");
      });
    </script>
    @endif
    @if(Session::get('flash_message'))
    <script type="text/javascript">
      $(document).ready(function(){
        m_info("{{ Session::get('flash_message') }}");
      });
    </script>
    @endif

    
  </body>
  </html>
