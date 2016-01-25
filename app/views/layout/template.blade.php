<!doctype html>
<html>
<head>
	@yield('header')
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
	<title>{{APP_NAME}}</title>
    <link rel="shortcut icon" href="{{ asset('default') }}/img/icons/favicon.ico">
    <link href="{{URL::asset('default')}}/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="{{URL::asset('default')}}/css/landing-page.css" rel="stylesheet"> -->
    <link href="{{URL::asset('default')}}/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('default')}}/css/lightbox.css" rel="stylesheet">
    <link href="{{URL::asset('default')}}/css/custom.css" rel="stylesheet">
    
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<section class="header">
@yield('header')
    @include('includes.default.header')
</section>
<div class="col-md-10 col-md-offset-1">
@yield('content')
</div>

<section>
@include('includes.default.footer')
@yield('footer')
</section>


@yield('script')
</body>
</html>