<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

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
use App\favorite;
use App\rating;

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


    public function rating(Request $request){

      $data = $request->input();

      $output ="";
      if(Auth::id() == $data['ratedUser'])
      {

        $output =$output."<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong>Sorry you can not rate your self</strong> 
        </div> ";
        return $output;


      }


      else{


       $rating = rating::where("userId",$data['ratedUser'])->first();
       if($rating->count()==0)
       {

        $rat = new  rating;
        $rat->total = $data['val'];
        $rat->voteCount = "1";
        $rat->userId = $data['ratedUser'];
        $rat->average = $data['val'];
        $rat->save(); 

        $output =$output."<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong>user rated successfully</strong> 
        </div> ";
        return $output;



      }
      else{ 
             // $rating = rating::where("userId",$data['ratedUser'])->get();
             // dd( $rating);

        $totalCount =(float)$rating->total + (float)$data['val'];   
        $overmark =5* (int)$rating->voteCount; 
        $average= (5*(int)$totalCount)/ $overmark;

        $rating->total =$totalCount ;
        $rating->voteCount = (float)$rating->voteCount + 1 ;
        $rating->average  = $average;

        $rating->save();


        $output =$output."<div class='alert alert-warning alert-dismissible fade show' role='alert'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span aria-hidden='true'>&times;</span>
        </button>
        <strong>user rated successfully</strong> 
        </div> ";
        return $output;



      }

    }



  }



  public function addFavorite(Request $request){


    $data = $request->input();

    $ads = ads::find($data['id']);
    $favorite =favorite::where("userId",Auth::id())->where("adId",$data['id'])->count();
    $output ="";
    if($favorite!= 0)
    {

      $output =$output."<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      <strong>already added to your favorite</strong> 
      </div> ";
      return $output;


    }


    else{
      $fav = new favorite;
      $fav->userId = Auth::id();
      $fav->adId = $data['id'];

      $fav->save();

      $output =$output."<div class='alert alert-warning alert-dismissible fade show' role='alert'>
      <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
      <span aria-hidden='true'>&times;</span>
      </button>
      <strong>successfully added to your favorite</strong> 
      </div> ";
      return $output;

    }



  }


  public function myfavorite(Request $request){

    $data = $request->input();
    if($data['action']=='display')
    {
     $favorites = DB::table('favorites')->orderBy("created_at","DESC")->get();


     return view('clients.myFavorites')->with("favorites", $favorites);

   }

   if($data['action']=='delete')
   {
     favorite::destroy($data['id']);


     $favorites = DB::table('favorites')->orderBy("created_at","DESC")->get();

     return view('clients.myFavorites')->with("favorites", $favorites);

   }





   


 }



 public function productDetails(Request $request){

   $data = $request->input();

   $ads = ads::find($data['id']);
   $similar = ads::where ("subCategoryName","=",$ads->subCategoryName)
   ->where("isValidate","1")
   ->where("isBlocked","0")
   ->paginate(4);

   return view('clients.product-details')->with("ads",$ads)->with("similar", $similar);




 }





 public function filter(Request $request)
 {

   $data = $request->input();

   $city =$data['city'];
   $subCat =$data['subCat'];
   $input =$data['input'];

// CONDITION FILTER

   if($data['type']=="condition")
   {

    $val = $data['val'];

    if($val=="new")
    {
      if($data['action']=="100")
      {

       $ad = ads::where("cityName","like","%".$data['city']."%")
       ->where("isValidate","1")
       ->where("isBlocked","0")
       ->where("isUsed","=","0")
       ->orderBy("created_at","desc")
       ->paginate(2);
       $output = getOutput($ad);
       $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' => ""])->links() ;

       return ($output);

     }


     if($data['action']=="001")
     {

      $ad = ads::where("title","like","%".$input."%")
      ->where("isValidate","1")
      ->where("isBlocked","0")
      ->where("isUsed","=","0")
      ->orderBy("created_at","desc")
      ->paginate(2);
      $output = getOutput($ad);
      $output = $output.$ad->appends(['city' => "",'subCat' =>"",'input' => $data['input']])->links() ;
        //dd($ad);
      return ($output);

    }

    if($data['action']=="010")
    {

     $ad = ads::where("subCategoryName","like","%".$subCat."%")
     ->where("isValidate","1")
     ->where("isBlocked","0")
     ->where("isUsed","=","0")
     ->orderBy("created_at","desc")
     ->paginate(2);
     $output = getOutput($ad);
     $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' => ""])->links() ;
     return ($output);

   }

   if($data['action']=="011")
   {

     $ad = ads::where("subCategoryName","like","%".$subCat."%")
     ->where("isValidate","1")
     ->where("title","like","%".$input."%")
     ->where("isBlocked","0")
     ->where("isUsed","=","0")
     ->orderBy("created_at","desc")
     ->paginate(2);
     $output = getOutput($ad);
     $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

     return ($output);

   }

   if($data['action']=="101")
   {

    $ad = ads::where("cityName","like","%".$city."%")
    ->where("isValidate","1")
    ->where("title","like","%".$input."%")
    ->where("isBlocked","0")
    ->where("isUsed","=","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' =>$data['input']])->links() ;

    return ($output);

  }

  if($data['action']=="110")
  {

   $ad = ads::where("cityName","like","%".$city."%")
   ->where("isValidate","1")
   ->where("subCategoryName","like","%".$subCat."%")
   ->where("isBlocked","0")
   ->where("isUsed","=","0")
   ->orderBy("created_at","desc")
   ->paginate(2);
   $output = getOutput($ad);
   $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>""])->links() ;

   return ($output);

 }


 if($data['action']=="111")
 {

  $ad = ads::where("cityName","like","%".$city."%")
  ->where("isValidate","1")
  ->where("subCategoryName","like","%".$subCat."%")
  ->where("title","like","%".$input."%")
  ->where("isBlocked","0")
  ->where("isUsed","=","0")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

  return ($output);

}

}



if($val=="used")
{
  if($data['action']=="100")
  {

   $ad = ads::where("cityName","like","%".$data['city']."%")
   ->where("isValidate","1")
   ->where("isBlocked","0")
   ->where("isUsed","=","1")
   ->orderBy("created_at","desc")
   ->paginate(2);
   $output = getOutput($ad);
   $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' => ""])->links() ;
        //dd($ad);
   return ($output);

 }


 if($data['action']=="001")
 {

  $ad = ads::where("title","like","%".$input."%")
  ->where("isValidate","1")
  ->where("isBlocked","0")
  ->where("isUsed","=","1")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => "",'subCat' =>"",'input' => $data['input']])->links() ;
        //dd($ad);
  return ($output);

}

