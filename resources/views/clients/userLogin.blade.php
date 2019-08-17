@extends('layouts/main_layout')
@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
@stop
<style type="text/css">
    .login-form {
        width: 340px;
        margin: 50px auto;
    }
    .login-form form {
        margin-bottom: 15px;
        background: #f7f7f7;
        box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
        padding: 30px;
    }
    .login-form h2 {
        margin: 0 0 15px;
    }
    .form-control, .btn {
        min-height: 38px;
        border-radius: 2px;
    }
    .btn {        
        font-size: 15px;
        font-weight: bold;
    }
</style>
@section('contains')
<div class="container border-green">
                <h2 class="position_text">Sign Up on Bigdeals</h2><br><br>
            <div class="row">
                <div class="col-sm-5 col-md-5 col-lg-6 border_left">
                    <p class="lead contentregister">Advantages to Sign Up</p>
                    <img class="iconesignup" src="img/posting.jpg" alt="posting">
                    <span >Start posting your own ads.</span><br>
                    <img class="iconesignup" src="img/favorite.jpg" alt="favorite">
                    <span>Mark ads as favorite and view them later.</span><br>
                    <img class="iconesignup" src="img/manage.jpg" alt="manage">
                    <span>View and manage your ads at your convenience.</span><br><br>
                </div>
                
                <div class="col-sm-7 col-md-7 col-lg-6 contentregister">
                  
<div class="login-form">

                @if(Session::has('error_login_first'))

                 <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! Session('error_login_first')!!}</strong> 
               </div> 

                @endif

               @if(Session::has('flash_message_error'))
           
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>{!! Session('flash_message_error')!!}</strong> 
               </div>      
                  @endif
    <form method="POST" action="{{url('userLogin')}}">{{csrf_field()}}
        <h2 class="text-center">Log in</h2>       
        <div class="form-group">
            <input type="email" class="form-control" placeholder="email" required="required" name="email">
        </div>
        <div class="form-group">
            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </div>
        <div class="clearfix">
            <label class="pull-left checkbox-inline"><input type="checkbox"> Remember me</label>
            <a href="#" data-toggle="modal" data-target="#login-password" class="pull-right">Forgot Password?</a>
        </div>        
    </form>
    <p class="text-center"><a href="{{ route('userRegister') }}">Create an Account</a></p>
</div>




 <div id="login-password" role="dialog" aria-labelledby="Reset Password" aria-hidden="true" class="modal fade">
            <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title ">Reset Password</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span
                    aria-hidden="true">×</span></button>
                </div>
                <div class="modal-body">
                <form action="" method="post">
                    <label for="email-modal">enter your email</label>
                    <div class="form-group">
                    <input id="" type="text" placeholder="email" class="form-control">
                    </div>

                    <p class="text-center">
                    <button name="" class="btn btn-primary" style="background-color: #512DA8"> Reset</button>
                    </p>
                </form>
                <!-- <p class="text-center text-muted"><a href="#" data-toggle="modal" data-target="#login-password">Forgot
                    password?</a></p> -->
                <p class="text-center ">Don't worry, we can send it again! </p><br><br>
                </div>
            </div>
            </div>
        </div>

                </div>
            </div>
    </div>
@stop