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

         <div class="col-lg-7 col-md-7" style="background-color: white; text-transform: capitalize;">
            <h5 style="padding: 3px"> {{Auth::user()->name}}</h5><hr>



                              @foreach($ad as $ads)
                               <div class="m-0">
                <a href="{{route('product-details')}}?id={{$ads->id}}"><button  class="btn myadd-btn btn-primary btn-sm" type="button"  >View</button> </a>
                <a href="{{route('myadd')}}?action=edit&id={{$ads->id}}"><button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Edit</button> </a>
                <!-- <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Sold Out</button>  -->
               <a href="{{route('myadd')}}?action=delete&id={{$ads->id}}"> <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Delete
               </button></a> 
                                   </div>

                            <a href="{{route('product-details')}}?id={{$ads->id}}" class="border_all_categories">
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

          

            {{ $ad->appends(['action' => "display"])->links() }}





   
</div>
         <div  class="col-md-2"></div>

</div>
</div>
</div>





@stop