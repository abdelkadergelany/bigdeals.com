<!DOCTYPE html>
<html>
   <head>
      <title>Admin/manage users </title>
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
                     <span><b>List of Cities</b></span>
                      <button style="position: relative;left:50%;" class="btn btn-danger btn-lg" data-title="Add" data-toggle="modal" data-target="#add" ><i class="fas fa-plus-circle"></i>Add new</button><br><br>
                     <div class="table-responsive ">
                        <table id="mytable" class="table table-bordred table-striped table-hover">
                           <thead>
                              <th>City Id</th>
                              <th>Region Name</th>
                              <th>City Name</th>
                              <th>Date Created</th>
                              <th>Date Updated</th>
                              <th>Edit</th>
                              <th>Delete</th>
                           </thead>
                           <tbody>
                              @foreach ($city as $cit) 
                              <tr>
                                 <td>{{"$cit->id"}}</td>
                                 <td>{{"$cit->RegionName"}}</td>
                                 <td>{{"$cit->cityName"}}</td>
                                 <td>{{"$cit->created_at"}}</td>
                                 <td>{{"$cit->updated_at"}}</td>
                    
                                 <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><i class="fas fa-pen"></i></button></p>
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
                    <form method="POST" action="{{ route('addCity') }}">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Add New City</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                          <label for="name">City's Name: </label>
                    
                           <input class="form-control" type="text"  id="name" name="name" required>
                        </div>
                        <div class="form-group">
                           <label for="first-disabled">City: </label>
                            <select id="first-disabled" class="selectpicker form-control" 
                            data-hide-disabled="false" data-live-search="true" name="regionName" required>

                <option selected>Choose a region</option>
                    
                     @foreach ($region as $reg) 
                    <option>{{"$reg->regionName"}}</option>
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


             <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Edit City</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                          <label for="name">City's Name: </label>
                           <input  type="hidden" value="{{$cit->id}}" name="id"  >
                           <input class="form-control" type="text"  id="name" name="name" value="{{$cit->cityName}}" >
                        </div>
                        <div class="form-group">
                           <label for="first-disabled">City: </label>
                            <select id="first-disabled" class="selectpicker form-control" 
                            data-hide-disabled="false" data-live-search="true" name="regionName">

                <option>{{"$reg->regionName"}}</option>
                   
                </select>
                        </div>
                      
                     </div>
                     <div class="modal-footer ">
                        <input type="submit" class="btn btn-warning btn-lg" style="width: 100%;" value="Update"><span class="glyphicon glyphicon-ok-sign" ></span> 
                     </div>
                     </form>
                  </div>
                  <!-- /.modal-content --> 
               </div>
               <!-- /.modal-dialog --> 
            </div>


@include('layouts/partials/_admin_footer')
   </body>
</html>