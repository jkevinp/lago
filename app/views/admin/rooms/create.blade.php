@extends('layout.template')


@section('content')

<br/><br/><br/><br/>
{{Form::open(array('route' => 'cpanel.rooms.store','role'=>'form','files'=> true , 'method' => 'post'))}}
{{ Form::file('image') }}
{{Form::submit('Upload Image')}}
{{ Form::close() }}

@stop