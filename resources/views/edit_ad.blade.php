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
    
    <div class="container-fluid" id="add" style="border: 1px solid green" >
     
      <form method="POST" action="{{route('editAd')}}?buyNow={{$ads->buyNow}}&id={{$ads->id}}" enctype="multipart/form-data">
        @csrf
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          <h4 class="modal-title custom_align" id="Heading">Add a new Ads</h4>
        </div>
        <div class="modal-body">


         <div class="form-group">
           <label for="used"><b><span style="color: red;">ADS STATE</span></b>:  </label><br>
           
           

           @if($ads->isValidate == 0)
           
           <b>Desactivated</b>&nbsp;&nbsp;&nbsp;<input class=" "  checked type="radio" required  value="0" id="" name="isValidate">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif

           @if($ads->isValidate == 1)
           
           <b>Desactivated</b>&nbsp;&nbsp;&nbsp;<input class=" "   type="radio" required  value="0" id="" name="isValidate">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
           @if($ads->isValidate == 1)
           <b>ACtivated</b>&nbsp;&nbsp;&nbsp;<input class=" " checked type="radio" required  value="1" id="" name="isValidate">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
           @if($ads->isValidate == 0)
           <b>ACtivated</b>&nbsp;&nbsp;&nbsp;<input class=" "  type="radio" required  value="1" id="" name="isValidate">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif


           @if($ads->isBlocked == 1)
           <b>Blocked</b>&nbsp;&nbsp;<input class=" " type="radio" checked required value="1" id="" name="isBlocked">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif

           @if($ads->isBlocked == 0)
           <b>Blocked</b>&nbsp;&nbsp;<input class=" " type="radio"  required value="1" id="used" name="isBlocked">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
           @if($ads->isBlocked == 0)
           <b>Unblocked</b>&nbsp;&nbsp;<input class=" " type="radio" checked required value="0" id="" name="isBlocked">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
           @if($ads->isBlocked == 1)
           <b>Unblocked</b>&nbsp;&nbsp;<input class=" " type="radio"  required value="0" id="" name="isBlocked">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
         </div>

         <div class="form-group">
           <label for="category"><b> Category</b>: </label>
           <select id="category" class="selectpicker form-control dynamic" 
           data-hide-disabled="false" data-live-search="true"  required  
           data-dependent="subCategoryName" name="category">

           <option selected  value="{{$ads->categoryName}}">{{$ads->categoryName}}</option>
           
           @foreach ($category as $cat) 
           <option>{{"$cat->categoryName"}}</option>
           @endforeach
           
         </select>
       </div>
       <div class="form-group">
         <label for="subCategoryName"><b>Sub-category</b>: </label>
         <select id="subCategoryName" class=" form-control" 
         data-hide-disabled="false" data-live-search="true" required
         name="subCategoryName" >
         <option selected  value="{{$ads->subCategoryName}}">{{$ads->subCategoryName}}
         </option>
       </select>
     </div>{{ csrf_field() }}


     <div class="col-md-4"></div>
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

@include('layouts/partials/_admin_footer')

<script  src="{{asset('js/admin.js')}}"></script>
</body>
</html>