if($data['action']=="010")
{

 $ad = ads::where("subCategoryName","like","%".$subCat."%")
 ->where("isValidate","1")
 ->where("isBlocked","0")
 ->where("isUsed","=","1")
 ->orderBy("created_at","desc")
 ->paginate(2);
 $output = getOutput($ad);
 $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' => ""])->links() ;
 return ($output);

}

if($data['action']=="011")
{

 $ad = ads::where("subCategoryName","like","%".$subCat."%")
 ->where("isValidate","1")
 ->where("title","like","%".$input."%")
 ->where("isBlocked","0")
 ->where("isUsed","=","1")
 ->orderBy("created_at","desc")
 ->paginate(2);
 $output = getOutput($ad);
 $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

 return ($output);

}

if($data['action']=="101")
{

  $ad = ads::where("cityName","like","%".$city."%")
  ->where("isValidate","1")
  ->where("title","like","%".$input."%")
  ->where("isBlocked","0")
  ->where("isUsed","=","1")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' =>$data['input']])->links() ;

  return ($output);

}

if($data['action']=="110")
{

 $ad = ads::where("cityName","like","%".$city."%")
 ->where("isValidate","1")
 ->where("subCategoryName","like","%".$subCat."%")
 ->where("isBlocked","0")
 ->where("isUsed","=","1")
 ->orderBy("created_at","desc")
 ->paginate(2);
 $output = getOutput($ad);
 $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>""])->links() ;

 return ($output);

}


