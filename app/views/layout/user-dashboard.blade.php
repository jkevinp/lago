<!doctype html>
<html>
<head>
    @yield('header')
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Sunrock</title>
    <link rel="shortcut icon" href="{{ asset('default') }}/img/icons/favicon.ico">
    <link href="{{URL::asset('default')}}/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{URL::asset('default')}}/css/landing-page.css" rel="stylesheet">
    <link href="{{URL::asset('default')}}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('default')}}/css/lightbox.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{URL::asset('default')}}/css/sb-admin.css" rel="stylesheet">
    <!-- Morris Charts CSS -->
    <link href="{{URL::asset('default')}}/css/plugins/morris.css" rel="stylesheet">
    <!-- Custom Fonts -->
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
     <div id="wrapper">
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
             <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{URL::route('account.dashboard' ,[])}}">
                    <i class="glyphicon glyphicon-user"></i>
                    User dashboard
                </a>
            </div>
            @include('includes.default.user-dashboard-topbar')
            @include('includes.default.user-dashboard-sidebar')
        </nav>
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard 
                                    @if(isset($action))
                                        
                                          > {{$action}}
                                    @endif
                            </li>
                        </ol>
                    </div>
                </div>
                    @yield('content')
            </div>
        </div>
        @include('includes.default.footer-script')
        
         @include('includes.default.footer-modal')
         @yield('script')
</body>
</html>
