@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop

@section('contains')
<div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('membership')}}">VIP badge</a></li>
            
        </ul>
    </div>

   <div class="container">
        <div class="row">

            <!-- *** PAGES MENU WITH MARGIN BOTTOM ***-->
         @include('layouts/partials/_left_navbar')
            <!-- *** PAGES MENU END***-->

 <div class="col-lg-9 col-md-8">
                <div class="card mb-4">
                    <div class="card-header">
                        <h2>Increase your sale by requesting a VIP badge!</h2>
                        <p class="lead">VIP badge allows your business to have a bigger presence on Bigdeals.com, so that
                            you can reach even more customers.with vip badge your product can be purchase online. we collect vip product from sellers and deliver it to buyers. after payement we take 5% of selling price and 95% goes to the seller.
                        </p>
                        <h5 class=" card-title">Benefits of VIP badge</h5>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton"
                            data-toggle="collapse" data-target="#demo4">
                            <img src="img/postmoread.jpg" alt="Post more ads">have your ads display on top
                        </button>
                        <div id="demo4" class="collapse border border-primary pagebody">
                            Our VIP badge allow your ad to always be display on top when ever customers make query
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton"
                        data-toggle="collapse" data-target="#demo3">
                        <img src="img/bumpupandtop.jpg" alt="Bump Up and Top Ad promotions">Online purchase facility
                    </button>
                    <div id="demo3" class="collapse border border-primary pagebody">
                        with VIP badge customers can purchase your product online
                    </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton"
                            data-toggle="collapse" data-target="#demo2">
                            <img src="img/postadtahtdonotesparied.jpg" alt="Post ads that do not expire">Focus on what is important
                        </button>
                        <div id="demo2" class="collapse border border-primary pagebody">
                            With our vip badge you focus on your business while we take care of delivery for you.
                        </div><br>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop