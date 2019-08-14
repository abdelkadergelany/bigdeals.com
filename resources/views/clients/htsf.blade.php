@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop

@section('contains')
<div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('htsf')}}">How to sell fast</a></li>
            
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
                        <h2>How to sell fast?</h2>
                    </div>
                    <div class="card-body">

                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse"
                            data-target="#demo4">
                            <img src="img/promotead.jpg" alt="promotead">Promote your ad!
                        </button>
                        <div id="demo4" class="collapse border border-primary pagebody">
                            <ul>
                                <li>Promoted ads get up to 10 times more views.</li>
                                <li>More views = more interested buyers</li>
                                <li>With lots of interested buyers, you have a better chance of selling fast for the
                                    price that
                                    you want.</li>
                            </ul>
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse"
                            data-target="#demo2">
                            <img src="img/greatphoto.jpg" alt="greatphoto">Use great photos
                        </button>
                        <div id="demo2" class="collapse border border-primary pagebody">
                            <ul>
                                <li>Use actual photos - ads with photos of the real item get up to 10 times more views
                                    than ads with catalogue images.</li>
                                <li>Take clear photos - use good lighting and different angles.</li>
                            </ul>
                        </div><br>
                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton" data-toggle="collapse"
                            data-target="#demo3">
                            <img src="img/cleardetail.jpg" alt="cleardetail">Provide clear details in your ad
                        </button>
                        <div id="demo3" class="collapse border border-primary pagebody">
                            <ul>
                                <li>More details = more views!</li>
                                <li>Include keywords and information that buyers will be interested in.</li>
                                <li>Be honest in your description.</li>
                            </ul>
                        </div><br>

                        <button type="button" class="btn btn-primary btn-block dropdown-toggle monboutton"
                            data-toggle="collapse" data-target="#demo1">
                            <img src="img/rightprice.jpg" alt="rightprice">
                            Pick the right price - everything sells if the price is right.
                        </button>
                        <div id="demo1" class="collapse border border-primary pagebody">
                            <ul>
                                <li>Browse similar ads and pick a competitive price.</li>
                                <li>Think about how much buyers are willing to pay. The lower the price, the higher the
                                    demand.</li>
                            </ul>
                        </div><br>
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop