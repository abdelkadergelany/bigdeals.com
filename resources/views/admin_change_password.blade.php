<!DOCTYPE html>
<html>
<head>
<title>Admin/password </title>
@include('layouts/partials/_linkedfiles')
 <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
<div class="wrapper">
@include('layouts/partials/_admin_sidebar')
<div id="content">
@include('layouts/partials/_admin_navbar')

                @if(Session::has('flash_current_error'))
           
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! Session('flash_current_error')!!}</strong> 
               </div>      
                @endif
                 
                 @if(Session::has('flash_unmatched_error'))
           
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! Session('flash_unmatched_error')!!}</strong> 
               </div>      
                  @endif
                  @if(Session::has('flash_failure_error'))
           
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! Session('flash_failure_error')!!}</strong> 
               </div>      
                  @endif
                  @if(Session::has('flash_success_message'))
           
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! Session('flash_success_message')!!}</strong> 
               </div>      
                  @endif
@include('layouts/partials/_change_password')

</div>

</div>
@include('layouts/partials/_admin_footer')
</body>
</html>