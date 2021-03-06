 <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="{{URL::action('cpanel.dashboard')}}" class="logo"><b>{{APP_NAME}} Control Panel</b></a>
            <!--logo end-->
            <div class="nav notify-row" id="top_menu">
                <!--  notification start -->
                <ul class="nav top-menu">
                    <!-- settings start -->
                    <li class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#"  style="color:white">
                            <i class="fa fa-tasks"></i>
                            <span class="badge bg-theme">
                            @if(isset($pendingTransaction))
                                        {{count($pendingTransaction)}} 
                                    @else 
                                         0
                                    @endif
                            </span>
                        </a>


                        <ul class="dropdown-menu extended inbox" >
                          <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green"> 
                                    @if(isset($pendingTransaction))
                                        {{count($pendingTransaction)}} 
                                    @else 
                                         0
                                    @endif
                                    pending Transactions</p>
                            </li>
                            <?php $ctr= 0;?>
                            @if(isset($pendingTransaction))
                                @foreach($pendingTransaction as $transaction)
                                @if($ctr < 5)

                                  <li>
                                <a href="{{URL::action('cpanel.show' , ['action' => 'transaction' , 'params' => $transaction['id']])}}">
                                   
                                    <div class="subject">
                                    <div class="from">{{$transaction['account_id']}}</div>
                                    <div class="from">{{$transaction['created_at']}}</div>
                                    <div class="time"></div>
                                </div>
                                    <div class="message">
                                        {{substr($transaction['id'],0,20)}}...
                                    </div>

                                </a>
                            </li>
                            @endif
                            <?php $ctr++;?>
                            @endforeach
                            @endif
                            <li class="external">
                                <a href="{{URL::action('cpanel.show' , ['action' => 'transaction' , 'params' => 'created'],['style' =>'color:white'])}}">See All Pending Transactions</a>
                            </li>
                        </ul>
                    </li>
                    <!-- settings end -->


