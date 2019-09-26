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

         <div class="col-lg-5 col-md-5" style="background-color: white;">
            <h5 style="padding: 3px"> {{Auth::user()->name}}</h5><hr>



                              @foreach($ad as $ads)
                               <div class="m-0">
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >View</button> 
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Update</button> 
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Sold Out</button> 
                <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Delete</button> 
                                   </div>

                            <a href="#" class="border_all_categories">
                                <div class="row">
                                    <div class="col-md-3">
                                        <img src="publication/{{$ads->pict1}}" class="img-thumbnail" alt="images" width="100"
                                            height="100">
                                    </div>
                                    <div class="col-md-9">
                                        <h5><b>{{reduceString($ads->title)}}
                                      (@if($ads->isUsed==0)
                                               {{"New"}}
                                          @else
                                              {{"Used"}}
                                     @endif)</b></h5>

                                        <span style="text-transform: capitalize">{{$ads->subCategoryName}}</span><br>
                                         <span style="color: #7B1FA2;text-transform: capitalize">{{$ads->cityName}}&nbsp;&nbsp;</span><span>{{$ads->address}}</span><br>
                                        <span class="price_all_categories">TK {{$ads->price}}</span>
                                       
                                    </div>
                                </div>
                                <span class="time_all_categories">{{$ads->created_at->diffForHumans()}}</span><br>
                            </a><hr>

                             @endforeach

           {{ $ad->links() }}





   
</div>
         <div  class="col-md-2"></div>

</div>
</div>
</div>





@stop