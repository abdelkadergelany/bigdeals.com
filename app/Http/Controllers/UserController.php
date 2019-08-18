<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use App\User;
use App\region;
use App\UserInfo;
use App\Phone;
use App\city;
use App\sub_category;
use App\category;
use App\size;
use App\brand;
use App\ads;

class UserController extends Controller
{
    //
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = 'myAccount';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    public function userRegister(){
      return view('auth.userRegister');
  }


  public function postadd(){
   $category = category::all()->sortBy("categoryName");



   return view('clients.choose_category')->with("category",$category);;
}





public function storeAdd(Request $request){
   $data = $request->input();

    dd($data["files[]"]);


}





public function logout(){
  Session::flush(); 
  return redirect ('/welcome');

}



public function postaddCategory( Request $request ){
    if($request->isMethod('get')){

     $data = $request->input();
     $regions = region::all();   
     $category = category::all();
     $size = size::all();


     $brand= brand::where("subCategoryName",$data['subCategoryName'])->get();



     return view('clients.postads')->with("category",$category)->with("region",$regions)
     ->with("catval",$data['category'])
     ->with("subCatval",$data['subCategoryName'])
     ->with("size",$size) 
     ->with("brand",$brand);


 }




}

}
