@extends('layout.template')

@section('content')
    <!-- Header -->
    <div class="intro-header-home">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>D'One Resort & Restaurant</h1>
                        <h3>Baras, Rizal</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a id="btn_booknow" href="#booknow" class="btn btn-primary btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Book Now</span></a>
                            </li>
                            <li>
                                <a href="{{URL::route('static.explore',[])}}" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Explore</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg" data-toggle="modal" data-target="#contactModal" data-whatever=""><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Inquire Now!</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.container -->
    </div>
    <!-- /.intro-header -->
    <!-- Page Content -->


    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Clear Water</h2>
                    <p class="lead">Enjoy the clearest and cleanliest pools in our resort.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="{{URL::asset('default')}}/img/3.jpg" alt="">
                </div>
            </div>

        </div>
    </div>

    
    <div class="content-section-b">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">For all Ages</h2>
                    <p class="lead">A resort for all ages, we present you different types of pool that will surely satisfy anyone regardless of age.</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="{{URL::asset('default')}}/img/1.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

   
    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Nature</h2>
                    <p class="lead">Tired of city life? Feel the nature, stay in a nature-friendly lodging.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="{{URL::asset('default')}}/img/2.jpg" alt="">
                </div>
            </div>
        </div>
    </div>

    <a name="booknow" id="booknow">
    @include('includes.form.form-date')
    
    <legend></legend>
     <div class="banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <h2>Connect to Sunrock</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="http://sunrockresort.com/" class="btn btn-primary btn-lg"><i class="fa fa-firefox fa-fw"></i> <span class="network-name">Website</span></a>
                        </li>
                        <li>
                            <a href="https://www.facebook.com/pages/Sunrock-Resort/100202060037233?ref=br_tf" class="btn btn-default btn-lg"><i class="fa fa-facebook fa-fw"></i> <span class="network-name">Facebook</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
 
   
@stop

@section('script')
 <script src="{{URL::asset('default')}}/js/main.js"></script>
@stop