<li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="color:white">
                            <i class="fa fa-book"></i>
                            <span class="badge bg-theme">
                              {{count(Booking::sgetStartingToday()->statusIsConfirmed()->get()) + count(Booking::sgetEndingToday()->statusIsOnSession()->get())}}
                            </span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">Check-in/out Notification</p>
                            </li>
                          
                         
                                @foreach(Booking::sgetStartingToday()->statusIsConfirmed()->take(5)->get() as $mail)
                                <li>
                                  <a href="{{URL::action('cpanel.show' ,array('action' => 'session' , 'param' => 'checkin'))}}">
                                      <span class="photo"><i class="fa fa-check"></i></span>
                                      <span class="subject">Check-in Today
                                      <span class="from"></span>
                                      
                                      </span>
                                      <span class="message">
                                          Booking ID: {{$mail->bookingid}}
                                      </span>
                                      <span class="time">{{$mail->account->fullname()}}</span>
                                  </a>
                                </li>
                            @endforeach

                            @foreach(Booking::sgetEndingToday()->statusIsOnSession()->take(5)->get() as $mail)
                                <li>
                                  <a href="{{URL::action('cpanel.show' ,array('action' => 'session' , 'param' => 'checkout'))}}">
                                      <span class="photo"><i class="fa fa-remove"></i></span>
                                      <span class="subject">
                                      <span class="from">Check-out today</span>
                                      </span>
                                      <span class="message">
                                          Booking ID: {{$mail->bookingid}}
                                      </span>
                                       <span class="time">{{$mail->account->fullname()}}</span>
                                     
                                  </a>
                                </li>
                            @endforeach
                            
                            <li>
                                <a href="{{URL::action('cpanel.dashboard' , ['action' => 'message' , 'params' => 'all'])}}">See All</a>
                            </li>
                        </ul>
                    </li>


                    <!-- inbox dropdown start-->
                    <li id="header_inbox_bar" class="dropdown">
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#" style="color:white">
                            <i class="fa fa-envelope-o"></i>
                            <span class="badge bg-theme"> @if(isset($mails))
                                        {{count($mails)}} 
                                    @else 
                                         0
                                    @endif</span>
                        </a>
                        <ul class="dropdown-menu extended inbox">
                            <div class="notify-arrow notify-arrow-green"></div>
                            <li>
                                <p class="green">You have 
                                    @if(isset($mails))
                                        {{count($mails)}} 
                                    @else 
                                         0
                                    @endif
                                    messages</p>
                            </li>
                          <?php $ctr= 0;?>
                            @if(isset($mails))
                                @foreach($mails as $mail)
                                @if($ctr < 5)

                                  <li>
                                <a href="{{URL::action('cpanel.show' , ['action' => 'viewmessage' , 'params' => $mail['id']])}}">
                                    <span class="photo"></span>
                                    <span class="subject">
                                    <span class="from">{{$mail['sendername']}}</span>
                                    <span class="time">{{$mail['created_at']}}</span>
                                    </span>
                                    <span class="message">
                                        {{substr($mail['message'] , 0,29)}}
                                    </span>
                                </a>
                            </li>
                            @endif
                            <?php $ctr++;?>
                            @endforeach
                            @endif
                            
                            <li>
                                <a href="{{URL::action('cpanel.show' , ['action' => 'message' , 'params' => 'all'])}}">See all messages</a>
                            </li>
                        </ul>
                    </li>
                    <!-- inbox dropdown end -->
                </ul>
                <!--  notification end -->
            </div>
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="{{URL::action('cpanel.account.logout');}}">Logout</a></li>
            	</ul>
            </div>

               <div class="modal fade" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="reservationModal" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="reservationModalLabel">My Reservations</h4>
            <h5>
              <div class="row">
                  <div class='col-md-6'>
                    @if(Session::get('email'))
                    E-mail Address: {{Session::get('email')}}<br/>
                    @elseif (Session::get('account_info')['email'])
                    E-mail Address: {{Session::get('account_info')['email']}}<br/>
                    @endif
                    @if(Session::get('date_info'))
                      Children/Adult Count: {{Session::get('date_info')['children']}}<br/>
                      Senior Citizen Count: {{Session::get('date_info')['adult']}} <br/>
                      Total Duration: {{Session::get('date_info')['lenofstay'] * 24}} hours.
                      <br/>Mode: {{Session::get('date_info')['modeofstay']}}
                   
                    @endif


                  </div>
                  <div class='col-md-6'>
                    @if(Session::get('date_info'))
                        Arrival : {{Session::get('date_info')['start']}} <br/>
                        Departure: {{Session::get('date_info')['end']}} <br/>
                        @if (Session::get('totalFee'))
                          Total Fee: {{number_format(Session::get('totalFee'),2)}}<br/>
                        @endif
                    @endif

                  </div>
              </div>
              @if(Session::get('date_info'))
              <div align="right">
              <a href="{{route('cpanel.show' ,array('action' => 'walkin' , 'param' => '1'))}}" class="btn btn-default">Edit Information</a> 
              {{HTML::linkRoute('book.removeAllItems', 'Reset' ,null, array('class' => 'btn btn-default'))}}
              {{HTML::linkRoute('cpanel.show.product', 'Add Product' ,null, array('class' => 'btn btn-primary'))}}
            </div>
              @endif
            </h5>
          </div>
          <div class="modal-body">

          <?php $totalCapacity  = 0;$roomcounter = 0; ?>
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="false">
                     @if((Session::get('items')))

                      <?php $ctr = 0;?>
                        @foreach (Session::get('items') as $i)
                          <?php 
                            if(isset($i['paxmax'])){ 
                              $totalCapacity += $i['paxmax'] * $i['quantity'];
                              if($i['paxmax'] != 0)
                              $roomcounter += 1; 
                            }

                          ?>
                              <div class="panel panel-info">
                                <div class="panel-heading" role="tab" id="headingOne">
                                  <h5 class="panel-title">
                                    <a data-toggle="collapse" class="list-group" data-parent="#accordion" href="#collapse{{$ctr}}" aria-expanded="false" aria-controls="collapse{{$ctr}}">
                                          
                                          <span class="list-group-item">

                                            <span>{{$i['product']}} 

                                                <span class="badge">
                                                    {{$i['quantity']}}
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
                                              
                                                <span class="badge"></span>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-lg-6"><p>Category: {{$i['type']}}</p> </div>
                                                    <div class="col-lg-6"><p>Price Per Unit : {{$i['price']}}
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
                                                <img src="{{$i['image']}}"   class="example-image img-responsive img-rounded" />
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
             @if((Session::get('items')))
           
                 @if($remaining <= 0)
                {{HTML::linkRoute('book.create', 'Proceed to Checkout',array(), array('id' => 'linkid', 'class' => 'btn btn-primary'), false);}}

              @else

                  <div class="well text-center">
                  <p>Total count of guest is less than the max capacity of all selected rooms,huts and cottages.</p>
                  <p>Please select more rooms,huts or cottages.</p>
                  </div>
                  {{HTML::linkRoute('book.index', 'Add Reservation items' ,null, array('class' => 'btn btn-primary'))}}
              @endif
            @endif
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>
  </header>
      <!--header end-->
      