<div class="col-md-12 topbar">
    <div class="col-md-3 col-md-offset-3">
      <img src="{{URL::asset('media/photos/Logo.png')}}" style="height:60px;float:left;margin-top:20px;" />
    </div>
    <div class="col-md-5 header-right">
      <ul style="margin-top:15px;">
          <li> 
              <a href="{{route('static.reservenow')}}"><i class="fa fa-calendar fa-fw"></i>Reserve Now</a>
          </li>
          <li> 
              <a href="#" data-toggle="modal" data-target="#reservationModal" data-whatever=""><i class="fa fa-book fa-fw"></i> Reservation List</a>
          </li>
          <li>
              @if(Auth::user())
              <a href="{{URL::action('account.dashboard')}}"><i class="fa fa-fire" aria-hidden="true"></i>Dashboard</a>
              <a href="{{URL::action('account.logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a>
              @else
              <a href="{{URL::action('account.login')}}"><i class="fa fa-sign-in" aria-hidden="true"></i>Login</a>
              @endif
          </li>
      </ul>
    </div>
</div>

  <div class="col-md-12 header-base">
      <div class="">
          <div class="col-md-8 col-md-offset-2">
              <ul class="main-menu">
                <li> 
                    <a href="{{route('static.home')}}"><i class="fa fa-home fa-fw"></i>Home</a>
                </li>
                <li>
                    <a href="{{URL::action('static.about')}}"><i class="glyphicon glyphicon-pencil" aria-hidden="true"></i> About Us</a>
                </li>
                <li>
                    <a href="{{URL::action('static.explore')}}"><i class="fa fa-list" aria-hidden="true"></i> Gallery</a>
                </li>
                <li>
                    <a href="{{URL::action('static.roomscottages')}}"><i class="fa fa-building" aria-hidden="true"></i> Rooms & Cottages</a>
                </li>
                <li>
                    <a href="{{URL::action('static.rates')}}"><i class="fa fa-money" aria-hidden="true"></i> Rates</a>
                </li>

                <li>
                    <a href="#" data-toggle="modal" data-target="#contactModal" data-whatever=""><i class="glyphicon glyphicon-phone-alt" aria-hidden="true"></i> Contact</a>
                </li>
             
            </ul>
          </div>
        
      </div>
  </div>

    <!-- Modal Send Inquiry -->
    <div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="contactModal" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            {{Form::open(['route' => 'guest.mail.create' , 'method' => 'post'])}}
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="contactModalLabel">Contact Us</h4>
              For urgent matters, please call or text  <br/>
                        @foreach(SiteContents::where('title' , 'phone')->get() as $v)
                            <p><i class="fa fa-phone"></i>  {{$v->value}}</p>
                        @endforeach

                        @foreach(SiteContents::where('title' , 'name')->get() as $v)
                            <p><i class="fa fa-user"></i> Look for: {{$v->value}}</p>
                        @endforeach
                        
                        @foreach(SiteContents::where('title' , 'email')->get() as $v)
                            <p><i class="fa fa-google"></i> Email: {{$v->value}}</p>
                        @endforeach
         
          </div>
          <div class="modal-body">
              <div class="form-group">
                {{Form::text('sendername', null, ['class' => 'form-control' ,'placeholder' => 'Fullname'])}}
                {{Form::hidden('receiveremail' , SiteContents::where('title' , 'email')->first()->value)}}
                {{Form::hidden('receivername' ,  'System')}}
                {{Form::hidden('subject' ,'Message[Via Contact]')}}
              </div>
              <div class="form-group">
                 {{Form::email('senderemail' , null ,['class' => 'form-control' ,'style' => 'height:34px', 'placeholder' => 'Your Email Address'])}}
              </div>
              <div class="form-group">
                <label for="message-text" class="control-label">Concern</label>
                  {{Form::textarea('message' , null , ['class' => 'form-control'])}}
              </div>
          </div>
          
          <div class="modal-footer">
         
            
            {{Form::Submit('Send' , ['class' => 'btn btn-primary'])}}
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            {{Form::Close()}}
          </div>
        </div>
      </div>
    </div>
     <!-- Modal Reservation -->
    <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="reservationModalLabel">My Reservation List</h4>
            <h5>
              <div class="row">
                  <div class='col-md-6'>
                    @if(Session::get('email'))
                    E-mail Address: <b>{{Session::get('email')}}</b><br/>
                    @elseif (Session::get('account_info')['email'])
                    E-mail Address: <b>{{Session::get('account_info')['email']}}</b><br/>
                    @endif
                    @if(Session::get('date_info'))
                      Children/Adult Count: <b>{{isset(Session::get('date_info')['children']) ? Session::get('date_info')['children'] : 0}}</b><br/>
                      Senior Citizen Count: <b>{{isset(Session::get('date_info')['adult'])    ? Session::get('date_info')['adult'] : 0}}</b> <br/>
                      Total Duration: <b>{{Session::get('date_info')['lenofstay'] * 24}} hours.</b>
                      <br/>Mode: <b>{{Session::get('date_info')['modeofstay']}}</b>
                   
                    @endif


                  </div>
                  <div class='col-md-6'>
                    @if(Session::get('date_info'))
                        Arrival : <b>{{Session::get('date_info')['start']}}</b> <br/>
                        Departure: <b>{{Session::get('date_info')['end']}} </b><br/>
                        @if (Session::get('totalFee'))
                          Total Fee:<b> {{number_format(Session::get('totalFee'),2)}}</b><br/>
                        @endif
                    @endif

                  </div>
              </div>
              @if(Session::get('date_info'))
              <div align="right">
              <a href="{{route('static.reservenow')}}" class="btn btn-default"><i class="fa fa-edit"></i> Edit</a>
              <a href="{{route('book.removeAllItems')}}" class="btn btn-danger"><i class="fa fa-refresh"></i> Reset</a>
              <a href="{{route('book.index')}}" class="btn btn-primary"><i class="fa fa-plus"></i> Add items</a>
            </div>
              @endif
            </h5>
          </div>
          <div class="modal-body">
         
          <?php $totalCapacity  = 0;
                $roomcounter = 0; 
          ?>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
                     @if((Session::get('items')))
                      <?php $ctr = 0;?>
                        @foreach (Session::get('items') as $i)
                        <?php 
                            if(isset($i['paxmax'])){ 
                              $totalCapacity += $i['paxmax'] * $i['quantity'];
                              if($i['paxmax'] != 0)$roomcounter += 1; 
                            }

                          ?>
                              <div class="">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h5 class="panel-title">
                                    <a data-toggle="collapse" class="list-group" data-parent="#accordion" href="#collapse{{$ctr}}" aria-expanded="false" aria-controls="collapse{{$ctr}}">
                                          
                                          <span class="list-group-item">
                                            <span>{{$i['product']}} 
                                                <span class="badge">
                                                    {{$i['quantity']}}
                                                </span>
                                                <span>
                                                    PHP : {{ number_format($i['quantity'] * $i['price'],2)}}
                                                </span>
                                             </span>
                                          </span>
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapse{{$ctr}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
                                  <div class="panel-body">
                                        <div class="row">
                                            <div class="col-md-8">

                                                <p>{{$i['description']}}</p>
                                                <p>Quantity : {{$i['quantity']}}</p>
                                              
                                                <span class="badge"></span>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-6"><p>Category: {{$i['type']}}</p></div>
                                                    <div class="col-lg-6"><p>Price/unit: {{$i['price']}} ( PHP : {{ number_format($i['quantity'] * $i['price'],2)}})
                                                        <div class="btn-group " role="group" aria-label="...">
                                                      @if(isset($i['removable']))
                                                        @if($i['removable'] == false)
                                                        @else
                                                        <a type="" href="{{URL::route('book.deleteItem', ['key' => $ctr])}}" class="btn btn-danger">
                                                      <i class="glyphicon glyphicon-remove"></i> Remove</a>
                                                        @endif
                                                      @else
                                                      <a type="" href="{{URL::route('book.deleteItem', ['key' => $ctr])}}" class="btn btn-danger">
                                                      <i class="glyphicon glyphicon-remove"></i> Remove</a>
                                                      @endif
                                                    </div>
                                                    </p></div>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <a data-lightbox="image-1" class="example-image-link" data-title="{{$i['product']}}" href="{{$i['image']}}"  >
                                                <img src="{{$i['image']}}"   class="example-image img img-responsive img-thumbnail" />
                                            </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              </div>
                            <?php $ctr+= 1;?>
                        @endforeach
                              </div>
                    @else
                        <div role="presentation">
                            <a role="menuitem" tabindex="-1" href="/">Reservation List is empty </a>           
                        </div>
                    @endif
          </div>
          <div class="modal-footer">  
           <?php 
              
                $guest = Session::get('date_info')['adult'] + Session::get('date_info')['children'];
                $forced = $roomcounter * 10;
                $remaining = $guest - $forced;
                $excess = $guest - $totalCapacity;
                Session::put('remaining' , $remaining);
             ?>

   <!--          @if((Session::get('items')))
              @if($remaining <= 0) -->
                {{HTML::linkRoute('book.create', 'Proceed to Checkout',array(), array('id' => 'linkid', 'class' => 'btn btn-primary'), false);}}
          <!--     @else -->
       <!--            <div class="well text-center">
                  <p>Total count of guest is less than the max capacity of all selected rooms,huts and cottages.</p>
                  <p>Please select more rooms,huts or cottages.</p>
                  </div>
                  {{HTML::linkRoute('book.index', 'Add Reservation items' ,null, array('class' => 'btn btn-primary'))}}
              @endif
            @endif --> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>