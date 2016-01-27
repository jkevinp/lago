<!-- Brand and toggle get grouped for better mobile display -->
           
           
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav" style="height:100%;background:#424a5d">
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#reserve"><i class="fa fa-clock-o fa-fw"></i> 
                             My Reservations<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="reserve" class="collapse">
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

                     <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#message"><i class="fa fa-envelope"></i> 
                             Messages<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="message" class="collapse">
                            <li>
                                {{HTML::linkRoute('account.show', 'Inbox',['messages' ,'all'])}} 
                            </li>
                            <li>
                                {{HTML::linkRoute('account.show', 'Create Message',['messages' ,'create'])}} 
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#transactions"><i class="fa fa-fw fa-bar-chart-o"></i> 
                             Transactions<i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="transactions" class="collapse">
                            <li>
                                {{HTML::linkRoute('account.show', 'View Transactions',['transaction' ,'all'])}} 
                            </li>
                            <li>
                                   {{HTML::link(route('account.index').'/show/transaction/pay/','Pay via Bank')}}
                           </li>
                        </ul>
                    </li>
                    
                    </ul>
            </div>
            <!-- /.navbar-collapse -->