if($data['action']=="111")
{

  $ad = ads::where("cityName","like","%".$city."%")
  ->where("isValidate","1")
  ->where("subCategoryName","like","%".$subCat."%")
  ->where("title","like","%".$input."%")
  ->where("isBlocked","0")
  ->where("isUsed","=","1")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

  return ($output);

}

}


if($val=="both")
{

  if ($data['action']=="100")
  {

    $ad = ads::where("cityName","like","%".$city."%")
    ->where("isValidate","1")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' => ""])->links() ;

    return ($output);


  }

//case 001
  if ($data['action']=="001")
  {
    $ad = ads::where("title","like","%".$input."%")
    ->where("isValidate","1")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => "",'subCat' =>"",'input' => $data['input']])->links() ;

    return ($output);


  }

 //case 010

  if ($data['action']=="010")
  {
    $ad = ads::where("subCategoryName","like","%".$subCat."%")
    ->where("isValidate","1")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' => ""])->links() ;

    return ($output);

  }

  //case 011


  if ($data['action']=="011")
  {
    $ad = ads::where("subCategoryName","like","%".$subCat."%")
    ->where("isValidate","1")
    ->where("title","like","%".$input."%")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

    return ($output);

  }

  //case 101

  if ($data['action']=="101")
  {
    $ad = ads::where("cityName","like","%".$city."%")
    ->where("isValidate","1")
    ->where("title","like","%".$input."%")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' =>$data['input']])->links() ;

    return ($output);

  }


 //case 110
  if ($data['action']=="110")
  {
    $ad = ads::where("cityName","like","%".$city."%")
    ->where("isValidate","1")
    ->where("subCategoryName","like","%".$subCat."%")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>""])->links() ;

    return ($output);

  }


  //case 111

  if ($data['action']=="111")
  {
    $ad = ads::where("cityName","like","%".$city."%")
    ->where("isValidate","1")
    ->where("subCategoryName","like","%".$subCat."%")
    ->where("title","like","%".$input."%")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

    return ($output);

  }


}
}



//PRICING FILTER




if($data['type']=="pricing")
{

  $val = $data['val'];
  
  if($val=="negociable")
  {
    if($data['action']=="100")
    {

     $ad = ads::where("cityName","like","%".$data['city']."%")
     ->where("isValidate","1")
     ->where("isBlocked","0")
     ->where("negociable","=","1")
     ->orderBy("created_at","desc")
     ->paginate(2);
     $output = getOutput($ad);
     $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' => ""])->links() ;

     return ($output);

   }


   if($data['action']=="001")
   {

    $ad = ads::where("title","like","%".$input."%")
    ->where("isValidate","1")
    ->where("isBlocked","0")
    ->where("negociable","=","1")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => "",'subCat' =>"",'input' => $data['input']])->links() ;
        //dd($ad);
    return ($output);

  }

  if($data['action']=="010")
  {

   $ad = ads::where("subCategoryName","like","%".$subCat."%")
   ->where("isValidate","1")
   ->where("isBlocked","0")
   ->where("negociable","=","1")
   ->orderBy("created_at","desc")
   ->paginate(2);
   $output = getOutput($ad);
   $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' => ""])->links() ;
   return ($output);

 }

 if($data['action']=="011")
 {

   $ad = ads::where("subCategoryName","like","%".$subCat."%")
   ->where("isValidate","1")
   ->where("title","like","%".$input."%")
   ->where("isBlocked","0")
   ->where("negociable","=","1")
   ->orderBy("created_at","desc")
   ->paginate(2);
   $output = getOutput($ad);
   $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

   return ($output);

 }

 if($data['action']=="101")
 {

  $ad = ads::where("cityName","like","%".$city."%")
  ->where("isValidate","1")
  ->where("title","like","%".$input."%")
  ->where("isBlocked","0")
  ->where("negociable","=","1")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' =>$data['input']])->links() ;

  return ($output);

}

