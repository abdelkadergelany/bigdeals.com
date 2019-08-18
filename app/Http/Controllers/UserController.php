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

   $new_name1 =null;
   $new_name2 =null;
   $new_name3 =null;
   $new_name4 =null;
   $new_name5 =null;


   $data = $request->input();

   $image = $request->file('files')[0];
   $new_name1 = rand().'.'.$image->getClientOriginalExtension();
   $image->move(public_path("publication"),$new_name1);


   if(isset($request->file('files')[1])){

       $image = $request->file('files')[1];
       $new_name2 = rand().'.'.$image->getClientOriginalExtension();
       $image->move(public_path("publication"),$new_name2);

   }
   if(isset($request->file('files')[2])){

       $image = $request->file('files')[2];

       $new_name3 = rand().'.'.$image->getClientOriginalExtension();

       $image->move(public_path("publication"),$new_name3);

   }

   if(isset($request->file('files')[3])){


       $image = $request->file('files')[3];
       $new_name4 = rand().'.'.$image->getClientOriginalExtension();

       $image->move(public_path("publication"),$new_name4);

   }
   if(isset($request->file('files')[4])){

       $image = $request->file('files')[4];
       $new_name5 = rand().'.'.$image->getClientOriginalExtension();
       $image->move(public_path("publication"),$new_name5);

   }


   $ad = new ads;
   $ad->buyNow = $request->get('buyNow');
   $ad->subCategoryName = $data['subCategoryName'];
   $ad->categoryName = $data['category'];
   $ad->regionName= $data['RegionName'];
   $ad->cityName = $data['cityName'];
   $ad->address = $data['address'];
   $ad->categoryName = $data['category'];
   $ad->subCategoryName = $data['subCategoryName'];
   $ad->phone1 = $data['phone1'];

   if (isset($data['phone2'])) {
       # code...

    $ad->phone2 = $data['phone2'];
   }
   if (isset($data['phone3'])) {
       # code...

    $ad->phone3 = $data['phone3'];
   }


   $ad->title = $data['title'];
   $ad->description = $data['description'];



   if(isset($data['brandName']) )
   {
      $ad->brand = $data['brandName'];

      $ad->model = $data['modelName'];
  }

  if(isset($data['size']))
  {
      $ad->size = $data['size'];
  }


  $ad->userId= Auth::id();
  $ad->isUsed = $data['isUsed'];
  // $ad->brand = $data['brandName'];
  // $ad->model = $data['modelName']; 

  if ($data['negociable'] =='1' ) {
    $ad->negociable = $data['negociable'];
}


$ad->authenticity = $data['authenticity'];
$ad->price = $data['price'];              
$ad->pict1 = $new_name1;
$ad->pict2 = $new_name2;
$ad->pict3 = $new_name3;
$ad->pict4 = $new_name4;
$ad->pict5 = $new_name5;

$ad->save();
   $ads= ads::where("userId",'Auth::user()->id')->get();
   

return view('clients.myadd')->with("ads",$ads);





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

 public function myadd( Request $request ){

     //dd(Auth::user()->id);
    $ads = ads::where("userId",Auth::user()->id)->get();  
    // foreach ($ads as $key => $value) {
    //     # code...
    //     dd($value->title);
    // }  
     return view('clients.myadd')->with("ads",$ads);
 }




}
