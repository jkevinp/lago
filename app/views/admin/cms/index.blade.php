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
                              <td>
                                  <a href="{{route('cms.delete', $content->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
                                  <a href="{{route('cms.edit', $content->id)}}" class="btn btn-warning"><i class="fa fa-edit"></i> Edit</button>
                              </td>
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