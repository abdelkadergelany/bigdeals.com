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
                <div class="col-lg-3">
                    <h3 class="lead">My Account</h3>
                    <hr>
                    <div class="row">
                    <div class="col-md-8"> <h5><a href="{{route('mychat')}}">My Chats</a></h5></div>
                    <div class="col-md-4"><span>&#8250;</span></div>
                    </div>
                    <hr>
                    <div class="row">
                    <div class="col-md-8"> <h5><a href="{{route('myfavorite')}}">Favorites</a></h5></div>
                    <div class="col-md-4"><span>&#8250;</span></div>
                    </div>
                   
                    <hr>
                    <div class="row">
                    <div class="col-md-8"> <h5><a href="{{route('myadd')}}">My Adds</a></h5></div>
                    <div class="col-md-4"><span>&#8250;</span></div>
                    </div>
                   
                    <hr>
                    <div class="row">
                    <div class="col-md-8"> <h5><a href="{{route('profile')}}">Manage Profiles</a></h5></div>
                    <div class="col-md-4"><span>&#8250;</span></div>
                    </div>
                   
                
                </div>
                <div class="col-lg-9">
                    <h5> your name</h5><hr>
                    
                
                       
                           <div class=myadd_img>
                            <input class="btn btn-primary" type="button" name="" value="View">
                            <input class="btn btn-primary" type="button" name="" value="Update">
                            <input class="btn btn-primary" type="button" name="" value="Sold Out">
                            <input class="btn btn-primary"  type="button" name="" value="Delete">
                            <br>
                            <img  src='img/smartphone.png'>
                            <span>Apple iphone 7 for 7 (used)</span>
                           </div>
                            <div class=myadd_img>
                            <input class="btn btn-primary" type="button" name="" value="View">
                            <input class="btn btn-primary" type="button" name="" value="Update">
                            <input class="btn btn-primary" type="button" name="" value="Sold Out">
                            <input class="btn btn-primary"  type="button" name="" value="Delete">
                            <br>
                            <img  src='img/screenshot.png'>
                            <span>Apple iphone 7 for 7 (used)</span>
                           </div>
                            <div class=myadd_img>
                            <input class="btn btn-primary" type="button" name="" value="View">
                            <input class="btn btn-primary" type="button" name="" value="Update">
                            <input class="btn btn-primary" type="button" name="" value="Sold Out">
                            <input class="btn btn-primary"  type="button" name="" value="Delete">
                            <br>
                            <img  src='img/informatique.png'>
                            <span>Apple iphone 7 for 7 (used)</span>
                           </div>

                        

                
    
                </div>
            </div>
        </div>
    </div>





@stop