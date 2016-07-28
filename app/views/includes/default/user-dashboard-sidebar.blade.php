<ul class="sidebar-menu">
    <li class="header">MAIN NAVIGATION</li>
    <li class="treeview">
      <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>My Reservations</span>
        <i class="fa fa-angle-left pull-right"></i>
      </a>
      <ul class="treeview-menu">
        <li class="white">
            {{HTML::linkRoute('account.show', 'All',['reservation' ,'all'] ,['class' => 'white'])}} 
        </li>
        <li>
            {{HTML::linkRoute('account.show', 'Awaiting Payment',['reservation' ,'0'])}} 
        </li>
        <li>
            {{HTML::linkRoute('account.show', 'Pending Payment Confirmation',['reservation' ,'1'])}} 
        </li>
        <li>
            {{HTML::linkRoute('account.show', 'Payment Confirmed',['reservation' ,'2'])}} 
        </li>
        <li>
            {{HTML::linkRoute('account.show', 'On-session',['reservation' ,'3'])}} 
        </li>
        <li>
            {{HTML::linkRoute('account.show', 'Past Reservations',['reservation' ,'4'])}} 
        </li>
        <li>
            {{HTML::linkRoute('account.show', 'Expired',['reservation' ,'5'])}}                           
        </li>
         <li>
            {{HTML::linkRoute('account.show', 'Rejected',['reservation' ,'6'])}}                           
        </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>My Messages</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>{{HTML::linkRoute('account.show', 'Inbox',['messages' ,'all'])}}</li>
            <li>{{HTML::linkRoute('account.show', 'Create Message',['messages' ,'create'])}}</li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-pie-chart"></i>
        <span>Transactions</span>
        <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li>{{HTML::linkRoute('account.show', 'View Transactions',['transaction' ,'all'])}}</li>
            <li>{{HTML::link(route('account.index').'/show/transaction/pay/','Pay via Bank')}}</li>
        </ul>
    </li>
        
</ul>
<!-- /.navbar-collapse -->