if($data['action']=="110")
{

 $ad = ads::where("cityName","like","%".$city."%")
 ->where("isValidate","1")
 ->where("subCategoryName","like","%".$subCat."%")
 ->where("isBlocked","0")
 ->where("negociable","=","1")
 ->orderBy("created_at","desc")
 ->paginate(2);
 $output = getOutput($ad);
 $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>""])->links() ;

 return ($output);

}


if($data['action']=="111")
{

  $ad = ads::where("cityName","like","%".$city."%")
  ->where("isValidate","1")
  ->where("subCategoryName","like","%".$subCat."%")
  ->where("title","like","%".$input."%")
  ->where("isBlocked","0")
  ->where("negociable","=","1")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

  return ($output);

}

}



if($val=="fixed")
{
  if($data['action']=="100")
  {

   $ad = ads::where("cityName","like","%".$data['city']."%")
   ->where("isValidate","1")
   ->where("isBlocked","0")
   ->where("negociable","=","0")
   ->orderBy("created_at","desc")
   ->paginate(2);
   $output = getOutput($ad);
   $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' => ""])->links() ;
        //dd($ad);
   return ($output);

 }


 if($data['action']=="001")
 {

  $ad = ads::where("title","like","%".$input."%")
  ->where("isValidate","1")
  ->where("isBlocked","0")
  ->where("negociable","=","0")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => "",'subCat' =>"",'input' => $data['input']])->links() ;
        //dd($ad);
  return ($output);

}

if($data['action']=="010")
{

 $ad = ads::where("subCategoryName","like","%".$subCat."%")
 ->where("isValidate","1")
 ->where("isBlocked","0")
 ->where("negociable","=","0")
 ->orderBy("created_at","desc")
 ->paginate(2);
 $output = getOutput($ad);
 $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' => ""])->links() ;
 return ($output);

}

if($data['action']=="011")
{

 $ad = ads::where("subCategoryName","like","%".$subCat."%")
 ->where("isValidate","1")
 ->where("title","like","%".$input."%")
 ->where("isBlocked","0")
 ->where("negociable","=","0")
 ->orderBy("created_at","desc")
 ->paginate(2);
 $output = getOutput($ad);
 $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

 return ($output);

}

if($data['action']=="101")
{

  $ad = ads::where("cityName","like","%".$city."%")
  ->where("isValidate","1")
  ->where("title","like","%".$input."%")
  ->where("isBlocked","0")
  ->where("negociable","=","0")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' =>$data['input']])->links() ;

  return ($output);

}

if($data['action']=="110")
{

 $ad = ads::where("cityName","like","%".$city."%")
 ->where("isValidate","1")
 ->where("subCategoryName","like","%".$subCat."%")
 ->where("isBlocked","0")
 ->where("negociable","=","0")
 ->orderBy("created_at","desc")
 ->paginate(2);
 $output = getOutput($ad);
 $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>""])->links() ;

 return ($output);

}


if($data['action']=="111")
{

  $ad = ads::where("cityName","like","%".$city."%")
  ->where("isValidate","1")
  ->where("subCategoryName","like","%".$subCat."%")
  ->where("title","like","%".$input."%")
  ->where("isBlocked","0")
  ->where("negociable","=","0")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

  return ($output);

}

}


