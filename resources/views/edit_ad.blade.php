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

      <form method="POST" action="{{route('editAd')}}?buyNowFlag={{$ads->buyNow}}&id={{$ads->id}}&isValidateFlag={{$ads->isValidate}}&isBlockedFlag={{$ads->isBlocked}}" enctype="multipart/form-data">
        @csrf
        
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
          <h4 class="modal-title custom_align" id="Heading">Edit Ads</h4>
        </div>
        <div class="modal-body">


         <div class="form-group">
           <label for="used"><b><span style="color: red;">ADS STATE</span></b>:  </label><br>
           
           

           @if($ads->isValidate == 0)
           
           &nbsp;&nbsp;&nbsp;<input class=" "  checked type="radio" required  value="0" id="isValidate1" name="isValidate"> <b><label for="isValidate1">Desactivated</label></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif

           @if($ads->isValidate == 1)
           
           &nbsp;&nbsp;&nbsp;<input class=" "   type="radio" required  value="0" id="isValidate11" name="isValidate"> <b><label for="isValidate11">Desactivated</label></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
           @if($ads->isValidate == 1)
           &nbsp;&nbsp;&nbsp;<input class=" " checked type="radio" required  value="1" id="isValidate2" name="isValidate"><b><label for="isValidate2">Activated</label></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
           @if($ads->isValidate == 0)
           &nbsp;&nbsp;&nbsp;<input class=" "  type="radio" required  value="1" id="isValidate22" name="isValidate"><b><label for="isValidate22">Activated</label></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
           
           <br><br>
           <label for="used"><b><span style="color: red;">BLOCK STATE</span></b>:  </label><br>&nbsp;&nbsp;
           @if($ads->isBlocked == 1)
           &nbsp;&nbsp;<input class=" " type="radio" checked required value="1" id="isBlocked1" name="isBlocked"> <b><label for="isBlocked1">Blocked</label></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif

           @if($ads->isBlocked == 0)
           &nbsp;&nbsp;<input class=" " type="radio"  required value="1" id="isBlocked11" name="isBlocked"><b><label for="isBlocked11">Blocked</label></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
           @if($ads->isBlocked == 0)
           &nbsp;&nbsp;<input class=" " type="radio" checked required value="0" id="Unblocked1" name="isBlocked"><b><label for="Unblocked1">Unblocked</label></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
           @if($ads->isBlocked == 1)
           &nbsp;&nbsp;<input class=" " type="radio"  required value="0" id="Unblocked2" name="isBlocked"><b><for for="Unblocked2">Unblocked</for></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
         </div><br><br>
         <div class="form-group">
           <label for="used"><b><span style="color: red;">VIP STATUS</span></b>:  </label><br>
           @if($ads->buyNow == "0")
           &nbsp;&nbsp;<input class=" " type="radio" checked required value="0" id="Cancel" name="buyNow"><b><label for="Cancel">Cancel</label></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" " type="radio"  required value="1" id="Requested" name="buyNow"><b><label for="Requested">Requested</label></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" " type="radio"  required value="2" id="WaitingForCollection" name="buyNow"><b><label for="WaitingForCollection">WaitingForCollection</label></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" " type="radio"  required value="3" id="Confirmed" name="buyNow"><b><label for="Confirmed">Confirmed</label></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif

           @if($ads->buyNow == "1")
           &nbsp;&nbsp;<input class=" " type="radio"  required value="0" id="" name="buyNow"><b>Cancel</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" " type="radio" checked required value="1" id="" name="buyNow"><b>Requested</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" " type="radio"  required value="2" id="" name="buyNow"><b>WaitingForCollection</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" " type="radio"  required value="3" id="" name="buyNow"><b>Confirmed</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif

           @if($ads->buyNow == "3")
           &nbsp;&nbsp;<input class=" " type="radio"  required value="0" id="" name="buyNow"><b>Cancel</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" " type="radio"  required value="1" id="" name="buyNow"><b>Requested</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" "  type="radio"  required value="2" id="" name="buyNow"><b>WaitingForCollection</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" " type="radio" checked required value="3" id="" name="buyNow"><b>Confirmed</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
           @if($ads->buyNow == "2")
           &nbsp;&nbsp;<input class=" " type="radio"  required value="0" id="" name="buyNow"><b>Cancel</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" " type="radio"  required value="1" id="" name="buyNow"><b>Requested</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" " checked type="radio"  required value="2" id="" name="buyNow"><b>WaitingForCollection</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           &nbsp;&nbsp;<input class=" " type="radio"  required value="3" id="" name="buyNow"><b>Confirmed</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
           @endif
         </div><br>

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