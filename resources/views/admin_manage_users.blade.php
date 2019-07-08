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
        <h4>List of Registered Users</h4>
        <div class="table-responsive ">

                
              <table id="mytable" class="table table-bordred table-striped table-hover">
                   
                   <thead>
                     <th>User Id</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>City</th>
                     <th>Address</th>
                     <th>Phone</th>
                     <th>Edit</th>
                     <th>Block</th>
                     <th>Delete</th>
                   </thead>
    <tbody>
    
@foreach ($userInfo as $info) 


  
      
     
    <tr>
    <td>{{"$info->userId"}}</td>
    <td>{{returnName($info->userId)}}</td>

     <td>{{returnEmail($info->userId)}}</td> 
    <td>{{"$info->city"}}</td>
    <td>{{"$info->address"}}</td>
    <td>{{returnPhone($info->userId)}}</td>
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><i class="fas fa-pen"></i></button></p>
    </td>
    
    <td><p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><i class="fas fa-lock"></i></button></p>
    </td>

    <td><p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="fas fa-trash-alt"></i></button></p>
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


<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
      </div>
          <div class="modal-body">
          <div class="form-group">
        <input class="form-control " type="text" placeholder="Mohsin">
        </div>
        <div class="form-group">
        
        <input class="form-control " type="text" placeholder="Irshad">
        </div>
        <div class="form-group">
        <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
    
        
        </div>
      </div>
          <div class="modal-footer ">
        <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>
    
    
    
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
      <div class="modal-dialog">
    <div class="modal-content">
          <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
        <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
      </div>
          <div class="modal-body">
       
       <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
       
      </div>
        <div class="modal-footer ">
        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
      </div>
        </div>
    <!-- /.modal-content --> 
  </div>
      <!-- /.modal-dialog --> 
    </div>

</div>

</div>
@include('layouts/partials/_admin_footer')
</body>
</html>