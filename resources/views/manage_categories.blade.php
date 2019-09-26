<!DOCTYPE html>
<html>
   <head>
      <title>Admin/manage Categories </title>
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
                     <span><b>List of Categories</b></span>
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
                              <th> Id</th>
                              <th> Name</th>
                              <th> Description</th> 
                              <th>Date Updated</th>
                              <th>Category Icon</th>
                              <th>Edit</th>
                              <th>Delete</th>
                           </thead>
                           <tbody>

                               @foreach ($category as $cat) 
                            
                              <tr>
                                 <td >{{"$cat->id"}}</td>
                                 <td >{{getCamel("$cat->categoryName")}}</td>
                                 <td >{{"$cat->description"}}</td>
                                 <td>{{"$cat->updated_at"}}</td>
                                 <td><img src="images/{{$cat->image}}" width="100px" height="100px"></td>
                                 
                    
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
                         {{ $category->links() }}
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>

               <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="{{ route('addCategory') }}" enctype="multipart/form-data">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Add New Category</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                          <label for="name" id="editForm">Category's Name: </label>
                    
                           <input class="form-control" type="text"  id="name" name="name" required >
                        </div>
                        <div class="form-group">
                          <label for="name">Category's Description: </label>
                           <textarea cols="50" rows="10" id="description" name="description" placeholder="enter description here" required></textarea>
                           
                        </div>
                         <div class="form-group">
                          <label for="name">Category's Icon(<b><span style="color: red;">Less than 2Mb</span></b>): </label>
                           <input type="file" name="file" required>
                           
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
                    <form method="POST" action="{{ route('updateCategory') }}" enctype="multipart/form-data">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Update the Category</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                          <label for="name">Category's Name: </label>
                           <input class="form-control" type="hidden"   id="idUpdate" name="id" required >
                           <input class="form-control" type="text"   id="nameUpdate" name="name" required >
                        </div>
                        <div class="form-group">
                          <label for="name">Category's Description: </label>
                           <textarea cols="50" rows="10" id="descriptionUpdate" name="description" placeholder="enter description here" required></textarea>
                           
                        </div>
                         <div class="form-group">
                          <label for="name">Category's Icon(<b><span style="color: red;">Less than 2Mb</span>
                          </b>): </label>
                           <input type="file" name="fileIcon" >
                           
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
<script>
   $(document).ready(function(){
  $(".buttonEdit").click(function(){
   var tr = $(this).parent().parent().parent();
       
        $("#nameUpdate").val(tr.children().eq(1).text());
        $("#descriptionUpdate").val(tr.children().eq(2).text());
         $("#idUpdate").val(tr.children().eq(0).text());

  });
});
</script>
   </body>
</html>