if($val=="both")
{

  if ($data['action']=="100")
  {

    $ad = ads::where("cityName","like","%".$city."%")
    ->where("isValidate","1")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' => ""])->links() ;

    return ($output);


  }

//case 001
  if ($data['action']=="001")
  {
    $ad = ads::where("title","like","%".$input."%")
    ->where("isValidate","1")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => "",'subCat' =>"",'input' => $data['input']])->links() ;

    return ($output);


  }

 //case 010

  if ($data['action']=="010")
  {
    $ad = ads::where("subCategoryName","like","%".$subCat."%")
    ->where("isValidate","1")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' => ""])->links() ;

    return ($output);

  }

  //case 011


  if ($data['action']=="011")
  {
    $ad = ads::where("subCategoryName","like","%".$subCat."%")
    ->where("isValidate","1")
    ->where("title","like","%".$input."%")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

    return ($output);

  }

  //case 101

  if ($data['action']=="101")
  {
    $ad = ads::where("cityName","like","%".$city."%")
    ->where("isValidate","1")
    ->where("title","like","%".$input."%")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' =>$data['input']])->links() ;

    return ($output);

  }


 //case 110
  if ($data['action']=="110")
  {
    $ad = ads::where("cityName","like","%".$city."%")
    ->where("isValidate","1")
    ->where("subCategoryName","like","%".$subCat."%")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>""])->links() ;

    return ($output);

  }


  //case 111

  if ($data['action']=="111")
  {
    $ad = ads::where("cityName","like","%".$city."%")
    ->where("isValidate","1")
    ->where("subCategoryName","like","%".$subCat."%")
    ->where("title","like","%".$input."%")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(2);
    $output = getOutput($ad);
    $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

    return ($output);

  }

  

}


}



if($data['type']=="minmax")
{

  $min =floatval($data['min']);
  $max =floatval($data['max']);

  if($data['action']=="100")
  {

   $ad = ads::where("cityName","like","%".$data['city']."%")
   ->where("isValidate","1")
   ->where("isBlocked","0")
   ->where("price",">=",$min)
   ->where("price","<=",$max)
   ->orderBy("created_at","desc")
   ->paginate(2);
   $output = getOutput($ad);
   $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' => ""])->links() ;

   return ($output);

 }



}





}


public function displayAds(Request $request){


  $data = $request->input();


  if ($data['action']=='Region') {
      # code...

    $ads = ads::where("regionName","=",$data['val'])
    ->where("isValidate","1")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(10);
    return view('product-view')->with("ad",$ads)->with("action",$data['action'])->with("val",$data['val']);

  }


  if ($data['action']=='Cat') {
      # code...

    $ads = ads::where("categoryName","like","%".$data['val']."%")
    ->where("isValidate","1")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(10);
    return view('product-view')->with("ad",$ads)->with("action",$data['action'])->with("val",$data['val']);

  }

  if ($data['action']=='subCat') {
      # code...
     // dd($data['val']);
    $ads = ads::where("subCategoryName","like","%".$data['val']."%")
    ->where("isValidate","1")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(10);
    return view('product-view')->with("ad",$ads)->with("action",$data['action'])->with("val",$data['val'])->with("subcat",$data['val']);

  }

  if ($data['action']=='city') {
      # code...
   //dd($data['val']);
    $ads = ads::where("cityName","like","%".$data['val']."%")
    ->where("isValidate","1")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(10);
    return view('product-view')->with("ad",$ads)->with("action",$data['action'])->with("val",$data['val'])->with("cit",$data['val']);

  }
  if ($data['action']=='allAds') {
      # code...
   //dd($data['val']);
    $ads = ads::where("isValidate","1")
    ->where("isBlocked","0")
    ->orderBy("created_at","desc")
    ->paginate(10);
    return view('product-view')->with("ad",$ads)->with("action","allAds")->with("val","allAds")->with("cit","all");

  }






}


