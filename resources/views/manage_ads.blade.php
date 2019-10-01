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
                     <span><b>List of Ads</b></span>

                      <button style="position: relative;margin-right: 15px; margin-left: 15%;" class="btn btn-success btn-sm" data-title="Add" data-toggle="modal" data-target="#add" ><i class="fas fa-plus-circle"></i>Post new Ads ({{$ads->count()}})<div class="spinner-grow text-primary"></div></button><br><br>

                      <a href="{{route('inactivatedAds')}}"><button style="position: relative;margin-right: 15px;" class="btn btn-info btn-sm"   >inactivated Ads ({{$inactivatedCount}})<div class="spinner-grow text-primary"></div></button></a><br><br>
                      
                       <a href="{{route('activatedAds')}}"><button style="position: relative;margin-right: 15px;" class="btn btn-primary btn-sm" data-title="Add" data-toggle="modal"  >Activated Ads ({{$activatedCount}})<div class="spinner-grow text-primary"></div></button></a><br><br>


                      <a href="{{route('blockedAds')}}"><button style="position: relative;margin-right: 15px;" class="btn btn-danger btn-sm"   >Blocked Ads ({{$isBlockedCount}})<div class="spinner-grow text-primary"></div></button></a><br><br>

                      
                    </div><br><br><hr>
            
          </div>

            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-12">
                    

                     <div class="  " >
                        <table id="mytable" class="table table-responsive table-bordred table-striped 
                        table-hover"  >
                           <thead class="thead-light">
                              <th>Ads Id</th>
                              <th>by</th>
                              <th> date</th>
                              <th>City</th>
                              <th>Address</th>
                              <th>Phone</th>
                              
                              <th>Subcategory</th>
                              
                              <th>Title</th>
                              <th>ads images</th>
                              
                              <th>View</th>
                              <th>Edit</th>
                              
                              <th>Delete</th>
                           </thead>
                           <tbody>

                                  @foreach($ads as $ad)
                                <tr>
                                <td>{{"$ad->id"}}</td>
                                 <td>{{returnNAme($ad->userId)}}</td>
                                 <td>{{"$ad->updated_at"}}</td>
                                 <td>{{"$ad->cityName"}}</td>
                                 <td>{{"$ad->address"}}</td>
                                 
                                 <td>{{"$ad->phone1"}}</td>
                                 <td>{{"$ad->subCategoryName"}}</td>                                                                  
                                                                                                 
                                 <td>{{"$ad->title"}}</td>

                                 <td>
                                  <img src="publication/{{$ad->pict1}}" width="100px" height="100px" style="display: inline!important;" />
                                  </td>
                                 <td>
                                    <a href="{{route('product-details')}}?id={{$ad->id}}"><p data-placement="top" data-toggle="tooltip" title="view">
                                      <button class="btn btn-primary btn-xs " data-title="Edit"   >
                                        <i class="fas fa-eye"></i></button></p></a>
                                 </td>
                                 <td>
                                     <a href="{{route('editAd')}}?id={{$ad->id}}&category={{$ad->categoryName}}&subCategoryName={{$ad->subCategoryName}}"><p data-placement="top" data-toggle="tooltip" title="Edit">
                                      <button class="btn btn-success btn-xs " data-title="Edit"   >
                                        <i class="fas fa-pen"></i></button></p></a>
                                 
                                 </td>
                                
                                  <td>
                                    <a href="{{route('deleteAd')}}?id={{$ad->id}}"><p data-placement="top" data-toggle="tooltip" title="Block">
                                      <button class="btn btn-danger btn-xs " data-title="Edit"   ><i class="fas fa-trash-alt"></i></button></p></a>
                                 </td>
                              </tr>
                              @endforeach
                           </tbody>


                        </table>

                         {{ $ads->links() }}
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>



  <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
               <div class="modal-dialog">
                  <div class="modal-content">
                    <form method="get" action="{{route('addNewAd')}}">
                        @csrf
                     <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                        <h4 class="modal-title custom_align" id="Heading">Add a new Ads</h4>
                     </div>
                     <div class="modal-body">
                          <div class="form-group">
                              <label for="category">,<b> Category</b>: </label>
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
                           <label for="subCategoryName"><b>Sub-category</b>: </label>
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
               </div>
             
            </div>

         </div>
      </div>



      @include('layouts/partials/_admin_footer')
   
<script  src="{{asset('js/admin.js')}}"></script>
   </body>
</html>