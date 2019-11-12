<!DOCTYPE html>
<html>
<head>
  <title>Admin/manage Ads </title>
  @include('layouts/partials/_linkedfiles')
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
  <div class="wrapper">
   @include('layouts/partials/_admin_sidebar')
   <div id="content">
    @include('layouts/partials/_admin_navbar')


    <div class="container">
      <div class="row">
       <span><b>List of Orders</b></span>



       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  <a href="{{route('allorders')}}"><button style="position: relative;margin-right: 15px;" class="btn btn-info btn-sm"   >All orders ({{$allOrderCount}})<div class="spinner-grow text-primary"></div></button></a><br><br>

       <a href="{{route('pendingorder')}}"><button style="position: relative;margin-right: 15px;" class="btn btn-primary btn-sm" data-title="Add" data-toggle="modal"  >Pending Orders ({{$pendingOrderCount}})<div class="spinner-grow text-primary"></div></button></a><br><br>


       <a href="{{route('canceledorder')}}"><button style="position: relative;margin-right: 15px;" 
        class="btn btn-danger btn-sm"   >Canceled orders({{$canceledOrderCount}})<div class="spinner-grow text-primary"></div></button></a><br><br>

        <a href="{{route('deliveredorder')}}"><button style="position: relative;margin-right: 15px;" 
          class="btn btn-warning btn-sm"   >Delivered orders ({{$deliveredOrderCount}})<div class="spinner-grow text-primary"></div></button></a><br><br>




        </div><br><br><hr>

      </div>

      <div class="container">
       <div class="row">
        <div class="col-md-12">


         <div class="  " >
          <table id="mytable" class="table table-responsive table-bordred table-striped 
          table-hover"  >
          <thead class="thead-light">
            <th>Order Code</th>
            <th>Designation</th>
            <th>NAME</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Price</th>
            <th>State</th>

            <th>Edit</th>
            


          </thead>
          <tbody>

            @forelse($orders as $order)
            <tr>
              <td>{{$order->orderCode}}</td>
              <td>{{$order->title}}</td>
              <td>{{$order->fullName}}</td>
              <td>{{$order->phone}}</td>
              <td>{{$order->address}}</td>
              <td>{{$order->price}}</td>

              @if($order->state == "0")
              <td><span class="alert-dark">Pending</span></td>
              @endif
              @if($order->state == "1")
              <td><span class="alert-danger">Canceled</span></td>
              @endif
              @if($order->state == "2")
              <td><span class="alert-primary">Delivered</span></td>
              @endif   
              @if($order->state == "2")
              <td>
               <a onclick="return false;"  href="{{route('manageorder')}}?action=editorder&order_id={{$order->id}}"><p data-placement="top" 
                data-toggle="tooltip" 
                title="Edit">
                <button disabled class="btn btn-success btn-xs " data-title="Edit"  >
                  <i class="fas fa-pen"></i></button></p></a>

                </td>
                @endif 
                @if($order->state != "2")
                <td>
                 <a href="{{route('manageorder')}}?action=editorder&order_id={{$order->id}}"><p data-placement="top" data-toggle="tooltip" 
                  title="Edit">
                  <button class="btn btn-success btn-xs " data-title="Edit"  >
                    <i class="fas fa-pen"></i></button></p></a>

                  </td>
                  @endif 
                </tr>
                @empty
                <p class="alert-warning">No Order Yet!!!</p>
                @endforelse
              </tbody>


            </table>

            {{ $orders->links() }}
            <div class="clearfix"></div>
          </div>
        </div>
      </div>
    </div>





  </div>
</div>



@include('layouts/partials/_admin_footer')

<script  src="{{asset('js/admin.js')}}"></script>
</body>
</html>