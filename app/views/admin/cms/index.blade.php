@extends('layout.admin-dashboard')

@section('content')
@foreach($contenttype as $type)
<div class="row mt">
            <div class="col-md-12">
              <div class="content-panel">
                <h4>{{ucfirst($type->contentkey)}} <i class="fa fa-angle-right"></i><i class="fa fa-angle-right"></i> {{ucfirst($type->contentvalue)}}
                  <span class="badge badge-theme ">
                    {{count($type->sitecontents)}}
                  </span>
                </h4>
                  <div class="panel-body">
                    <div  class="col-sm-12" >
                        <table class="table table-bordered">
                          <thead>
                            <tr> 
                              <th>Title</th>
                              <th>Content</th>
                              <th>Media</th>
                              <th>Order</th>
                              <th>Actions</th>
                            </tr>
                          </thead>
                            <tbody>
                              @foreach($type->sitecontents as $content)
                               <tr> 
                              <td>{{$content->title}}</td>
                              <td>{{$content->value}}</td>
                              <td>{{$content->media}}</td>
                              <td>{{$content->orderposition}}</td>
                              <td>Departure</td>
                            </tr>
                              @endforeach
                            
                            </tbody>
                        </table>
                     </div>
                  </div>
              </div>
            </div>
          </div>
@endforeach
@stop

@section('script')
@stop