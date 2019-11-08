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
     <div  class="col-md-1 col-lg-1">

     </div>

     <div class="col-lg-8 col-md-8" style="background-color: white;">
      @if(isset($flashmessage))
      <div class='alert alert-success alert-dismissible fade show' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
         <span aria-hidden='true'>&times;</span>
       </button>
       <strong>{{$flashmessage}}</strong> 
     </div> 
     @endif
     <h5 style="padding: 3px; text-transform: capitalize;"> {{Auth::user()->name}}</h5><hr>

     <form method="POST"  action="{{ route('profile') }}?action=pinfos">@csrf
      <fieldset id="myFieldset">
        <legend>YOUR LOCATION</legend>
        <div class="form-group">
         <label for="RegionName"><b>Region</b>: </label>
         <select id="RegionName" class="selectpicker form-control dynamic" 
         data-hide-disabled="false" data-live-search="true"   
         data-dependent="cityName" name="RegionName" >
         @foreach($info as $inf)

         @if($inf->RegionName != null)
         <option style="font-weight: bold" selected  value="{{$inf->RegionName}}">{{$inf->RegionName}}</option>
         @endif
         @if($inf->RegionName == null)
         <option style="font-weight: bold" selected  value="">Choose a Region</option>
         @endif

         @foreach ($region as $reg) 
         <option>{{"$reg->regionName"}}</option>
         @endforeach

       </select>
     </div>

     <div class="form-group">
       <label for="cityName"><b>Your City</b>: </label>
       <select id="cityName" class=" form-control" 
       data-hide-disabled="false" data-live-search="true"  name="cityName"  >
       @if($inf->cityName != null)
       <option selected value="{{$inf->cityName}}" >{{$inf->cityName}}</option>
       @endif
       @if($inf->cityName == null)
       <option selected value="" >Choose a City</option>
       @endif
     </select>
   </div> {{ csrf_field() }}
   <div class="form-group">
     <label for="address"><b>Your Address</b>: </label><br>
     @if($inf->address != null)
     <input type="text" class="form-control"  id="address" name="address" value="{{$inf->address}}" >
     @endif
     @if($inf->address == null)
     <input type="text" placeholder=" enter your address" class="form-control"  id="address" name="address" value="" >
     @endif
   </div>
   <div class="form-group">
     <label for="name"><b>Full Name</b>: </label>
     @if($inf->FullName != null)
     <input type="text" class="input-group" name="name" id="name" value="{{$inf->FullName}}" style="text-transform: capitalize;">
     @endif
     @if($inf->FullName == null)
     <input type="text" class="input-group" name="name" id="name" value="" placeholder=" enter your full name" >
     @endif
   </div>

   <div class="form-group">
    <label for="phone"> <b>Phone</b> </label>
    &nbsp;&nbsp;&nbsp;
    @if($inf->phone != null)
    <input  type="tel" class="input-group" placeholder="  9 digits "  pattern="[0-9]{9}" id="phone" name="phone" value="{{$inf->phone}}"><br>
    @endif
    @if($inf->phone == null)
    <input  type="tel" class="input-group" placeholder="  9 digits "  pattern="[0-9]{9}" id="phone" name="phone" value=""><br>
    @endif
  </div>
  <div class="form-group">

   <input type="submit" class="btn btn-warning btn-lg" value="update informations">
 </div>

 @endforeach
</fieldset ><br><br>
</form>

<br><br>

<form id="updatepass" method="POST"  action="{{ route('userUpdatPassword') }}?action=password">@csrf
  <fieldset >
    <legend>Change Your Password</legend>
    <div class="form-group">
     <label for="current"><b>Current Passsword</b>: </label>
     <input type="Passsword" class="input-group" name="current" id="current">
   </div>
   <div class="form-group">
     <label for="password1"><b>New Passsword</b>:<span style="color: red;" id="erlength"></span> </label>
     <input type="Passsword" class="input-group" name="password1" id="password1" placeholder="at least 8 characters">
   </div>
   <div class="form-group">
     <label for="password2"><b>Confirm New Passsword</b>: <span style="color: red" id="errorPass"></span></label>
     <input type="Passsword" class="input-group" name="password2" id="password2">
   </div>

   <div class="form-group">

     <input type="submit" class="btn btn-warning btn-lg" value="update password">
   </div>

 </fieldset >

</form>
<br><br>
</div>


</div>
</div>
</div>


<script >



  $( document ).ready(function() {
   $('#updatepass').on('submit',function(e){

          //e.preventDefault();
          var pass1 = document.getElementById("password1");
          var pass2 = document.getElementById("password2");
          if (pass1.value.length < 8) { 

           var erlength = document.getElementById("erlength");
           erlength.innerHTML ="password must be at least 8 characters";

           return false;
         }
         if (pass1.value!=pass2.value) { 
           var er = document.getElementById("errorPass");
           er.innerHTML ="password did not match";

           return false;
         }


         return true;

       });

 });
</script>

<script  src="{{asset('js/admin.js')}}"></script>
@stop