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

         <div class="col-lg-10 col-md-10" style="background-color: white;">
            <h5 style="padding: 3px"> {{Auth::user()->name}}</h5><hr>

         
          @foreach($ad as $ads)

          <div class="m-0">
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >View</button> 
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Update</button> 
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Sold Out</button> 
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Delete</button> 
            </div>

          <div class="container myaddContainer">
            <div class="row">
              <div class="col-md-2 col-lg-2 p-0" >
               <img src="publication/{{$ads->pict1}}" width="100px"; height="109px;">
              </div>
              <div class="col-md-10 col-lg-10 m-0 p-0" >
                <div class="row m-0 p-0">
                 <h5>{{$ads->title}} 
                  (@if($ads->isUsed==0)
                  {{"New"}}
                  @else
                  {{"Used"}}
                  @endif)
                </h5> 
                </div>
                <div class="row m-0 p-0" >
                  <span>{{$ads->cityName}} </span> &nbsp;&nbsp;||&nbsp;&nbsp;<span> {{$ads->subCategoryName}}</span>
                  
                </div>
                <div class="row m-0 p-0" >
                  <span class="price" >{{$ads->price}} TK</span> <span class="time">{{$ads->created_at->diffForHumans()}}</span>
                  
                </div>
                
              </div>
              
            </div>
            
          </div> 
          @endforeach
           {{ $ad->links() }}





   
</div>
</div>
</div>
</div>





@stop