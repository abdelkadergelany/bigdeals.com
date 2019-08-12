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
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                     <span><b>List of Ads</b></span>
                      <button style="position: relative;left:50%;" class="btn btn-danger btn-lg" data-title="Add" data-toggle="modal" data-target="#add" ><i class="fas fa-plus-circle"></i>Post new Ads<div class="spinner-grow text-primary"></div></button><br><br>
                     <div class="table-responsive ">
                        <table id="mytable" class="table table-responsive table-bordred table-striped table-hover">
                           <thead class="thead-light">
                              <th>Ads Id</th>
                              <th>buy</th>
                              <th> date</th>
                              <th>City</th>
                              <th>Address</th>
                              <th>Phone</th>
                              
                              <th>Subcategory</th>
                              <th>ads images</th>
                              <th>Title</th>
                              <th>Description</th>
                              
                              <th>View</th>
                              <th>Edit</th>
                              <th>Validate</th>
                              <th>Delete</th>
                           </thead>
                           <tbody>
                                <tr>
                                <td>$info id</td>
                                 <td>$info name</td>
                                 <td>$info id</td>
                                 <td>$info name</td>
                                 <td>$info email</td>
                                 
                                 <td>$info name</td>
                                 <td>$info email</td>
                                 
                                  
                                  <td>returnCity  info id)</td>
                                  
                                
                                 <td>returnAddress $ id</td>
                                 <td>returnPhone info id</td>
                                 <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs buttonEdit" data-title="Edit" data-toggle="modal" data-target="#edit" ><i class="fas fa-pen"></i></button></p>
                                 </td>
                                 <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Block"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#block" ><i class="fas fa-lock"></i></button></p>
                                 
                                 </td>
                                 <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="fas fa-trash-alt"></i></button></p>
                                 </td>
                                  <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="fas fa-trash-alt"></i></button></p>
                                 </td>
                              </tr>
                              
                              
                              <tr>
                                <td>$info->id</td>
                                 <td>$info->name</td>
                                 <td>$info->id</td>
                                 <td>$info->name</td>
                                 <td>$info->email</td>
                                 <td>$info->id</td>
                                 <td>$info->name</td>
                                 
                               <td>returnCity($info->id)</td>
                                 
                                 <td>returnAddress($info->id)</td>
                                 <td>returnPhone($info->id)</td>
                                 <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs buttonEdit" data-title="Edit" data-toggle="modal" data-target="#edit" ><i class="fas fa-pen"></i></button></p>
                                 </td>
                                 <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Block"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#block" ><i class="fas fa-lock"></i></button></p>
                                 
                                 </td>
                                  <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="fas fa-trash-alt"></i></button></p>
                                 </td>
                                 <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="fas fa-trash-alt"></i></button></p>
                                 </td>
                              </tr>
                              
                           </tbody>
                        </table>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>



  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="{{ route('addNewAd') }}">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Add a new Ads</h4>
                     </div>
                     <div class="modal-body">
                          <div class="form-group">
                              <label for="first-disabled">,<b> Category</b>: </label>
                               <select id="category" class="selectpicker form-control dynamic" 
                               data-hide-disabled="false" data-live-search="true"   
                               data-dependent="subCategoryName" name="category">

                               <option selected  value="">Choose a Category</option>
                    
                                          @foreach ($category as $cat) 
                                           <option>{{"$cat->categoryName"}}</option>
                                          @endforeach
                   
                             </select>
                        </div>
                        <div class="form-group">
                           <label for="first-disabled"><b>Sub-category</b>: </label>
                            <select id="subCategoryName" class=" form-control" 
                            data-hide-disabled="false" data-live-search="true" name="subCategoryName" >
                                 
                             </select>
                        </div> {{ csrf_field() }}

                      
                     </div>
                     <div class="modal-footer ">
                        <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Next"><span class="glyphicon glyphicon-ok-sign" ></span> 
                     </div>
                     </form>
                  </div>
                  <!-- /.modal-content --> 
               </div>
               <!-- /.modal-dialog --> 
            </div>


          

         </div>
      </div>



      @include('layouts/partials/_admin_footer')
   <!--    <script>
   $(document).ready(function(){
  $(".buttonEdit").click(function(){
   var tr = $(this).parent().parent().parent();
        console.log(tr.children().eq(1).text());
        $("#nameUpdate").val(tr.children().eq(1).text());
        $("#first-disabled").val(tr.children().eq(3).text());
         $("#addressUpdate").val(tr.children().eq(4).text());
         $("#idUpdate").val(tr.children().eq(0).text());
         $("#phoneUpdate").val(tr.children().eq(5).text());

  });
});
</script> -->
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
     //console.log(result);

    // console.log('$'+'#'+dependent);

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

});
</script>
   </body>
</html>