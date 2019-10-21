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
                     @if(isset($confirmationSent))
                         <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{{$confirmationSent}}</strong> 
                       </div>
                        @endif
                    <div class="card-header">
                        <h2>Still need help?</h2>
                       
                        <p class="lead">Please complete the form below and we will get back to you soon.</p>
                    </div>

                    <form method="POST" action="{{route('contact')}}" class="contentregister"><br><br>
                      @csrf  <input class="inputregister" type="text" id="name" name="name" placeholder="Name" required><br><br>
                        <input class="inputregister" type="email" id="email" name="email" placeholder="Email" required><br><br>
                        <textarea class="inputregister" name="message" id="" cols="70" rows="5"
                            placeholder="How can we help you?"></textarea><br><br>
                        <input class="inputregistersubmit btn btn-primary" type="submit" value="Send"><br><br>
                    </form>
                </div>
            </div>
        </div>
    </div>

@stop