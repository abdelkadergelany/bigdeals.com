<!DOCTYPE html>
<html>
   <head>
      <title>Admin/Add new Ads </title>
      @include('layouts/partials/_linkedfiles')
      <link rel="stylesheet" href="{{asset('css/admin.css')}}">
   </head>
   <body>
      <div class="wrapper">
         @include('layouts/partials/_admin_sidebar')
         <div id="content">
            @include('layouts/partials/_admin_navbar')
         
              <div class="container-fluid" id="add" style="border: 1px solid green" >
                       
                    <form method="POST" action="{{ route('addNewAd') }}?buyNow=1" enctype="multipart/form-data">
                        @csrf
                      
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Add a new Ads</h4>
                     </div>
                     <div class="modal-body">
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
                                 <option selected  value={{$subCatval}}>{{$subCatval}}</option>
                             </select>
                        </div>{{ csrf_field() }}

                        <div class="form-group">
                           <label for="title"><b>title</b>: </label>
                           <input class="form-control " type="text" required  id="title" name="title">
                        </div>



                          <div class="form-group">
                           <label for="description"><b>Description</b>:  </label>
                          
                           <textarea   class="form-control" id="description" name="description" required="true" rows="6"></textarea>
                        </div>
                               @if(($catval == 'Electronics') || ($catval == 'Mobile Phones') )
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
                                 @if($catval == 'Fashion and Clothing')

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
                           <label for="used"><b>More details</b>:  </label><br>
                           Used&nbsp;&nbsp;<input class=" " type="radio"  required value="1" id="used" name="isUsed">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           New&nbsp;&nbsp;&nbsp;<input class=" " type="radio" required  value="0" id="new" name="isUsed">
                           
                        </div>

                         <div class="form-group">
                           <label for="authentic"><b>Authenticity</b>: </label><br>
                           Authentic&nbsp;&nbsp;<input class=" " type="radio"  required value="1" id="authentic" name="authenticity">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           Refurnished&nbsp;&nbsp;&nbsp;<input class=" " type="radio" required value="0" id="refurnished" name="authenticity">
                        </div>
                        <div class="form-group">
                           <label for="price"><b>Price (Tk)</b>: </label>
                           <input class="form-control " required type="number" min="0" id="price" name="price"><br>&nbsp;&nbsp;
                           <input type="checkbox" required name="negociable" value="1" ><b>&nbsp;Negociable</b>
                         </div>

                           <div class="form-group">
                          <label for="file"><b>Pictures</b>(<b><span style="color: red;">Less than 2Mb</span></b>): </label><br>
                          imagae1:  <input type="file" name="file1" required>
                          imagae2:  <input type="file" name="file2" >
                          imagae3:  <input type="file" name="file3" >
                          imagae4:  <input type="file" name="file4" ><br><br>
                          imagae5:  <input type="file" name="file5" >
                           
                        </div>
                        <div style="border: 2px solid blue; padding: 20px;">
                           <label for="phone"><b> Phone  <i class="fas fa-phone"> </i></b> : </label><br>
                             
                          Phone 1&nbsp;&nbsp;&nbsp;<input class=" " type="tel" placeholder="9 digits" value="" pattern="[0-9]{9}" required  id="phone" name="phone1"><span>
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button id="span1" type="button" class="btn-sm btn-outline-info"><i class="fas fa-plus">Add another phone</i></button><br><br>
                           
                            
                           <div id="ph2" style="display: none">
                            Phone 2&nbsp;&nbsp;&nbsp;<input  type="tel" placeholder="9 digits"  pattern="[0-9]{9}"  id="phone2" name="phone2"><button id="del1" type="button" class="btn-sm btn-outline-danger"><i class="fas fa-minus"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<button id="span2" type="button" class="btn-sm btn-outline-info"><i class="fas fa-plus">Add another phone</i></button><br><br>
                          </div>
                          
                           <div id="ph3" style="display: none">
                           Phone 3&nbsp;&nbsp;&nbsp;<input  type="tel" placeholder="9 digits"  pattern="[0-9]{9}" id="phone3" name="phone3"><button id="del2" type="button" class="btn-sm btn-outline-danger"><i class="fas fa-minus"></i></button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<br>
                           </div>

                           
                           
                        </div>
                        

                     </div>
                     <div class="modal-footer ">
                        <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Add"><span class="glyphicon glyphicon-ok-sign" ></span> 
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