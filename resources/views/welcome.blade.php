@extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop

@section('contains')
@include('layouts/partials/_map')
@include('layouts/partials/_searchcontainer')
@include('layouts/partials/_maincategory')
<div class="container">
	  <h1><span class="badge badge-secondary"> Latest  Ads </span></h1>
	     @foreach($ad as $ads)

       
          <a href="#" style="text-decoration: none; ">
          <div class="container myaddContainer" style="margin: 0px;">
            <div class="row" style="background-color: white;">
              <div class="col-md-2 col-lg-2 p-0" >
               <img src="publication/{{$ads->pict1}}" width="150px"; height="150px;">
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
                  <span style="color: #000000;"><span>{{$ads->cityName}} ( {{$ads->address}} ) </span> &nbsp;&nbsp;||&nbsp;&nbsp;<span> {{$ads->categoryName}} -> {{$ads->subCategoryName}}</span>
                  </span>
                </div>
                <div class="row m-0 p-0" >
                  <span class="price" >{{$ads->price}} TK</span> <span class="time">{{$ads->created_at->diffForHumans()}}</span>
                  
                </div>
                
              </div>
             
              
            </div>
            
          </div> 
      </a>
          @endforeach
</div>
<br>

 <script type="text/javascript">

$(document).ready(function(){
        $(function () {

        $('#cameroon-map').JSMaps({
            map: 'cameroon'
        });

        });
        
        });

    </script>
@stop