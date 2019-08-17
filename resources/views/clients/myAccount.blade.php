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
                    <h5> your name</h5><hr>
                    
                <div class="counter">
    <div class="container">
        <div class="row">
          

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="customer">
                    <p class="counter-count">10</p>
                    <p class="customer-p">Favorites</p>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                <div class="design">
                    <p class="counter-count">1050</p>
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