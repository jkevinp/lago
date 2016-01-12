<!-- Footer -->
    <footer>
        <hr>
        <div class="container" align="center">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="list-inline">
                        <li>
                            <a href="{{URL::action('static.home')}}">Home</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                        <li>
                            <a href="{{URL::action('static.about')}}">About</a>
                        </li>
                        <li class="footer-menu-divider">&sdot;</li>
                            <a href="{{URL::action('cpanel.account.login')}}">Control Panel</a>
                        </li>
                    </ul>
                    <p class="copyright text-muted small">Copyright &copy; {{APP_NAME}} 2016. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </footer>
    @include('includes.default.footer-script')
    @include('includes.default.footer-modal')

       
<!-- Footer -->