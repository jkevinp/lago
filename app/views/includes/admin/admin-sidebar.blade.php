@if(Auth::user())
  @if(Auth::user()->usergroupid == 1)
        <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                <h5 class="centered"><span class="glyphicon glyphicon-user"></span>
                  @if(Auth::user())
                    {{Auth::user()->firstname}}
                    {{Auth::user()->middleName}}
                    {{Auth::user()->lastName}}

                  @endif
                </h5>
                  <li class="mt">
                      <a href="{{URL::action('cpanel.dashboard')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                 <!--   <li class="sub-menu">
                      <a href="{{url::action('cpanel.show' ,['action' => 'cashier' ,'param' => 'pay'])}}"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Sales</span></a>
                   </li> -->
                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-exchange"></i>
                          <span>Check In/Out</span>
                      </a>
                      <ul class="sub">
                            <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'session' , 'param' => 'checkin'))}}">Check In</a></li>
                            <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'session' , 'param' => 'checkout'))}}">Check Out</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Walk In</span>
                      </a>
                      <ul class="sub">
                         <li> <a  href="{{URL::action('cpanel.show' ,array('action' => 'walkin' , 'param' => '1'))}}">Add new Reservation</a></li>
                         <li> <a  href="{{URL::action('cpanel.booking.availablerooms')}}">View Available Rooms</a></li>
                     
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Transactions</span>
                      </a>
                      <ul class="sub">
                            <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'transaction' , 'param' => 'all'))}}">All Transactions</a></li>
                            <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'transaction' , 'param' => 'created'))}}">Confirm Payments</a></li>
                            <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'transaction' , 'param' => 'confirmed'))}}">Verified Transactions</a></li>
                            
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="glyphicon glyphicon-user"> </i>
                          <span>Accounts</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'account' , 'param' => 'all'))}}">View Accounts</a></li>
                          <li><a  href="{{URL::action('cpanel.create' ,array('action' => 'account'))}}">Create Account</a></li>
                          <li><a  href="{{URL::action('cpanel.search' ,array('action' => 'account' ,'param' =>'search'))}}">Search Accounts</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-inbox"></i>
                          <span>Messages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'message' , 'param' => 'all'))}}">Read Messages</a></li>
                          <li><a  href="{{URL::action('cpanel.create' ,array('action' => 'message'))}}">Create Message</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-ticket"></i>
                          <span>Coupons</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'coupon' , 'param' => 'all'))}}">View Coupons</a></li>
                          <li><a href="{{URL::action('cpanel.create' ,array('action' => 'coupon'))}}">Create Coupon</a></li>
                          <li><a  href="{{URL::action('cpanel.search' ,array('action' => 'coupon' ,'param' =>'search'))}}">Search Coupons</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-bookmark"></i>
                          <span>Products</span>
                      </a>
                      <ul class="sub">
                         <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'product' , 'param' => 'all'))}}">View Products</a></li>
                            <li><a  href="{{URL::action('cpanel.create' ,array('action' => 'product'))}}">Create Products</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Booking</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'booking' , 'param' => 'all'))}}">View All Reservations</a></li>
                      </ul>
                  </li>
                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>File</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{URL::action('cpanel.create',['action' => 'file'])}}">Upload File</a></li>
                          <li><a  href="{{URL::action('cpanel.file.list')}}">View Files</a></li>
                      </ul>
                  </li>
                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-edit"></i>
                          <span>Content</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{route('cms.index')}}">List</a></li>
                          <li><a  href="{{route('cms.create')}}">Create</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Reports</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'reports' , 'param' => 'all'))}}">List</a></li>
                 
                      </ul>
                  </li>

              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
   
@elseif (Auth::user()->usergroupid == 3)
        <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
                <h5 class="centered"><span class="glyphicon glyphicon-user"></span>
                  @if(Auth::user())
                    {{Auth::user()->firstname}}
                    {{Auth::user()->middleName}}
                    {{Auth::user()->lastName}}
                  @endif
                </h5>
                  <li class="mt">
                      <a href="{{URL::action('cpanel.dashboard')}}">
                          <i class="fa fa-dashboard"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <!--  <li class="sub-menu">
                      <a href="{{url::action('cpanel.show' ,['action' => 'cashier' ,'param' => 'pay'])}}"><i class="glyphicon glyphicon-shopping-cart"></i> <span>Sales</span></a>
                   </li> -->
                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-exchange"></i>
                          <span>Check In/Out</span>
                      </a>
                      <ul class="sub">
                            <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'session' , 'param' => 'checkin'))}}">Check In</a></li>
                            <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'session' , 'param' => 'checkout'))}}">Check Out</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-users"></i>
                          <span>Walk In</span>
                      </a>
                      <ul class="sub">
                         <li> <a  href="{{URL::action('cpanel.show' ,array('action' => 'walkin' , 'param' => '1'))}}">Add new Reservation</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-desktop"></i>
                          <span>Transactions</span>
                      </a>
                      <ul class="sub">
                            <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'transaction' , 'param' => 'all'))}}">All Transactions</a></li>
                            <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'transaction' , 'param' => 'created'))}}">Confirm Payments</a></li>
                            <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'transaction' , 'param' => 'confirmed'))}}">Verified Transactions</a></li>
                            
                      </ul>
                  </li>
                   <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-inbox"></i>
                          <span>Messages</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'message' , 'param' => 'all'))}}">Read Messages</a></li>
                          <li><a  href="{{URL::action('cpanel.create' ,array('action' => 'message'))}}">Create Message</a></li>
                      </ul>
                  </li>
                
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-book"></i>
                          <span>Booking</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'booking' , 'param' => 'all'))}}">View All Reservations</a></li>
                      </ul>
                  </li>
                   
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class=" fa fa-bar-chart-o"></i>
                          <span>Reports</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="{{URL::action('cpanel.show' ,array('action' => 'reports' , 'param' => 'all'))}}">List</a></li>
                       
                      </ul>
                  </li>


              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
@endif
@endif