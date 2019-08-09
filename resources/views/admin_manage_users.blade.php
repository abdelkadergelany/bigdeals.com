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
                                 <td>{{$info->id}}</td>
                                 <td>{{$info->name}}</td>
                                 <td>{{$info->email}}</td>
                                 <td>{{returnCity($info->id)}}</td>
                                 <td>{{returnAddress($info->id)}}</td>
                                 <td>{{returnPhone($info->id)}}</td>
                                 <td>
                                    <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs buttonEdit" data-title="Edit" data-toggle="modal" data-target="#edit" ><i class="fas fa-pen"></i></button></p>
                                 </td>
                                 <td>
                                    @if (returnIsBlocked($info->id) == 0)
                                    <p data-placement="top" data-toggle="tooltip" title="Block"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#block" ><i class="fas fa-lock"></i></button></p>
                                    @endif
                                    @if (returnIsBlocked($info->id) == 1)
                                    <p data-placement="top" data-toggle="tooltip" title="UnBlock"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#block" ><i class="fas fa-lock-open"></i></button></p>
                                    @endif
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
            <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="POST" action="{{ route('updateUsers') }}">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
                     </div>
                     <div class="modal-body">
                        <div class="form-group">
                          <label for="name">Name: </label>
                          <input  style="display: none;" type="number"  id="idUpdate" name="id"  >
                           <input class="form-control" type="text"  id="nameUpdate" 
                           name="name">
                        </div>
                        <div class="form-group">
                           <label for="first-disabled">City: </label>
                            <select id="first-disabled" class="selectpicker form-control" 
                            data-hide-disabled="false" data-live-search="true" name="city">

               

                <optgroup label="Centre">
                    
                    <option>Akonolinga</option>
                    <option>Bafia</option>
                    <option>Eseka</option>
                    <option>Mbalmayo</option>
                    <option>Mfou</option>
                    <option>Monatele</option>
                    <option>Nanga-Eboko</option>
                    <option>Ngoumou</option>
                    <option>Ntui</option>
                    <option>Yaounde</option>
                </optgroup>
                <optgroup label="Littoral">
                   
                    <option>Douala</option>
                    <option>Edea</option>
                    <option>Nkongsamba</option>
                    <option>Yabassi</option>
                </optgroup>
                <optgroup label="West">
                    
                    <option>Bafang</option>
                    <option>Bafoussam</option>
                    <option>Baham</option>
                    <option>Bandjoun</option>
                    <option>Bangangte</option>
                    <option>Dschang</option>
                    <option>Foumban</option>
                    <option>Foumbot</option>
                    <option>Koutaba</option>
                    <option>Mbouda</option>
                </optgroup>
                <optgroup label="South West">
                    
                    <option>Bangem</option>
                    <option>Kumba</option>
                    <option>Limbe</option>
                    <option> Mamfe</option>
                    <option>Menji</option>
                    <option>Mundemba</option>
                </optgroup>
                <optgroup label="North West">
                    
                    <option>Bamenda</option>
                    <option>Fundong</option>
                    <option>Kumbo</option>
                    <option> Mbengwi</option>
                    <option>Ndop</option>
                    <option>Nkambe</option>
                    <option>Wum</option>
                </optgroup>
                <optgroup label="Far North">
                    
                    <option>Kaele</option>
                    <option>Kousseri</option>
                    <option>Maroua</option>
                    <option> Mokolo </option>
                    <option>Mora</option>
                    <option>Yagoua</option>
                </optgroup>
                <optgroup label="North">
                    
                    <option>Garoua</option>
                    <option>Guider</option>
                    <option>Poli</option>
                    <option> Tchollire </option>
                </optgroup>

                <optgroup label="East">
                   
                    <option>Abong-Mbang</option>
                    <option>Batouri</option>
                    <option>Bertoua</option>
                    <option> Yokadouma </option>
                </optgroup>

                <optgroup label="Adamawa">
                    
                    <option>Banyo</option>
                    <option>Meiganga</option>
                    <option>Ngaoundere</option>
                    <option> Tibati</option>
                    <option>Tignere</option>
                </optgroup>
                <optgroup label="South">
                   
                    <option>Ambam</option>
                    <option>Ebolowa</option>
                    <option> Kribi</option>
                    <option>Sangmelima</option>
                </optgroup>

                </select>
                        </div>
                        <div class="form-group">
                           <label for="address">Address: </label>
                           <input class="form-control " type="text"  id="addressUpdate" name="address">
                        </div>
                         <div class="form-group">
                           <label for="phone">Phone: </label>
                           <input class="form-control " type="text"  id="phoneUpdate" name="phone">
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
            


            <div class="modal fade" id="block" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Block this entry</h4>
                     </div>
                    <form method=POST action= "{{route('blockUsers')}}">
                        @csrf
                     <div class="modal-body">
                        <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to Block this Record?</div>
                     </div>
                     <div class="modal-footer ">
                        <input style="display: none;"  type="number" value="1"  name="id"  >
                        <input type="submit" class="btn btn-warning btn-lg" style="width: 50%;" value="Yes">
                        <span class="glyphicon glyphicon-ok-sign"></span> 
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                     </div>
                   </form>
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
                        <button type="button" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                     </div>
                  </div>
                  <!-- /.modal-content --> 
               </div>
               <!-- /.modal-dialog --> 
            </div>
         </div>
      </div>
      @include('layouts/partials/_admin_footer')
      <script>
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
</script>
   </body>
</html>