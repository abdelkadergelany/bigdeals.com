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
                    <h5> </h5><hr>
                    
                       @include('layouts/partials/_choose_cat&sub_cat')
    
                </div>
            </div>
        </div>
    </div>



<script  src="{{asset('js/admin.js')}}"></script>

@stop