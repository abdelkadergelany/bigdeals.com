<!DOCTYPE html>
<html>
<head>
  <title>Admin/edit Ads </title>
  @include('layouts/partials/_linkedfiles')
  <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
  <div class="wrapper">
   @include('layouts/partials/_admin_sidebar')
   <div id="content">
    @include('layouts/partials/_admin_navbar')
    
    <div class="container" id="add" style="border: 1px solid green" >

      <form method="POST" action="{{route('editRegion')}}?id={{$regId}}" >
        @csrf
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          <h4 class="modal-title custom_align" id="Heading">Edit Region</h4>
        </div>
        <div class="modal-body">


      
       <div class="form-group">
         <label for="name"><b>Region Name</b>: </label>
         <input class="form-control " type="text" required value="{{$regName}}" id="" name="name">
     </div>


     <div class="col-md-4"></div>
   </div>
    <div class="modal-footer ">
  <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Update"><span class="glyphicon glyphicon-ok-sign" ></span> 
</div>
 </div>



</form>

<!-- /.modal-dialog --> 
</div>

</div>
</div>
</div>
</div>

@include('layouts/partials/_admin_footer')

<script  src="{{asset('js/admin.js')}}"></script>
</body>
</html>