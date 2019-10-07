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
     <div  class="col-md-1">

     </div>

     <div class="col-lg-9 col-md-9" style="background-color: white; text-transform: capitalize;">

      @if(isset($flashmessage))
      <div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='true'>&times;</span>
       </button>
       <strong>{{$flashmessage}}</strong> 
     </div> 
     @endif



     <h5 style="padding: 3px"> {{Auth::user()->name}}</h5><hr>



     <div class="table-responsive ">
                        <table id="mytable" class="table table-bordred table-striped table-hover">
                           <thead>
                              <th>Order code</th>
                              <th>Designation</th>
                              <th>Date </th>
                              <th>Amount</th>
                              <th>Status</th>
                              <th>Cancel</th>
                           </thead>
                           <tbody>
                              @forelse ($orders as $order) 
                              <tr>
                                 <td>{{$order->orderCode}}</td>
                                 <td>{{$order->title}}</td>
                                 <td>{{$order->created_at}}</td>
                                  <td>{{$order->price}} TK</td>
                                 @if($order->state == "0")
                                 <td><span class="alert-dark">Pending</span></td>
                                 @endif
                                  @if($order->state == "1")
                                 <td><span class="alert-danger">Canceled</span></td>
                                 @endif
                                  @if($order->state == "2")
                                 <td><span class="alert-primary">Delivered</span></td>
                                 @endif

                                 @if($order->state == "0" )
                                 <td>
                                    <a href="{{route('manageorder')}}?action=cancel&order_id={{$order->id}}"><p data-placement="top" data-toggle="tooltip" title="Cancel"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><i class="far fa-window-close"></i></button></p></a>
                                 </td>
                                 @endif
                                  @if($order->state == "1" || $order->state == "2"  )
                                    <td>
                                    <p data-placement="top" data-toggle="tooltip" title="disabled"><button class="btn btn-danger btn-xs disabled" data-title="Delete" data-toggle="modal" data-target="#delete" > <i class="far fa-window-close"></i></button></p>
                                 </td>
                                  @endif
                                
                              </tr>
                              @empty
                              <p class="alert-info">No order found!!!</p>
                              @endforelse
                           </tbody>
                        </table>
                        <div class="clearfix"></div>
                     </div>





  </div>
  <div  class="col-md-1"></div>

</div>
</div>
</div>





@stop