 <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" id="dropdownMenu1" data-toggle="dropdown" aria-expanded="true">
                        <i class="fa fa-user"></i> 
                            {{Auth::user()['firstname']}}
                            {{Auth::user()['middleName']}}
                            {{Auth::user()['lastName']}}
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