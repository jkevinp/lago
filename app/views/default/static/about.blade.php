@extends('layout.template')

@section('content')
    <!-- Header -->
    <br/><br/>
    <!-- /.intro-header -->
    <!-- Page Content -->
    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                     <h2 class="section-heading">Sunrock Resort</h2>
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <p class="lead">Making a choice the famous resort in Antipolo is Sunrock. It is an ideal place for weddings, graduation, retreats, birthdays, baptisms, reunions,team building and workshop. It is economical rates but you can enjoy as well. Sunrock resort is a perfect resort near Manila or NCR because its about 25 - 50 minutes to drive away the bc streets of manila. Come and visit now. Stay comfortable like a home.</p>
                </div>
                <div class="col-lg-6 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="{{URL::asset('default')}}/img/foot.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->
    <div class="content-section-b">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-lg-offset-1 col-sm-push-6  col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">AMENITIES</h2>
                    <p class="lead">Sunrock resort have a jacuzzi, anaconda slide, mega bubbles, kiddie slide, private pools, kubo and rooms and overlooking view.</p>
                </div>
                <div class="col-lg-5 col-sm-pull-6  col-sm-6">
                    <img class="img-responsive" src="{{URL::asset('default')}}/img/Multi.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-b -->
    <div class="content-section-a">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <hr class="section-heading-spacer">
                    <div class="clearfix"></div>
                    <h2 class="section-heading">LOWEST ENTRANCE FEE AMONG OTHER NEAR RESORT</h2>
                    <p class="lead">The entrance fee for kids if day time 130php above 4 feet, if your child is below 4 feet it cost only 100php meanwhile in night time rate if your kids is above 4 feet it cost 150php while if youre kids is below 4 feet it cost 120php. Sunrock resort open 6:30am to 5:30pm in day rate. In night rate starts at 6:00pm to 5:30am Sunrock resort is the cheapest resort and most affordable resort here in antipolo.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="{{URL::asset('default')}}/img/MainN.jpg" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-section-a -->
   
    <legend></legend>
@stop

@section('script')
 <script src="{{URL::asset('default')}}/js/main.js"></script>
@stop