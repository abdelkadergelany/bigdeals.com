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
                     <span><b>List of Sub-Categories</b></span>
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
                              <th>Sub-Category Id</th>
                              <th>Sub-Category Name</th>
                              <th>Category </th> 
                              <th>Sub-Category Description</th> 
                              <th>Date Updated</th>
                              <th>Edit</th>
                              <th>Delete</th>
                           </thead>
                           <tbody>

                               @foreach ($sub_category as $subcat) 
                            
                              <tr>
                                 <td >{{"$subcat->id"}}</td>
                                 <td >{{"$subcat->subCategoryName"}}</td>
                                 <td >{{"$subcat->category"}}</td>
                                 <td >{{"$subcat->description"}}</td>
                                 <td>{{"$subcat->updated_at"}}</td>
                                
                                 
                    
                                 <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs buttonEdit" data-title="Edit" data-toggle="modal" data-target="#edit" id="buttonEdit" ><i class="fas fa-pen"></i></button></p>
                                 </td>
                              
                                 <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="fas fa-trash-alt"></i></button></p>
                                 </td>
                              </tr>
                              @endforeach
                            
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
                    <form method="POST" action="{{ route('addSubCategory') }}" enctype="multipart/form-data">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Add New Sub-Category</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                          <label for="name" id="editForm">Sub-Category's Name: </label>
                    
                           <input class="form-control" type="text"  id="name" name="name" required >
                        </div>
                        <div class="form-group">
                           <label for="first-disabled">Category: </label>
                            <select id="first-disabled" class="selectpicker form-control" 
                            data-hide-disabled="false" data-live-search="true"  name="categoryName" required>

                               <option selected id="categoryNameUpdate" value="">Choose a Category</option>
                    
                                          @foreach ($category as $cat) 
                                           <option>{{"$cat->categoryName"}}</option>
                                          @endforeach
                   
                             </select>
                         </div>

                        <div class="form-group">
                          <label for="name">Sub-Category's Description: </label>
                           <textarea cols="50" rows="10" id="description" name="description" 
                           placeholder="enter description here" required="true"></textarea>
                           
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





            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="{{ route('updateSubCategory') }}">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Update the Sub-Category</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                          <label for="name">Sub-Category's Name: </label>
                           <input class="form-control" type="hidden"   id="idUpdate" name="id"  >
                           <input class="form-control" type="text"   id="nameUpdate" name="name" required >
                        </div>
                          <div class="form-group">
                           <label for="first-disabled">Category: </label>
                            <select id="first-disabled" class="selectpicker form-control" 
                            data-hide-disabled="false" data-live-search="true"  name="categoryName" required>

                               
                                          <option></option>
                                          @foreach ($category as $cat) 
                                           <option>{{"$cat->categoryName"}}</option>
                                          @endforeach
                   
                             </select>
                         </div>

                        <div class="form-group">
                          <label for="name">Sub-Category's Description: </label>
                           <textarea cols="50" rows="10" id="descriptionUpdate" name="description" placeholder="enter description here" required></textarea>
                           
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