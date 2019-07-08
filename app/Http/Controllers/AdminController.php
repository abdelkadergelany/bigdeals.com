<?php

namespace App\Http\Controllers;
use App\User;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function login(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1']))
            {
                return redirect ('admin/dashboard');
            }
            else{
                return redirect ('/admin')->with('flash_message_error','Invalid username or Password');
            }
        }
        
        return view('admin.admin_login');
    }


 public function register(){
      return ('helloow aly');
  }


public function updatePassword(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();
            $currentUser = User::where(['email'=>Auth::user()->email])->first();
            $currentPassword = $data['current'];
          

            if($data['password1']!== $data['password2'])
            {
                return redirect ('/admin/admin_change_password')->with('flash_unmatched_error','password 1 and password 2  did not match');
            }

             if(Hash::check($currentPassword,$currentUser->password))
            {
              $password = Hash::make( $data['password2']);
              User::where(['email'=>Auth::user()->email])->update(['password'=>$password]);
              return redirect ('/admin/admin_change_password')->with('flash_success_message','your password was succesfully updated');
               
            }
            else
            {
              return redirect ('/admin/admin_change_password')->with('flash_failure_error','the  password was not updated please verify your current password ');
            }
           
            
              
              
        }
        
        return view('admin_change_password');
    }


  public function dashboard(){
      return view('admin.dashboard');
  }




  public function manageUsers(){
       $userInfos = UserInfo::all();
       

       return view('admin_manage_users')->with("userInfo",$userInfos);

}




  public function logout(){
      Session::flush(); 
      return redirect ('/admin')->with('flash_message_success','Signed out succesfully');

}
}
            