@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop

@section('contains')
<div class="container">
           <div class="card">
                <div class="row">
                     <div class="col-md-1"></div>
                     <div class="col-md-3">
                             
                                <!-- Search Widget -->
                        <div class="card my-4">
                            <h5 class="card-header">Search</h5>
                            <div class="card-body">
                                <div class="input-group">
                                   <input type="text" class="form-control" placeholder="Search for...">
                                   <span class="input-group-btn">
                                   <button class="btn btn-success" type="button">Go!</button>
                                   </span>
                                </div>
                            </div>
                        </div>
                         
                         <h6 style="text-align: center"><b>CATEGORIES</b> </h6>
                         <a href="" class="category_blog ">Electronics</a><br>
                         <a href="" class="category_blog ">Mobile Phones</a><br>
                         <a href="" class="category_blog ">House and kitchen</a><br>
                         <a href="" class="category_blog ">Pets</a><br>
                         <a href="" class="category_blog ">Automotive</a><br>
                         <a href="" class="category_blog ">Real estate</a><br>
                         <a href="" class="category_blog ">Health &amp; Beauty</a><br>
                         <a href="" class="category_blog ">Leisure,Sport &amp; Children</a><br>
                         <a href="" class="category_blog ">Services</a><br>
                         <a href="" class="category_blog ">Jobs</a><br>
                         <a href="" class="category_blog ">Educations</a><br>
                         <a href="" class="category_blog ">Agriculture &amp; Foodstuff</a><br>
                         <a href="" class="category_blog ">Fashion &amp; Clothing</a><br><br><br>
                     </div>
                     <div class="col-md-1"></div>
                     <div class="col-md-7">
                            <div class="row">
                                    <div class="col-sm-6"><br><br>
                                        <img src="img/detailsquare3.jpg" class="mx-auto d-block" width="200px" height="250px">                                     </div>
                                    <div class="col-sm-6"><br><br>
                                        <span><b>April 9, 2019</b></span>
                                        <span><b>Admin</b></span><br><br>
                                        <h5><b>name of the product hhvahbsbvghsjhvhjsjbbhbhgbgvgfsbhgdyhdt</b></h5><br>
                                        <a href="{{route('blogArticle')}}"><button class="button_blod">Read more</button></a>
                                    </div>
                                </div><hr>
                              
                                    <div class="row">
                                            <div class="col-sm-6"><br><br>
                                                <img src="img/banner.jpg" class="mx-auto d-block" width="200px" height="250px">                                     </div>
                                            <div class="col-sm-6"><br><br>
                                                <span><b>April 9, 2019</b></span>
                                                <span><b>Admin</b></span><br><br>
                                                <h5><b>name of the vgfsbhgdyhdt</b></h5><br>
                                                <a href="{{route('blogArticle')}}"><button class="button_blod">Read more</button></a>
                                            </div>
                                        </div><hr>
                                          <div class="row">
                                    <div class="col-sm-6"><br><br>
                                        <img src="img/detailsquare3.jpg" class="mx-auto d-block" width="200px" height="250px">                                     </div>
                                    <div class="col-sm-6"><br><br>
                                        <span><b>April 9, 2019</b></span>
                                        <span><b>Admin</b></span><br><br>
                                        <h5><b>name of the product hhvahbsbvghsjhvhjsjbbhbhgbgvgfsbhgdyhdt</b></h5><br>
                                        <a href="{{route('blogArticle')}}"><button class="button_blod">Read more</button></a>
                                    </div>
                                </div><hr>
                              
                                    <div class="row">
                                            <div class="col-sm-6"><br><br>
                                                <img src="img/banner.jpg" class="mx-auto d-block" width="200px" height="250px">                                     </div>
                                            <div class="col-sm-6"><br><br>
                                                <span><b>April 9, 2019</b></span>
                                                <span><b>Admin</b></span><br><br>
                                                <h5><b>name of the vgfsbhgdyhdt</b></h5><br>
                                                <a href="{{route('blogArticle')}}"><button class="button_blod">Read more</button></a>
                                            </div>
                                        </div><hr>
                     </div>
                </div> 
           </div>
    
</div>


  @stop