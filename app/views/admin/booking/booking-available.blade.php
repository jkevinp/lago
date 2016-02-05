@extends('layout.admin-dashboard')

@section('content')
  <div class="row mt">

        <div class="col-md-12 content-panel">
                <table class="table table-striped table-advance table-hover">
                  <h4><i class="fa fa-angle-right"></i> Available Products
                    <span class="badge">
                      @if(count($products) == 0)
                        No records found
                        @else
                          {{count($products)}} record found.
                      @endif
                    </span>
                  </h4>
                  <hr>
                    <thead>
                      <tr>
                       <th><i class="fa fa-bookmark"></i> Product Name</th>
                        <th><i class="fa fa-bullhorn"></i> Day Rate</th>
                        <th class="hidden-phone"><i class="fa fa-question-circle"></i> Night Rate</th>
                        <th><i class="fa fa-bookmark"></i> Overnight Rate</th>
                        <th><i class="fa fa-bookmark"></i> Extension Price</th>
                        <th></th>
                    </tr>
                    </thead>
                    @foreach($products as $p)
                    <tbody>
                    <tr>
                        <td>{{$p->productname}}</td>
                        <td>{{$p->productprice}}</td>
                        <td>{{$p->nightproductprice}}</td>
                        <td>{{$p->overnightproductprice}}</td>
                        <td>{{$p->extensionproductprice}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
        </div><!-- /col-md-12 -->
    </div><!-- /row -->
@stop