public function search(Request $request)
{

 $data = $request->input();

 $city =strtolower($data['city']);
 $subCat =strtolower($data['subCat']);
 $input =strtolower($data['input']);




//case 100
 if ($data['city']!="" && $data['subCat']=="" && $data['input']=="")
 {

  $ad = ads::where("cityName","like","%".$city."%")
  ->where("isValidate","1")
  ->where("isBlocked","0")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' => ""])->links() ;

  return ($output);


}

//case 001
if ($data['city']=='' && $data['subCat']=='' && $data['input']!='')
{
  $ad = ads::where("title","like","%".$input."%")
  ->where("isValidate","1")
  ->where("isBlocked","0")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => "",'subCat' =>"",'input' => $data['input']])->links() ;

  return ($output);


}

 //case 010

if ($data['city']=='' && $data['subCat']!='' && $data['input']=='')
{
  $ad = ads::where("subCategoryName","like","%".$subCat."%")
  ->where("isValidate","1")
  ->where("isBlocked","0")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' => ""])->links() ;

  return ($output);

}

  //case 011


if ($data['city']=='' && $data['subCat']!='' && $data['input']!='')
{
  $ad = ads::where("subCategoryName","like","%".$subCat."%")
  ->where("isValidate","1")
  ->where("title","like","%".$input."%")
  ->where("isBlocked","0")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => "",'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

  return ($output);

}

  //case 101

if ($data['city']!='' && $data['subCat']=='' && $data['input']!='')
{
  $ad = ads::where("cityName","like","%".$city."%")
  ->where("isValidate","1")
  ->where("title","like","%".$input."%")
  ->where("isBlocked","0")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>"",'input' =>$data['input']])->links() ;

  return ($output);

}


 //case 110
if ($data['city']!='' && $data['subCat']!='' && $data['input']=='')
{
  $ad = ads::where("cityName","like","%".$city."%")
  ->where("isValidate","1")
  ->where("subCategoryName","like","%".$subCat."%")
  ->where("isBlocked","0")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>""])->links() ;

  return ($output);

}


  //case 111

if ($data['city']!='' && $data['subCat']!='' && $data['input']!='')
{
  $ad = ads::where("cityName","like","%".$city."%")
  ->where("isValidate","1")
  ->where("subCategoryName","like","%".$subCat."%")
  ->where("title","like","%".$input."%")
  ->where("isBlocked","0")
  ->orderBy("created_at","desc")
  ->paginate(2);
  $output = getOutput($ad);
  $output = $output.$ad->appends(['city' => $data['city'],'subCat' =>$data['subCat'],'input' =>$data['input']])->links() ;

  return ($output);

}







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


$ad->title = strtolower($data['title']) ;
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




if(isset($data['negociable']))
{
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

  return redirect ('/myadd?action=display');
// $ads= ads::where("userId",'Auth::user()->id')->paginate(3);


// return view('clients.myadd')->with("ad",$ads);





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
 $data = $request->input();
 
 if($request->isMethod('get'))
 {


   if($data['action']=='display')
   {
    $ads = ads::where("userId",Auth::user()->id)->orderBy("created_at","DESC")->paginate(7); 
    return view('clients.myadd')->with("ad",$ads);

  }


  if($data['action']=='delete')
  {
    ads::destroy($data['id']);
    return redirect ('/myadd?action=display');


  }


  if($data['action']=='edit')
  {

   $ads = ads::find($data['id']);

   
   $regions = DB::table('regions')->get();


   return view ('clients.editAd')->with("ads",$ads)->with("region",$regions);


 }
}

if($request->isMethod('post')){
 $data = $request->input();

 $ad = ads::find($request->get('id'));

 $ad->regionName= $data['RegionName'];
 $ad->cityName = $data['cityName'];
 $ad->address = $data['address'];
 $ad->phone1 = $data['phone1'];
 $ad->title = strtolower($data['title']) ;
 $ad->description = $data['description'];
 $ad->price = $data['price'];              
    $ad->save();

      return redirect ('/myadd?action=display');

}



}
public function homePage( Request $request ){

  $ads = ads::where("isValidate","1")->orderBy("created_at",'desc')->paginate(5); 
  return view('welcome')->with("ad",$ads);
}



}
