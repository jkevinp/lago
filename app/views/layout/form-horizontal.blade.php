
<div class="intro-header1">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h3><i class="glyphicon glyphicon-fire"></i>@yield('form-title')</h3>
                        <div class="alert alert-warning">@yield('form-help')</div>
                       @yield('form-content')
                        <div class="intro-content" align="center">
                                <div class="btn-group btn-group-justified" role="group" aria-label="...">
                                      <div class="btn-group" role="group">
                                         {{ Form::submit('Submit', array('class' => 'btn btn-primary btn-lg padded-text')) }}
                                      </div>
                                      <div class="btn-group" role="group">
                                             {{ Form::reset('Reset', array('class' => 'btn btn-default btn-lg padded-text')) }}
                                      </div>
                                </div>
                            </div>
                    </div>
                        {{Form::close()}}
                        
                    </div>
                </div>
            </div>
        </div>
    </div>