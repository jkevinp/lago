@extends('layout.admin-dashboard')

@section('content')
        <div class="row mt">
                  <div class="col-md-12">
                          <h3>> {{$title}} </h3>
                          <div class="showback">
                            @include('admin.tables.account-info')
                            @include('admin.tables.booking-list')
                            @include('admin.tables.transaction-list')
                            <a href="{{ URL::previous()}}"  class="btn btn-success btn-xs"><i class="fa fa-arrow-left"></i>Back</a>
                              
                          </div>
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->


@stop