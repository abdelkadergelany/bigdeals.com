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
           <label for="RegionName"><b>Region</b>: </label>
           <select id="RegionName" class="selectpicker form-control dynamic" 
           data-hide-disabled="false" data-live-search="true"   
           data-dependent="cityName" name="RegionName" required>

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
         
         <option selected value="{{$ads->cityName}} " >{{$ads->cityName}}</option>
         
       </select>
     </div> {{ csrf_field() }}
     <div class="form-group">
       <label for="address"><b>Address</b>: </label><br>
       
       

       <input type="text" class="form-control" required id="address" name="address" 
       value="{{$ads->address}}" >
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

 <div class="form-group">
   <label for="title"><b>title</b>: </label>
   <input class="form-control " type="text" required  value="{{$ads->title}}" id="title" name="title">
 </div>



 <div class="form-group">
   <label for="description"><b>Description</b>:  </label>
   
   <textarea value="{{$ads->description}}"  class="form-control" id="description" name="description" required="true" rows="6">{{$ads->description}}</textarea>
 </div>
 @if(($ads->categoryName == 'electronic') || ($ads->categoryName == 'mobile phones') || ($ads->categoryName == 'automotive') )
 <div class="form-group">
   <label for="brandName"><b>Brand</b>: </label>
   <select id="brandName" class=" selectpicker form-control dynamic"  data-hide-disabled="false" data-live-search="true" 
   required data-dependent="modelName" name="brandName"  >
   <option selected value="{{$ads-> brand}}" >{{$ads-> brand}}</option>
   
   
   @foreach ($brand as $brand) 
   <option>{{"$brand->brandName"}}</option>
   @endforeach
 </select>
</div>

<div class="form-group">
 <label for="modelName"><b>Model</b>: </label>
 <select id="modelName" class=" form-control" data-hide-disabled="false" 
 data-live-search="true" required  name="modelName" >
 <option selected value="{{$ads-> model}}" >{{$ads-> model}}</option>                   
</select>
</div>{{ csrf_field() }}
@endif
@if($ads->categoryName == 'Fashion and Clothing')

<div class="form-group">
 <label for="size"><b>Size</b>: </label>
 <select id="size" class=" form-control" 
 data-hide-disabled="false" data-live-search="true" required name="size" >
 <option selected value="{{$ads-> size}}">{{$ads-> size}}</option>
 @foreach ($size as $size) 
 <option>{{"$size->size"}}</option>
 @endforeach
 
</select>
</div>   
@endif


<div class="form-group">
 <label for="used"><b>More details</b>:  </label><br>
 @if($ads->isUsed == '1' )
 Used&nbsp;&nbsp;<input class=" " type="radio" checked required value="1" id="used" name="isUsed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 @endif
 @if($ads->isUsed == '0' )
 Used&nbsp;&nbsp;<input class=" " type="radio"  required value="1" id="used" name="isUsed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 @endif

 @if($ads->isUsed == '0' )
 New&nbsp;&nbsp;&nbsp;<input class=" " checked type="radio" required  value="0" id="new" name="isUsed">
 @endif
 @if($ads->isUsed == '1' )
 New&nbsp;&nbsp;&nbsp;<input class=" "  type="radio" required  value="0" id="new" name="isUsed">
 @endif
 
</div>

<div class="form-group">
 <label for="authentic"><b>Authenticity</b>: </label><br>
 @if($ads->authenticity == '1' )
 Authentic&nbsp;&nbsp;<input class=" " checked type="radio"  required value="1" id="authentic" name="authenticity">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 @endif

 @if($ads->authenticity == '0' )
 Authentic&nbsp;&nbsp;<input class=" "  type="radio"  required value="1" id="authentic" name="authenticity">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
 @endif

 @if($ads->authenticity == '0' )
 Refurnished&nbsp;&nbsp;&nbsp;<input class=" " checked type="radio" required value="0" id="refurnished" name="authenticity">
 @endif
 @if($ads->authenticity == '1' )
 Refurnished&nbsp;&nbsp;&nbsp;<input class=" "  type="radio" required value="0" id="refurnished" name="authenticity">
 @endif


 
</div>
<div class="form-group">
 <label for="price"><b>Price (Tk)</b>: </label>
 <input class="form-control" value="{{$ads->price}}" required type="number" min="0" id="price" name="price"><br>&nbsp;&nbsp;
 @if($ads->negociable == '1' )
 <input type="checkbox" checked required name="negociable" value="1" ><b>&nbsp;Negociable</b>
 @endif
 @if($ads->negociable == '0' )
 <input type="checkbox"  required name="negociable" value="1" ><b>&nbsp;Negociable</b>
 @endif
</div>
<div class="form-group">
 <label for="phone"><b>Phone</b>: </label>

 <input class="form-control " value="{{$ads->phone1}}" type="tel"  pattern="[0-9]{9}" required  id="phone" name="phone1">
</div>



<div class="row">
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <div class="box slideshow">
      <h5>Uploaded images</h5>
      
      <div id="get-inspired" class="owl-carousel owl-theme">
       
        <div class="item"><a href="#"><img src="publication/{{$ads->pict1}}" alt="pcit1" 
         class="img-thumbnail" ></a>
       </div>
       

       @if($ads->pict2 != null)
       <div class="item"><a href="#"><img src="publication/{{$ads->pict2}}" alt="pcit2" 
         class="img-thumbnail"></a>
       </div>
       @endif

       @if($ads->pict3 != null)
       <div class="item"><a href="#"><img src="publication/{{$ads->pict3}}" alt="pcit3" 
        class="img-thumbnail"></a>
      </div>
      @endif

      @if($ads->pict4 != null)
      <div class="item"><a href="#"><img src="publication/{{$ads->pict4}}" alt="pcit4" 
       class="img-thumbnail"></a>
     </div>
     @endif
     @if($ads->pict5 != null)
     <div class="item"><a href="#"><img src="publication/{{$ads->pict5}}" alt="pcit5" 
       class="img-thumbnail"></a>
     </div>
     @endif
   </div>
 </div>
</div>
</div>
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