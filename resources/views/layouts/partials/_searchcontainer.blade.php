
<div class="container search-option mt-5 mb-5">
  <form action="{{ route('search') }}" method="GET" id="search">
    <input type="hidden" name="_token" id="token-message" value="{{csrf_token()}}"> 

    <div class="form-row align-items-center">
      <div class="col-lg-6 col-sx-12 lg-3">
        <div class="input-group mb-2 mt-2">


          <select id="first-disabled" class="selectpicker form-control" data-hide-disabled="false"
          data-live-search="true" name="city" >
          

          @if(isset($cit))
          <option value="{{$cit}}" selected>{{$cit}}</option>
         
          @else
          <option value="" selected>Choose the city</option>
           @endif
          <optgroup label="Centre" >
<!--                    <option>All the centre</option>
-->
@foreach($cats = getSubCat("Centre","city") as $cat)

<option style="text-transform: capitalize !important;" >{{$cat->cityName}}</option>
@endforeach

</optgroup>
<optgroup label="Littoral">


 @foreach($cats = getSubCat("Littoral","city") as $cat)

 <option style="text-transform: capitalize !important;">{{$cat->cityName}}</option>
 @endforeach


</optgroup>
<optgroup label="West">

 @foreach($cats = getSubCat("West","city") as $cat)

 <option style="text-transform: capitalize !important;">{{$cat->cityName}}</option>
 @endforeach

</optgroup>
<optgroup label="South West">

 @foreach($cats = getSubCat("South West","city") as $cat)

 <option style="text-transform: capitalize !important;">{{$cat->cityName}}</option>
 @endforeach

</optgroup>
<optgroup label="North West">
  @foreach($cats = getSubCat("North West","city") as $cat)

  <option style="text-transform: capitalize !important;">{{$cat->cityName}}</option>
  @endforeach


</optgroup>
<optgroup label="Far North">
  @foreach($cats = getSubCat("Far North","city") as $cat)

  <option style="text-transform: capitalize !important;">{{$cat->cityName}}</option>
  @endforeach
</optgroup>
<optgroup label="North">
 @foreach($cats = getSubCat("North","city") as $cat)

 <option style="text-transform: capitalize !important;">{{$cat->cityName}}</option>
 @endforeach
</optgroup>

<optgroup label="East">
 @foreach($cats = getSubCat("East","city") as $cat)

 <option style="text-transform: capitalize !important;">{{$cat->cityName}}</option>
 @endforeach
</optgroup>

<optgroup label="Adamawa">
 @foreach($cats = getSubCat("Adamawa","city") as $cat)

 <option style="text-transform: capitalize !important;">{{$cat->cityName}}</option>
 @endforeach
</optgroup>
<optgroup label="South">
  @foreach($cats = getSubCat("South","city") as $cat)

  <option style="text-transform: capitalize !important;">{{$cat->cityName}}</option>
  @endforeach
</optgroup>

</select>
</div>
</div>


<div class="col-lg-6 col-sx-12 lg-3">

  <div class="input-group mb-2 mt-2">
    <select id="second-disabled" class="selectpicker form-control" data-hide-disabled="false"
    data-live-search="true" name="subCat">

  
     @if(isset($subcat))
          <option value="{{$subcat}}" selected>{{$subcat}}</option>
         
          @else
          <option value="" selected>choose  sub-category for specific research</option>
           @endif
   

    <optgroup label="MOBILE PHONES">
     @foreach($cats = getSubCat("MOBILE PHONES","subCat") as $cat)

     <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
     @endforeach

   </optgroup>

   <optgroup label="ELECTRONICS">
    @foreach($cats = getSubCat("ELECTRONICS","subCat") as $cat)

    <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
    @endforeach

  </optgroup>

  <optgroup label="AUTOMOTIVE">
    @foreach($cats = getSubCat("AUTOMOTIVE","subCat") as $cat)

    <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
    @endforeach

  </optgroup>

  <optgroup label="REAL ESTATE">
   @foreach($cats = getSubCat("REAL ESTATE","subCat") as $cat)

   <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
   @endforeach

 </optgroup>

 <optgroup label=" FASHION AND CLOTHING">
  @foreach($cats = getSubCat("FASHION AND CLOTHING","subCat") as $cat)

  <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
  @endforeach


</optgroup>
<optgroup label="HOUSE AND KITCHENS">
 @foreach($cats = getSubCat("HOUSE AND KITCHENS","subCat") as $cat)

 <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
 @endforeach



</optgroup>
<optgroup label="PETS">
  @foreach($cats = getSubCat("PETS","subCat") as $cat)

  <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
  @endforeach


</optgroup>

<optgroup label="HEALTH AND BEAUTY">
  @foreach($cats = getSubCat("HEALTH AND BEAUTY","subCat") as $cat)

  <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
  @endforeach



</optgroup>

<optgroup label="LEISURE,SPORTS AND CHILDREN">
 @foreach($cats = getSubCat("LEISURE, SPORTS AND CHILDREN","subCat") as $cat)

 <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
 @endforeach


</optgroup>

<optgroup label="SERVICES">
 @foreach($cats = getSubCat("SERVICES","subCat") as $cat)

 <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
 @endforeach


</optgroup>

<optgroup label="JOBS">
 @foreach($cats = getSubCat("JOBS","subCat") as $cat)

 <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
 @endforeach
</optgroup>


<optgroup label="EDUCATION">
  @foreach($cats = getSubCat("EDUCATION","subCat") as $cat)

  <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
  @endforeach


</optgroup>

<optgroup label="AGRICULTURE AND FOODSTUFF">
  @foreach($cats = getSubCat("AGRICULTURE AND FOODSTUFF","subCat") as $cat)

  <option  style="text-transform: capitalize !important;">{{$cat->subCategoryName}} </option>
  @endforeach


</optgroup>
</select>
</div>
</div>
<div class="col-8 lg-4">

  <div class="input-group mb-2">
    <input type="text" class="form-control" id="inlineFormInputGroup"
    placeholder="Tell us what you are looking for" name="input">
  </div>
</div>
<div class="col-4 lg-2">
  <button type="submit" class="btn btn-primary mb-2" id="submitSearch"> <i class="fa fa-search "></i>Search</button>
</div>

</div>
</form>

</div>

