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
         
              <div class="container-fluid" id="add" style="border: 1px solid green" >
                       
                    <form method="POST" action="{{ route('updateUsers') }}">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Add a new Ads</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                           <label for="first-disabled"><b>Region</b>: </label>
                            <select id="RegionName" class="selectpicker form-control dynamic" 
                            data-hide-disabled="false" data-live-search="true"   
                            data-dependent="cityName" required>

                               <option selected  value="">Choose a region</option>
                    
                                          @foreach ($region as $reg) 
                                           <option>{{"$reg->regionName"}}</option>
                                          @endforeach
                   
                             </select>
                        </div>

                        <div class="form-group">
                           <label for="first-disabled"><b>City</b>: </label>
                            <select id="cityName" class=" form-control" 
                            data-hide-disabled="false" data-live-search="true" required  >
                              <!--  <option selected value="" >Choose a city</option> -->
                                               
                             </select>
                        </div> {{ csrf_field() }}
                        <div class="form-group">
                           <label for="address"><b>Address</b>: </label><br>
                           
                           <input type="text" class="form-control required id="address" name="address" >
                         </div>

                          <div class="form-group">
                           <label for="first-disabled"><b> Category</b>: </label>
                            <select id="category" class="selectpicker form-control dynamic" 
                            data-hide-disabled="false" data-live-search="true"  required  
                            data-dependent="subCategoryName">

                               <option selected  value={{$catval}}>{{$catval}}</option>
                    
                                          @foreach ($category as $cat) 
                                           <option>{{"$cat->categoryName"}}</option>
                                          @endforeach
                   
                             </select>
                        </div>
                        <div class="form-group">
                           <label for="first-disabled"><b>Sub-category</b>: </label>
                            <select id="subCategoryName" class=" form-control" 
                            data-hide-disabled="false" data-live-search="true" required  >
                                 <option selected  value={{$catval}}>{{$subCatval}}</option>
                             </select>
                        </div>{{ csrf_field() }}

                        <div class="form-group">
                           <label for="address"><b>title</b>: </label>
                           <input class="form-control " type="text" required  id="title" name="title">
                        </div>



                          <div class="form-group">
                           <label for="phone"><b>Description</b>:  </label>
                          
                           <textarea   class="form-control" id="description" name="description" required="true" rows="6"></textarea>
                        </div>
                               @if($catval == 'Electronic' || $catval == 'Mobile Phones' )
                         <div class="form-group">
                           <label for="first-disabled"><b>Brand</b>: </label>
                            <select id="brandName" class=" selectpicker form-control dynamic"  data-hide-disabled="false" data-live-search="true" 
                            required data-dependent="modelName" name="brandName">
                               <option selected value="" >Choose a Brand</option>
                             
                    
                                          @foreach ($brand as $brand) 
                                           <option>{{"$brand->brandName"}}</option>
                                          @endforeach
                             </select>
                        </div>

                         <div class="form-group">
                           <label for="first-disabled"><b>Model</b>: </label>
                     <select id="modelName" class=" form-control" data-hide-disabled="false" 
                     data-live-search="true" required  name="modelName" >
                                               
                      </select>
                        </div>{{ csrf_field() }}
                             @endif
                                 @if($catval == 'Fashion and Clothing')

                        <div class="form-group">
                           <label for="first-disabled"><b>Size</b>: </label>
                            <select id="" class=" form-control" 
                            data-hide-disabled="false" data-live-search="true" required  >
                               <option selected value="" >Choose a Size</option>
                                @foreach ($size as $size) 
                                           <option>{{"$size->size"}}</option>
                                 @endforeach
                                               
                             </select>
                        </div>   
                                 @endif


                        <div class="form-group">
                           <label for="phone"><b>More details</b>:  </label><br>
                           Used&nbsp;&nbsp;<input class=" " type="radio"  required value="used" id="used" name="used">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           New&nbsp;&nbsp;&nbsp;<input class=" " type="radio" required  value="new" id="used" name="used">
                           
                        </div>

                         <div class="form-group">
                           <label for="phone"><b>Authenticity</b>: </label><br>
                           Authentic&nbsp;&nbsp;<input class=" " type="radio"  required value="authentic" id="used" name="authenticity">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                           Refurnished&nbsp;&nbsp;&nbsp;<input class=" " type="radio" required value="refurnished" id="used" name="authenticity">
                        </div>
                        <div class="form-group">
                           <label for="address"><b>Price (Tk)</b>: </label>
                           <input class="form-control " required type="number" min="0" id="price" name="price"><br>&nbsp;&nbsp;
                           <input type="checkbox" required name="negociable" ><b>&nbsp;Negociable</b>
                         </div>

                           <div class="form-group">
                          <label for="file"><b>Pictures</b>(<b><span style="color: red;">Less than 2Mb</span></b>): </label><br>
                          imagae1:  <input type="file" name="file1" required>
                          imagae2:  <input type="file" name="file2" >
                          imagae3:  <input type="file" name="file3" >
                          imagae4:  <input type="file" name="file4" ><br><br>
                          imagae5:  <input type="file" name="file5" >
                           
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
  
<script >
$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {

    

   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var _token = $('input[name="_token"]').val();
   $.ajax({
    url:"{{ route('dynamicdependent.fetch') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
     console.log(result);
    

    }

   })
  }
 });

 $('#RegionName').change(function(){
  $('#cityName').val('');
 });

  $('#category').change(function(){
  $('#subCategoryName').val('');
 });

  $('#brandName').change(function(){
  $('#modelName').val('');
 });

});
</script>
   </body>
</html>