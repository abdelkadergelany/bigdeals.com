@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/chat.css')}}">
<link rel="stylesheet" href="{{asset('css/latest-product.css')}}">
@stop
@section('contains')
<!-- BEGINING  my add-->



<div class="container">
  <div class="user_css">
    <div class="row">

     @include('layouts/partials/_client_Ui_leftNavbar')
     <div  class="col-md-2"></div>

     <div class="col-lg-7 col-md-7" style="background-color: white;">
      <h5 style="padding: 3px"> {{Auth::user()->name}}</h5><hr>


      @forelse($favorites as $fav)
      @foreach($ad = getADs($fav->adId) as $aa )
      <div class="m-0">
                
                 <a href="{{route('myfavorite')}}?action=delete&id={{$fav->id}}"><button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Delete</button></a> 
              </div> 

              <a href="{{route('product-details')}}?id={{$aa->id}}" class="border_all_categories">
                <div class="row">
                  <div class="col-md-3">
                    <img src="publication/{{$aa->pict1}}" class="img-thumbnail" alt="images" width="100"
                    height="100">
                  </div>
                  <div class="col-md-9">
                    <h5><b>{{reduceString($aa->title)}}
                      (@if($aa->isUsed==0)
                      {{"New"}}
                      @else
                      {{"Used"}}
                    @endif)</b></h5>

                    <span style="text-transform: capitalize">{{$aa->subCategoryName}}</span><br>
                    <span style="color: #7B1FA2;text-transform: capitalize">{{$aa->cityName}}&nbsp;&nbsp;</span><span>{{$aa->address}}</span><br>
                    <span class="price_all_categories">TK {{$aa->price}}</span>

                  </div>
                </div>
                <span class="time_all_categories">{{$aa->created_at->diffForHumans()}}</span><br>
              </a><hr>
              @endforeach
              @empty
              <div class='alert alert-danger' role='alert'>oops! no Favorite added !!!</div>

              @endforelse
  
            </div>
            <div  class="col-md-2"></div>

          </div>
        </div>
      </div>





      @stop