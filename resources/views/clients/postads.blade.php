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


              <form style="background-color: white" method="POST" action="{{ route('storeAdd') }}?buyNow=0" enctype="multipart/form-data">
                @csrf

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
                     data-dependent="cityName" name="RegionName" required>

                     <option selected  value="">Choose a region</option>

                     @foreach ($region as $reg) 
                     <option>{{"$reg->regionName"}}</option>
                     @endforeach
                     
                   </select>
                 </div>

                 <div class="form-group">
                   <label for="cityName"><b>City</b>: </label>
                   <select id="cityName" class=" form-control" 
                   data-hide-disabled="false" data-live-search="true" required name="cityName"  >
                   <!--  <option selected value="" >Choose a city</option> -->

                 </select>
               </div> {{ csrf_field() }}
               <div class="form-group">
                 <label for="address"><b>Address</b>: </label><br>



                 <input type="text" class="form-control" required id="address" name="address" >
               </div>


             </fieldset ><br><br>

             <fieldset id="myFieldset">
              <legend>Ads Category</legend>

              <div class="form-group">
               <label for="category"><b> Category</b>: </label>
               <select id="category" class="selectpicker form-control dynamic" 
               data-hide-disabled="false" data-live-search="true"  required  
               data-dependent="subCategoryName" name="category">

               <option selected  value="{{$catval}}">{{$catval}}</option>

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
             <option selected  value="{{$subCatval}}">{{$subCatval}}</option>
           </select>
         </div>{{ csrf_field() }}

       </fieldset ><br><br><br>                    
       <fieldset id="myFieldset">
        <legend>More details</legend>

        <div class="form-group">
         <label for="title"><b>title</b>: </label>
         <input class="form-control " type="text" required  id="title" name="title">
         <div class="alert alert-primary " role="alert">A Good title attract more visitors</div>
       </div>



       <div class="form-group">
         <label for="description"><b>Description</b>:  </label>

         <textarea   class="form-control" id="description" name="description" required="true" rows="6"></textarea>
         <div class="alert alert-success " role="alert">More details Attracts more visitors</div>
       </div>
       @if(($catval == 'electronics') || ($catval == 'mobile phones') || ($catval == 'automotive') )
       <div class="form-group">
         <label for="brandName"><b>Brand</b>: </label>
         <select id="brandName" class=" selectpicker form-control dynamic"  data-hide-disabled="false" data-live-search="true" 
         required data-dependent="modelName" name="brandName">
         <option selected value="" >Choose a Brand</option>


         @foreach ($brand as $brand) 
         <option>{{"$brand->brandName"}}</option>
         @endforeach
       </select>
     </div>

     <div class="form-group">
       <label for="modelName"><b>Model</b>: </label>
       <select id="modelName" class=" form-control" data-hide-disabled="false" 
       data-live-search="true" required  name="modelName" >

     </select>
   </div>{{ csrf_field() }}
   @endif
   @if($catval == 'fashion and clothing')

   <div class="form-group">
     <label for="size"><b>Size</b>: </label>
     <select id="size" class=" form-control" 
     data-hide-disabled="false" data-live-search="true" required name="size" >
     <option selected>Choose a Size</option>
     @foreach ($size as $size) 
     <option>{{"$size->size"}}</option>
     @endforeach

   </select>
 </div>   
 @endif


 <div class="form-group">
   <label for=""><b>More details</b>:  </label><br>
   <label for="used">Used</label>&nbsp;&nbsp;<input class="isUsed" type="radio"  required value="1" id="used" name="isUsed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <label for="new">New</label>&nbsp;&nbsp;&nbsp;<input class=" " type="radio" required  value="0" id="new" name="isUsed">

 </div>

 <div class="form-group">
   <label for="authentic"><b>Authenticity</b>: </label><br>
   <label for="authentic">Authentic</label>&nbsp;&nbsp;<input class=" " type="radio"  required value="1" id="authentic" name="authenticity">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
   <label for="refurnished">Refurnished</label>&nbsp;&nbsp;&nbsp;<input class=" " type="radio" required value="0" id="refurnished" name="authenticity">
 </div>
 <div class="form-group">
   <label for="price"><b>Price (Fcfa)</b>: </label>
   <input class="form-control " required type="number" min="0" id="price" name="price"><br>&nbsp;&nbsp;
   <input type="checkbox"  name="negociable" value="1" id="negotiable" ><b>&nbsp;<label for="negotiable">Negotiable</label></b>
 </div>

 </fieldset > 

<fieldset id="myFieldset">
                    <legend>Pictures</legend>
 <div class="form-group">
  <label for="file"><b>Pictures</b>(<b><span style="color: red;">Less than 500kb</span></b>): </label><br>
                            <!-- imagae1:  <input type="file" name="file1" required>
                            imagae2:  <input type="file" name="file2" >
                            imagae3:  <input type="file" name="file3" >
                            imagae4:  <input type="file" name="file4" ><br><br>
                            imagae5:  <input type="file" name="file5" > -->


                            <div>
                              <label style="font-size: 14px;">
                                <span style='color:navy;font-weight:bold'>Attachment Instructions :</span>
                              </label>
                              <ul>
                                <li>
                                  Allowed only files with extension (jpg, png, gif)
                                </li>
                                <li>
                                  Maximum number of allowed files 5 with 500 KB for each
                                </li>
                                <li>
                                  you can select files from different folders
                                </li>
                              </ul>
                              <!--To give the control a modern look, I have applied a stylesheet in the parent span.-->
                              <span class="btn  btn-success fileinput-button">
                                <span>Select Attachment</span>
                                <input type="file" name="files[]" id="files" multiple accept="image/jpeg, image/png, image/gif,"><br />
                              </span>
                              <output id="Filelist"></output>
                            </div>



                          </div>



                 </fieldset >         

                


                        <div style="border: 2px solid blue; padding: 20px;">
                          <h5 style="text-align: center; color: blue">Your information </h5>

                          <label ><b> Name  <i class="fas fa-user"> </i></b> : </label>

                          <span style="text-transform: capitalize;">&nbsp;&nbsp;{{Auth::user()->name}}</span><br><br>


                          <label for="phone"><b> Phone  <i class="fas fa-phone"> </i></b> : </label><br>

                          Phone 1&nbsp;&nbsp;&nbsp;<input class=" " type="tel" placeholder="  9 digits " value="" pattern="[0-9]{9}" required  id="phone" name="phone1"><span>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="span1" type="button" class="btn-sm btn-outline-info"><i class="fas fa-plus">Add another phone</i></button><br><br>


                            <div id="ph2" style="display: none">
                              Phone 2&nbsp;&nbsp;&nbsp;<input  type="tel" placeholder="  9 digits "  pattern="[0-9]{9}"  id="phone2" name="phone2"><button id="del1" type="button" class="btn-sm btn-outline-danger"><i class="fas fa-minus"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<button id="span2" type="button" class="btn-sm btn-outline-info"><i class="fas fa-plus">Add another phone</i></button><br><br>
                            </div>
                            
                            <div id="ph3" style="display: none">
                             Phone 3&nbsp;&nbsp;&nbsp;<input  type="tel" placeholder="  9 digits "  pattern="[0-9]{9}" id="phone3" name="phone3"><button id="del2" type="button" class="btn-sm btn-outline-danger"><i class="fas fa-minus"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<br>
                           </div>



                         </div>


                       </div>
                       <div class="modal-footer ">
                        <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Post"><span class="glyphicon glyphicon-ok-sign" ></span> 
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