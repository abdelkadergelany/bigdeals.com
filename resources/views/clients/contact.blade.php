@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop

@section('contains')

<div class="container">
        <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{route('welcome')}}">Home</a></li>
            <li class="breadcrumb-item active"><a href="{{route('contact')}}">Contact us</a></li>
            
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
                        <h2>Still need help?</h2>
                        <p class="lead">Please complete the form below and we will get back to you soon.</p>
                    </div>

                    <form method="POST" action="" class="contentregister"><br><br>
                        <input class="inputregister" type="text" id="name" name="name" placeholder="Name"><br><br>
                        <input class="inputregister" type="email" id="email" name="femail" placeholder="Email"><br><br>
                        <textarea class="inputregister" name="" id="" cols="70" rows="5"
                            placeholder="How can we help you?"></textarea><br><br>
                        <input class="inputregistersubmit btn btn-primary" type="submit" value="Send"><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop