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
     <div  class="col-md-2">

     </div>

     <div class="col-lg-7 col-md-7" style="background-color: white; text-transform: capitalize;">

      @if(isset($flashmessage))
      <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='true'>&times;</span>
       </button>
       <strong>{{$flashmessage}}</strong> 
     </div> 
     @endif



     <h5 style="padding: 3px"> {{Auth::user()->name}}</h5><hr>



     @foreach($ad as $ads)
     <div class="m-0">
      <a href="{{route('product-details')}}?id={{$ads->id}}"><button  class="btn myadd-btn btn-primary btn-sm" type="button"  >View</button> </a>
      <a href="{{route('myadd')}}?action=edit&id={{$ads->id}}"><button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Edit</button> </a>
      <!-- <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Sold Out</button>  -->
      <a href="{{route('myadd')}}?action=delete&id={{$ads->id}}"> <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Delete
      </button></a> 

      @if($ads->buyNow=="0")
      <a href="{{route('myadd')}}?action=requestvip&id={{$ads->id}}"> <button  class="btn myadd-btn btn-primary btn-sm" type="button"  >Request VIP BADGE
      </button></a> 
      @endif

      @if($ads->buyNow=="1")
      <button  class="btn myadd-btn btn-success btn-sm" type="button"  >VIP Badge Requested  
      </button> 
      @endif

      @if($ads->buyNow=="3")
      <button  class="btn myadd-btn btn-warning btn-sm" type="button"  >VIP Ad  
      </button> 
      @endif
      @if($ads->buyNow=="2")
      <button  class="btn myadd-btn btn-danger btn-sm" type="button"  >Waiting for collection 
      </button> 
      @endif

      @if($ads->isValidate=="1")
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="color: green;"><i class="fas fa-check-double"></i>validated</span>
      @endif

      @if($ads->isValidate=="0")
      &nbsp;&nbsp;&nbsp;<span style="color: green;"><i class="fas fa-times"></i>not validated</span>
      @endif
      @if($ads->isBlocked=="1")
      <span style="color: red;float: right;"><i  class="fas fa-2x  fa-exclamation-triangle"></i>blocked</span>
      @endif
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