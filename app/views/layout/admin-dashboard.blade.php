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
      <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
          <header class="main-header">
            <a href="#" class="logo">
              <span class="logo-mini"><b>A</b></span>
              <span class="logo-lg"><b>A D M I N</b></span>
            </a>
            <nav class="navbar navbar-static-top" role="navigation">
              <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                <span class="sr-only">Toggle navigation</span>
              </a>
              <!-- Navbar Right Menu -->
              <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">

                  <!-- Notifications Menu -->
                  <li class="dropdown notifications-menu">
                    <!-- Menu toggle button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-bell-o"></i>
                      <span class="label label-warning">10</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="header">You have 10 notifications</li>
                      <li>
                        <!-- Inner Menu: contains the notifications -->
                        <ul class="menu">
                          <li><!-- start notification -->
                            <a href="#">
                              <i class="fa fa-users text-aqua"></i> 5 new members joined today
                            </a>
                          </li><!-- end notification -->
                        </ul>
                      </li>
                      <li class="footer"><a href="#">View all</a></li>
                    </ul>
                  </li>
                  
                  <!-- User Account Menu -->
                  <li class="dropdown user user-menu">
                    <!-- Menu Toggle Button -->
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                      <i class="fa fa-user "></i>
                      <span class="hidden-xs">{{ Auth::user()->username  }}</span>
                    </a>
                    <ul class="dropdown-menu">
                      <li class="user-header">
                        <i class="fa fa-user fa-3x"></i>
                        <p>
                          {{ Auth::user()->username }} [ADMIN]
                          <small></small>
                        </p>
                      </li>
                      <!-- Menu Body -->
                  <!-- <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="#">Followers</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Sales</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Friends</a>
                    </div>
                  </li> -->
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
              <!-- Control Sidebar Toggle Button -->
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <section class="sidebar">
          <div class="user-panel">
            <div class="pull-left image">
              <i class="fa fa-user fa-3x text-white"></i>
            </div>
            <div class="pull-left info">
              <p>{{ Auth::user()->username }}</p>
              <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
          <!-- search form (Optional) -->
          <div class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control searchlinks" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </div>
          <!-- /.search form -->

          <!-- Sidebar Menu -->
             @include('includes.admin.admin-sidebar')
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            @yield('PAGE_TITLE' , '')
            <small>@yield('PAGE_DESC', '')</small>
          </h1>
          <ol class="breadcrumb">
            @if(Route::current()->getName())
            @foreach(explode('.',Route::current()->getName()) as $link)
            <li class="active"><b>{{ ucfirst($link) }}</b></li>
            @endforeach
            @endif
          </ol>
        </section>


        <!-- Main content -->
        <section class="content">
          @yield('content')
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <!-- Main Footer -->
      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          Anything you want
        </div>
        <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Create the tabs -->
        <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
          <li class="active"><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>
          <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content">
          <!-- Home tab content -->
          <div class="tab-pane active" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Recent Activity</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <i class="menu-icon fa fa-birthday-cake bg-red"></i>
                  <div class="menu-info">
                    <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>
                    <p>Will be 23 on April 24th</p>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

            <h3 class="control-sidebar-heading">Tasks Progress</h3>
            <ul class="control-sidebar-menu">
              <li>
                <a href="javascript::;">
                  <h4 class="control-sidebar-subheading">
                    Custom Template Design
                    <span class="label label-danger pull-right">70%</span>
                  </h4>
                  <div class="progress progress-xxs">
                    <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
                  </div>
                </a>
              </li>
            </ul><!-- /.control-sidebar-menu -->

          </div><!-- /.tab-pane -->
          <!-- Stats tab content -->
          <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div><!-- /.tab-pane -->
          <!-- Settings tab content -->
          <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
              <h3 class="control-sidebar-heading">General Settings</h3>
              <div class="form-group">
                <label class="control-sidebar-subheading">
                  Report panel usage
                  <input type="checkbox" class="pull-right" checked>
                </label>
                <p>
                  Some information about this general settings option
                </p>
              </div><!-- /.form-group -->
            </form>
          </div><!-- /.tab-pane -->
        </div>
      </aside><!-- /.control-sidebar -->
      <!-- Add the sidebar's background. This div must be placed
      immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
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
