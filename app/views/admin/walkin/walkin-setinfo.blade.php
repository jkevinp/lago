@extends('layout.admin-dashboard')

@section('header')
<link rel="stylesheet" type="text/css" media="all"
      href="{{URL::asset('default')}}/js/ui/jquery-ui.min.css"  />
@stop
@section('content')
	@include('admin.walkin.walkin-form-date')
@stop
@section('script')
   <script src="{{URL::asset('default')}}/js/admin-walkin.js"></script>
@stop