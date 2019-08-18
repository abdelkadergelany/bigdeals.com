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
            <h5> your name</h5><hr>


               @foreach($ads as $ads)

            <div style="margin: 0px;">
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >View</button> 
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Update</button> 
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Sold Out</button> 
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Delete</button> 
            </div>


            <div class="container-fluid myadd_img ">
                
                   <div class="row" style=" padding: 0px">
               
                
                      <div class="col-xs-4 col-lg-3 col-md-3" style="width: inherit; margin: 0px;padding: 0px; background-color: blue; ">

                      <img width="100%" height="200px" style="object-fit:cover; " src="publication/{{$ads->pict1}}">  

                      </div>
   

                      <div class="col-xs-8 col-lg-9 col-md-9" style="width: inherit;margin: 0px  ">
                           <span  style="text-align: center;color: #303F9F"><b>{{$ads->title}} </b></span>
                           <br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$ads->regionName}}({{$ads->cityName}})<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>{{$ads->price}} Tk<b><span  style="padding: 4px; position: absolute; right: 1px; bottom: 1px;">{{$ads->created_at->diffForHumans()}}</span>
                      </div>

                  </div>
                
              </div>
              @endforeach




    
</div>
</div>
</div>
</div>





@stop