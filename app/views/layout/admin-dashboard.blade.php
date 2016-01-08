<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

    <title>Sunrock - Admin Dashboard</title>
    <link rel="shortcut icon" href="{{ asset('default') }}/img/icons/favicon.ico">
    <!-- Bootstrap core CSS -->
    <link href="{{URL::asset('default')}}/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="{{URL::asset('default')}}/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{URL::asset('default')}}/js/gritter/css/jquery.gritter.css" />   
    <!-- Custom styles for this template -->
    <link href="{{URL::asset('default')}}/css/style.css" rel="stylesheet">
    <link href="{{URL::asset('default')}}/css/style-responsive.css" rel="stylesheet">
    <link href="{{URL::asset('default')}}/css/lightbox.css" rel="stylesheet">
   
    @yield('header')
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <section id="container" >
        @include('includes.admin.admin-header')
        @include('includes.admin.admin-sidebar')
        <section id="main-content">
            <section class="wrapper">
        		<div class="row mt">
        			<div class="col-lg-12 col-md-6 col-sm-12">
        				  @yield('content')
        			</div>
        		</div>
            </section>
    </section>
        @include('includes.admin.admin-footer')
    </section>
    @include('includes.admin.admin-footer-script')
    @if(isset($errors) && ($errors->first()))
      <script type="text/javascript">
        var x= "{{$errors->first()}}";
        if(x !== "")
        {
             $(document).ready(function () {
          var unique_id = $.gritter.add({
            title: '<font color="red">Error!</font><hr>',
            text: x,
            image: '{{URL::asset("default/img/icons/")}}/close.png',
            sticky: false,
            time: '',
            class_name: 'my-sticky-class'
            });
        });
        }
       
    </script>
    @endif

     @if(Session::get('flash_message'))
        <script type="text/javascript">
        var xx= "{{Session::pull('flash_message')}}";
        $(document).ready(function () {
          var iunique_id = $.gritter.add({
            title: '<font color="yellow">Notification</font><hr>',
            text: xx,
            image: '{{URL::asset("default/img/icons/")}}/notification.png',
            sticky: false,
            time: '',
            class_name: 'my-sticky-class'
            });
        });
    </script>
    @endif

     <script>
       $(document).ready(function () {
           $('select.styled').customSelect();
        });
    </script>

    @yield('script')
  </body>
</html>
