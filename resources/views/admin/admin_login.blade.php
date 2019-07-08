
        <!DOCTYPE html>
        <html>
        <head>
        <title>Admin/login </title>
        @include('layouts/partials/_linkedfiles')
        <link rel="stylesheet" href="{{asset('css/admin_login.css')}}">
        </head>
        <body>
        <div class="container">
        
            <div class="d-flex justify-content-center h-100">
            
                <div class="card">
                    <div class="card-header">
                        <h3>Login</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{url('admin')}}">{{csrf_field()}}
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control" placeholder="email" name="email">
                                
                            </div>
                            <div class="input-group form-group">
                                <div class="input-group-prepend"> 
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" class="form-control" name="password" placeholder="password">
                            </div>
                            <div class="row align-items-center remember">
                                <input type="checkbox">Remember Me
                            </div>
                            <div class="form-group">
                                <input type="submit" value="Login" class="btn   login_btn">
                            </div>
                        </form>
                    </div>
                    @if(Session::has('flash_message_error'))
           
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! Session('flash_message_error')!!}</strong> 
               </div>      
                  @endif
                  @if(Session::has('flash_message_success'))
           
           <div class="alert alert-warning alert-dismissible fade show" role="alert">
                 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                       <span aria-hidden="true">&times;</span>
               </button>
               <strong>{!! Session('flash_message_success')!!}</strong> 
          </div>      
             @endif
                    <div class="d-flex justify-content-center links stytle="color:white !important;"">
                            <a href="#" >Forgot your password?</a>
                        </div>
                    <div class="card-footer">
                        
                        
                    </div>
                </div>
            </div>
        </div>
        </body>
        </html>