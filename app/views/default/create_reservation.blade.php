@extends('layout.template')

@section('content')
 
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel" data-interval="false">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">

     	  <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                    	<legend>So you decided to feel the summer heat e?</legend>
                        <h1>Sunrock Resort- Antipolo</h1>
                        <h3>Lorep Ipsium Korusium Lerap Pasio</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a id="btn_booknow" href="#booknow" class="btn btn-primary btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Book Now</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Explore</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Inquire Now!</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="item">
       <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>Sunrock Resort- Antipolo</h1>
                        <h3>Lorep Ipsium Korusium Lerap Pasio</h3>
                        <hr class="intro-divider">
                        <ul class="list-inline intro-social-buttons">
                            <li>
                                <a id="btn_booknow" href="#booknow" class="btn btn-primary btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Book Now</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Explore</span></a>
                            </li>
                            <li>
                                <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Inquire Now!</span></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" id="next" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
@stop


