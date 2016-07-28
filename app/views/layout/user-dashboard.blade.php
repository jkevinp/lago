<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{  APP_NAME }}</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
   <script type="text/javascript">
      var csrf_token = '{{ csrf_token() }}';
  </script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <link href="{{ asset('default/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('default/css/AdminLTE.min.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/css/jquery.dataTables.min.css">
  <link rel="stylesheet" href="{{ asset('default/plugins/daterangepicker/daterangepicker-bs3.css') }}">
  <link rel="stylesheet" href="{{ asset('default/css/skins/skin-purple.min.css') }}">
  <link rel="stylesheet" href="{{ asset('default/css/selectize.css') }}">




  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

      </head>
      <body class="hold-transition skin-purple  fixed sidebar-mini">
        <div class="wrapper">
          <header class="main-header">
            <a href="/" class="logo">
              <span class="logo-mini"><b>A</b></span>
              <span class="logo-lg"><b>USER PANEL</b></span>
            </a>
            <nav class="navbar navbar-static-top">
              <div class="container">
                <div class="navbar-header">
        
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                  </button>
                </div>

           
              <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                @include('includes.default.user-dashboard-topbar')
              </div>
            </div>
          </nav>
        </header>


        <aside class="main-sidebar">
            <section class="sidebar">
                @include('includes.default.user-dashboard-sidebar')
            </section>
        </aside>


        <div class="content-wrapper">
          <div class="">
            <section class="content-header">
              <ol class="breadcrumb">
                @if(Route::current()->getName())
                @foreach(explode('.',Route::current()->getName()) as $link)
                <li class="active"><b>{{ ucfirst($link) }}</b></li>
                @endforeach
                @endif
              </ol>
            </section>
            <section class="content">
              <br/>
              @yield('content')
            </section>
          </div>
        </div>

        <!-- Main Footer -->
        <footer class="main-footer">
          <div class="pull-right hidden-xs">
            Anything you want
          </div>
          <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
        </footer>

      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->
    
    <script src="{{ asset('default/js/columns.js') }}"></script>
    <script src="{{ asset('default/js/jquery.min.js') }}"></script>
    <script src="{{ asset('default/js/app.js') }}"></script>
    <script src="{{ asset('default/js/app.min.js') }}"></script>

    <script src="{{ asset('default/js/layer.js') }}"></script>
    <script src="{{ asset('default/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('default/js/Validation.js') }}"></script>
    <script src="{{ asset('default/js/app-layer.js') }}"></script>
    <script src="{{ asset('default/js/MessageHelper.js') }}"></script>
    <script src="{{ asset('default/js/selectize.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.4/js/jquery.dataTables.min.js"></script> 
    <script src="{{ asset('default/plugins/daterangepicker/daterangepicker.js') }}"></script>
    <!-- SlimScroll -->
    <script src="{{ asset('default/plugins/slimScroll/jquery.slimscroll.min.js') }}"></script>
    <!-- FastClick -->
    <script src="{{ asset('default/plugins/fastclick/fastclick.min.js') }}"></script>
    <script src="{{ asset('default/js/clipboard.min.js') }}"></script>
    <script src="{{ asset('default/js/datatable.js') }}"></script>
   
    <script type="text/javascript">
    $(document).ready(function () {
           initdatatable();
           initSearch();
    });
    </script>
    @if(Session::get('top-menu'))
    <script type="text/javascript">
      $('{{ Session::get("top-menu")}}').addClass("active");
    </script>
    @endif
    @if(Session::get('top-menu'))
    {{ Session::get("top-menu")}}
    @endif  
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

    @yield("scripts")
    @yield("script")



  </body>
  </html>
