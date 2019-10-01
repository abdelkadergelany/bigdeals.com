  @extends('layouts/main_layout')


  @section('style')
  <link rel="stylesheet" href="{{asset('css/style.css')}}">

  @stop
  @section('contains')
  <!-- BEGINING  my add-->



  <div class="container">
    <div class="user_css">
      <div class="row">

        @include('layouts/partials/_client_Ui_leftNavbar')

        <div class="col-lg-9">
          <h5> {{Auth::user()->name}}</h5><hr>

          <div class="container-fluid box2-">  

            <div class="ribbon-">

             <!--  <span>Post your Ad </span> --></div>

             <div class="container" id="add" >


              <form style="background-color: white" method="POST" action="{{ route('myadd')}}" >
                @csrf
                <input type="hidden" value="{{$ads->id}}" name="id">

                <div class="modal-header">
                  <button type="button" class="btn btn-primary2 btn-lg btn3d"><span class="glyphicon glyphicon-cloud"></span> Add a new Ads and get 10.000+ potentials buyers in less than 1 hrs</button>



                </div>
                <div class="modal-body">

                  <fieldset id="myFieldset">
                    <legend>Location of the ads</legend>
                    <div class="form-group">
                     <label for="RegionName"><b>Region</b>: </label>
                     <select id="RegionName" class="selectpicker form-control dynamic" 
                     data-hide-disabled="false" data-live-search="true"   
                     data-dependent="cityName" name="RegionName" required >

                     <option selected  value="{{$ads->regionName}}">{{$ads->regionName}}</option>

                     @foreach ($region as $reg) 
                     <option>{{"$reg->regionName"}}</option>
                     @endforeach
                     
                   </select>
                 </div>

                 <div class="form-group">
                   <label for="cityName"><b>City</b>: </label>
                   <select id="cityName" class=" form-control" 
                   data-hide-disabled="false" data-live-search="true" required name="cityName"  >
                   <option selected  value="{{$ads->cityName}}"> {{$ads->cityName}}</option>

                   <!--  <option selected value="" >Choose a city</option> -->

                 </select>
               </div> {{ csrf_field() }}
               <div class="form-group">
                 <label for="address"><b>Address</b>: </label><br>



                 <input type="text" class="form-control" required id="address" name="address" value="{{$ads->address}}" >
               </div>


             </fieldset ><br><br>

             <br><br><br>                     
             <fieldset id="myFieldset">
              <legend>More details</legend>

              <div class="form-group">
               <label for="title"><b>title</b>: </label>
               <input class="form-control " type="text" required  id="title" name="title" value="{{$ads->title}}">
               <div class="alert alert-primary " role="alert">A Good title attract more visitors</div>
             </div>



             <div class="form-group">
               <label for="description"><b>Description</b>:  </label>

               <textarea   class="form-control" id="description" name="description" required="true" rows="6" >{{$ads->description}}</textarea>
               <div class="alert alert-success " role="alert">More details Attracts more visitors</div>
             </div>


             <div class="form-group">
               <label for="price"><b>Price (Tk)</b>: </label>
               <input class="form-control " required type="number" min="0" id="price" name="price" value="{{$ads->price}}"><br>&nbsp;&nbsp;
               <!-- <input type="checkbox" required name="negociable" value="1" ><b>&nbsp;Negociable --></b>
             </div>

           </fieldset > 

           <div style="border: 2px solid blue; padding: 20px;">
            <h5 style="text-align: center; color: blue">Your information </h5>

            <label ><b> Name  <i class="fas fa-user"> </i></b> : </label>

            <span >&nbsp;&nbsp;{{Auth::user()->name}}</span><br><br>


            <label for="phone"><b> Phone  <i class="fas fa-phone"> </i></b> : </label><br>

            Phone 1&nbsp;&nbsp;&nbsp;<input class=" " type="tel" placeholder="  9 digits "  pattern="[0-9]{9}" required  id="phone" 
            name="phone1" value="678681547"><span>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<!-- <button id="span1" type="button" class="btn-sm btn-outline-info"><i class="fas fa-plus">Add another phone</i></button> --><br><br>


              <div id="ph2" style="display: none">
                Phone 2&nbsp;&nbsp;&nbsp;<input  type="tel" placeholder="  9 digits "  pattern="[0-9]{9}"  id="phone2" name="phone2"><button id="del1" type="button" class="btn-sm btn-outline-danger"><i class="fas fa-minus"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<!-- <button id="span2" type="button" class="btn-sm btn-outline-info"><i class="fas fa-plus">Add another phone</i></button> --><br><br>
              </div>

              <div id="ph3" style="display: none">
               Phone 3&nbsp;&nbsp;&nbsp;<input  type="tel" placeholder="  9 digits "  pattern="[0-9]{9}" id="phone3" name="phone3"><button id="del2" type="button" class="btn-sm btn-outline-danger"><i class="fas fa-minus"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<br>
             </div>



           </div>


         </div>
         <div class="modal-footer ">
          <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Update"><span class="glyphicon glyphicon-ok-sign" ></span> 
        </div>


      </form>

      <!-- /.modal-dialog --> 
    </div>
  </div>

</div>
</div>
</div>
</div>


<script  src="{{asset('js/multiplefile.js')}}"></script>
<script  src="{{asset('js/admin.js')}}"></script>


@stop