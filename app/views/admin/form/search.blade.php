
<div class="row mt">
  <div class="col-lg-12">
    <div class="form-panel">
      <h4 class="mb"><i class="fa fa-angle-right"></i>{{$title}}</h4>
        {{Form::open(['route' => 'cpanel.showResults' , 'class' => 'form-inline', 'method' => 'post' , 'role' => 'form'])}}
          <div class="form-group">
            {{Form::hidden('route' , $route)}}
              Keyword: {{Form::text('keyword', null ,['class' => 'form-control'])}}
          </div>
            {{Form::submit('Search' , ['class' => 'btn btn-theme'])}}
          {{Form::close()}}
       </div><!-- /form-panel -->
    </div>
  </div>
