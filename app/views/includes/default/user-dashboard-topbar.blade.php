<ul class="nav navbar-nav">
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
<a href="{{route('account.getProfile')}}"><i class="fa fa-fw fa-user"></i>Profile</a>
</li>
<li class="divider"></li>
<li>
<a href="{{route('account.logout')}}"><i class="fa fa-fw fa-power-off"></i>Logout</a>
</li>
</ul>
</li>
</ul>