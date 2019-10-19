@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/chat.css')}}">
@stop
@section('contains')
   <!-- BEGINING  my add-->



     <div class="container">
        <div class="user_css">
            <div class="row">

                @include('layouts/partials/_client_Ui_leftNavbar')

                <div class="col-lg-9">
                    <h5> {{returnName(Auth::user()->id)}}</h5><hr>
                    
                <div class="counter">
    <div class="container">
        <div class="row">
          

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="customer">
                    <p class="counter-count">{{$favoriteCount}}</p>
                    <p class="customer-p">Favorites</p>
                </div>
            </div>
             <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="customer">
                    <p class="counter-count">{{$orderCount}}</p>
                    <p class="customer-p">Orders</p>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                <div class="design">
                    <p class="counter-count">{{$adsCounter}}</p>
                    <p class="design-p">Posted Ads</p>
                </div>
            </div>

        </div>
    </div>
</div>
                       


                        

                
    
                </div>
            </div>
        </div>
    </div>



<script  src="{{asset('js/admin.js')}}"></script>

@stop