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
                             
                              
                              <th>Block</th>
                              <!-- <th>Delete</th> -->
                           </thead>
                           <tbody>
                              @foreach ($userInfo as $info) 
                              <tr>
                                 <td>{{$info->id}}</td>
                                 <td>{{$info->name}}</td>
                                 <td>{{$info->email}}</td>
                                
                               
                                 <td>
                                    @if (returnIsBlocked($info->id) == 1)
                                    <a href="{{route('blockUsers')}}?id={{$info->id}}"> <p data-placement="top" data-toggle="tooltip" title="Block"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#block" ><i class="fas fa-lock"></i></button></p></a>
                                    @endif
                                    @if (returnIsBlocked($info->id) == 0)
                                    <a href="{{route('blockUsers')}}?id={{$info->id}}"><p data-placement="top" data-toggle="tooltip" title="UnBlock"><button class="btn btn-success btn-xs" data-title="Edit" data-toggle="modal" data-target="#block" ><i class="fas fa-lock-open"></i></button></p></a>
                                    @endif
                                 </td>
                                <!--  <td>
                                   <a href="{{route('deleteUser')}}?id={{$info->id}}"> <p data-placement="top" data-toggle="tooltip" title="Delete"><button class="btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete" ><i class="fas fa-trash-alt"></i></button></p></a>
                                 </td> -->
                              </tr>
                              @endforeach
                           </tbody>
                        </table>
                        <div class="clearfix">{{ $userInfo->links() }}</div>
                     </div>
                  </div>
               </div>
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