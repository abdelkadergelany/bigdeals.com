<!DOCTYPE html>
<html>
   <head>
      <title>Admin/manage Sub-categories </title>
      @include('layouts/partials/_linkedfiles')
      <link rel="stylesheet" href="{{asset('css/admin.css')}}">
   </head>
   <body>
      <div class="wrapper">
         @include('layouts/partials/_admin_sidebar')
         <div id="content">
            @include('layouts/partials/_admin_navbar')


            <div class="container">
               <div class="row">
                  <div class="col-md-12">
                     <span><b>List of Brands</b></span>
                      <button style="position: relative;left:50%;" class="btn btn-danger btn-lg" data-title="Add" data-toggle="modal" data-target="#add" ><i class="fas fa-plus-circle"></i>Add new</button><br><br>
                      @if(count($errors)>0)
                      <div class="alert alert-danger">
                         Upload Validation Error<br><br>
                         <ul>
                           @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach
                         </ul>
                      </div>
                      @endif
                     <div class="table-responsive ">
                        <table id="mytable" class="table table-bordred table-striped table-hover">
                           <thead>
                              <th>Brand Id</th>
                              <th>Brand Name</th>
                              <th>Sub-Category</th> 
                              <th>Created </th>
                              <th>Edit</th>
                           </thead>
                           <tbody>

                               @foreach ($brands as $brand) 
                            
                              <tr style="text-transform: capitalize;">
                                 <td >{{"$brand->id"}}</td>
                                 <td >{{"$brand->brandName"}}</td>
                                 <td >{{"$brand->subCategoryName"}}</td>
                                 <td >{{"$brand->created_at"}}</td>

                              
                                 <td>
                                   <a href=""> <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="fas fa-trash-alt"></i></button></p></a>
                                 </td>
                              </tr>
                              @endforeach
                            
                           </tbody>
                        </table>
                                               
                                                 {{ $brands->appends(['action' => "displayBrand"])->links() }}

                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>

               <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="{{ route('manageBrand')}}?action=addBrand" enctype="multipart/form-data">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Add New Brand</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                          <label for="name" id="editForm">Brand's Name: </label>
                    
                           <input class="form-control" type="text"  id="name" name="name" required >
                        </div>
                        <div class="form-group">
                           <label for="first-disabled">Choose  the Sub-Category: </label>
                            <select id="first-disabled" class="selectpicker form-control" 
                            data-hide-disabled="false" data-live-search="true"  name="subCategory" required>

                               <option selected id="categoryNameUpdate" value="">Choose a Sub-Category</option>
                    
                                          @foreach ($subCategory as $subcat) 
                                           <option>{{"$subcat->subCategoryName"}}</option>
                                          @endforeach
                   
                             </select>
                         </div>                        
                      
                     </div>
                     <div class="modal-footer ">
                        <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Add"><span class="glyphicon glyphicon-ok-sign" ></span> 
                     </div>
                     </form>
                  </div>
                  <!-- /.modal-content --> 
               </div>
               <!-- /.modal-dialog --> 
            </div>


@include('layouts/partials/_admin_footer')
<script  src="{{asset('js/admin.js')}}"></script>
   </body>
</html>