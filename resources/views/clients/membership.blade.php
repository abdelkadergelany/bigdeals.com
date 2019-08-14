@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop

@section('contains')
<div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('membership')}}">membership</a></li>
            
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
                        <h2>Increase your sales with a Bigdeals.com Membership!</h2>
                        <p class="lead">Membership allows your business to have a bigger presence on Bigdeals.com, so that
                            you can reach even more customers. Our Membership packages are specifically designed to give
                            you the tools you need to expand your business and increase your sales through Bigdeals.com.
                        </p>
                        <h5 class=" card-title">Benefits of Membership</h5>
                    </div>
                    <div class="card-body">
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton"
                            data-toggle="collapse" data-target="#demo4">
                            <img src="img/postmoread.jpg" alt="Post more ads">Post more ads
                        </button>
                        <div id="demo4" class="collapse border border-primary pagebody">
                            Our Membership packages allow you to post an unlimited number of ads*. The more you post, the more you sell!
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton"
                        data-toggle="collapse" data-target="#demo3">
                        <img src="img/bumpupandtop.jpg" alt="Bump Up and Top Ad promotions">Bump Up and Top Ad promotions
                    </button>
                    <div id="demo3" class="collapse border border-primary pagebody">
                        Bonus Bump Up and Top Ad promotions* are included with Membership at no extra cost every month.
                    </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton"
                            data-toggle="collapse" data-target="#demo2">
                            <img src="img/postadtahtdonotesparied.jpg" alt="Post ads that do not expire">Post ads that do not expire
                        </button>
                        <div id="demo2" class="collapse border border-primary pagebody">
                            Our membership package allows you to renew your ads automatically so that they never expire
                        </div><br>
                       
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop