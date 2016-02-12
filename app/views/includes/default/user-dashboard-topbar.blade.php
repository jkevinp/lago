 <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li><a href="{{route('static.reservenow')}}"><i class="fa fa-calendar fa-fw"></i>Reserve Now</a></li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-user"></i> 
                            {{Auth::user()->fullname()}}
                        <b class="caret">
                        </b>
                    </a>
                    <ul class="dropdown-menu" role="menu" aria-labelledby="dropdownMenu1">
                        <li>
                             {{HTML::linkRoute('account.getProfile','Profile',null,['class' => 'fa fa-fw fa-user'])}}
                        </li>
                        <li class="divider"></li>
                        <li>
                             {{HTML::linkRoute('account.logout','Logout',null,['class' => 'fa fa-fw fa-power-off'])}}
                        </li>
                    </ul>
                </li>
            </ul>