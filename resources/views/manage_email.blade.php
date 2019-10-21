<!DOCTYPE html>
<html>
   <head>
      <title>Admin/manage Cities </title>
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
                     
                    
                     <div class="table-responsive ">
                        <table id="mytable" class="table table-bordred table-striped table-hover">
                           <thead>
                              
                              <th>Name</th>
                              <th>email</th>
                              <th>message</th>
                              <th>Date</th>
                              <th>Reply</th>
                              
                           </thead>
                           <tbody>
                              @foreach ($email as $emails) 
                              <tr>
                                 <td>{{"$emails->name"}}</td>
                                 <td>{{"$emails->email"}}</td>
                                 <td>{{"$emails->message"}}</td>
                                 <td>{{"$emails->created_at"}}</td>
                                 
                    
                                 <td>
                                  <a href="mailto:{{$emails->email}}?Subject=Bigdeals.com" target="_blanck">  <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs buttonEdit" data-title="Edit" data-toggle="modal" data-target="#edit" ><i class="fas fa-pen"></i></button></p></a>
                                 </td>
                              
                               
                              </tr>
                              @endforeach
                           </tbody>
                                         {{ $email->links() }}

                        </table>
                        <div class="clearfix"></div>
                     </div>
                  </div>
               </div>
            </div>

              


       

@include('layouts/partials/_admin_footer')

   </body>
</html>