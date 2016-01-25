<div class="footer">
    <div class="col-md-10 col-md-offset-1">
        <div class="header-base">
            <div class="col-md-12">
                <a href="{{URL::action('cpanel.account.login')}}"> <i class="fa fa-desktop"></i> Control Panel</a>
          
                <div class="row">
                    <div class="col-md-9" style="color:white;">
                        <p class="copyright  small">Copyright &copy; {{APP_NAME}} 2016. All Rights Reserved</p>
                        <p><i class="fa fa-map-marker"></i> Maharlika Road, San Salvador, Baras, Rizal</p>
                        <p><i class="fa fa-phone"></i>  {{SiteContents::where('title' , 'phone')->first()->value}}</p>
                        <p><i class="fa fa-google"></i> {{SiteContents::where('title' , 'email')->first()->value}}</p>

                    </div>
                    <div class="col-md-3">
                        <a href="{{SiteContents::where('title' , 'facebook')->first()->value}}"><i class="fa fa-facebook fa-2x"></i><br/>Like us on facebook
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    @include('includes.default.footer-script')
    @include('includes.default.footer-modal')