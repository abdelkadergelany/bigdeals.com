<?php

namespace App\Http\Controllers;
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
use App\modele;
use App\conversations;
use App\chat;
use App\order;
use App\email;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;



class AdminController extends Controller
{
  public function login(Request $request){
    if($request->isMethod('post')){
      $data = $request->input();
      if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'admin'=>'1']))
      {
        $unreadEmail = DB::table('emails')->where("state","0")->get();


        if($unreadEmail->count()!=0){

          session(['newemail' => 'true']);

        }
        else{
          session(['newemail' => 'false']);

        }




        return redirect ('admin/dashboard');
      }
      else{

        return redirect ('/admin')->with('flash_message_error','Invalid username or Password');
      }
    }
    
    return view('admin.admin_login');
  }


// manage brand
  
  public function manageBrand(Request $request){

    if($request->isMethod('post')){
      $data = $request->input();


      if($data['action']=="addBrand"){

       brand::create([
        'brandName' => strtolower($data['name']) ,
        'subCategoryName' => $data['subCategory']
      ]); 

       return redirect ('/manageBrand?action=displayBrand');

     }



     if($data['action']=="addModel"){

       modele::create([
        'modelName' =>strtolower($data['name']) ,
        'subCategoryName' => $data['subCategory'],
        'brandName' => $data['brandName'],
      ]); 

       return redirect ('/manageBrand?action=displayModel');

     }



   }



   if($request->isMethod('get')){
    $data = $request->input();

    if($data['action']=="displayBrand")
    {
          // $brands = brand::all()->paginate(10);

     $brands = DB::table('brands')->orderBy("brandName")->paginate(10);

     $subCategory = sub_category::all()->sortBy("subCategoryName");

     return view('manage_brands')->with("brands",$brands)->with("subCategory",$subCategory);


   }

   if($data['action']=="displayModel")
   {
          // $models = modele::all()->paginate(10);

    $models = DB::table('modeles')->orderBy("modelName")->paginate(10);

    $subCategory = sub_category::all()->sortBy("subCategoryName");
    $brands = brand::all()->sortBy("brandName");


    return view('manage_models')->with("brands",$brands)->with("subCategory",$subCategory)->with("models",$models);


  }
  if($data['action']=="deleteModel")
  {

    modele::destroy($request->get('value'));
    return redirect("manageBrand?action=displayModel");
    


  }


}




}


  //end manage brand


public function readMail(Request $request){



 DB::table('emails')->where("state","0")->update(['state' => "1"]);
 session(['newemail' => 'false']);

 $email = DB::table('emails')->orderBy("created_at","desc")->paginate(10);



 return view('manage_email')->with("email",$email);

}


public function allorders(Request $request){

 $orders = DB::table('orders')->paginate(10);
 $allOrderCount  = $orders->count();
 $pendingOrderCount = order::where("state","=","0")->get();
 $canceledOrderCount = order::where("state","=","1")->get();
 $deliveredOrderCount = order::where("state","=","2")->get();



 return view("manageorder")->with("orders",$orders)
 ->with("allOrderCount",$allOrderCount)
 ->with("pendingOrderCount",$pendingOrderCount->count())
 ->with("canceledOrderCount",$canceledOrderCount->count())
 ->with("deliveredOrderCount",$deliveredOrderCount->count());



}


public function pendingorder(Request $request){

  $orders = DB::table('orders')->where("state","=","0")->paginate(10);

  $ordercount = DB::table('orders');
  $allOrderCount  = $ordercount->count();
  $pendingOrderCount = order::where("state","=","0")->get();
  $canceledOrderCount = order::where("state","=","1")->get();
  $deliveredOrderCount = order::where("state","=","2")->get();



  return view("manageorder")->with("orders",$orders)
  ->with("allOrderCount",$allOrderCount)
  ->with("pendingOrderCount",$pendingOrderCount->count())
  ->with("canceledOrderCount",$canceledOrderCount->count())
  ->with("deliveredOrderCount",$deliveredOrderCount->count());



}

public function canceledorder(Request $request){

  $orders = DB::table('orders')->where("state","=","1")->paginate(10);

  $ordercount = DB::table('orders');
  $allOrderCount  = $ordercount->count();
  
  $pendingOrderCount = order::where("state","=","0")->get();
  $canceledOrderCount = order::where("state","=","1")->get();
  $deliveredOrderCount = order::where("state","=","2")->get();


  return view("manageorder")->with("orders",$orders)
  ->with("allOrderCount",$allOrderCount)
  ->with("pendingOrderCount",$pendingOrderCount->count())
  ->with("canceledOrderCount",$canceledOrderCount->count())
  ->with("deliveredOrderCount",$deliveredOrderCount->count());



}

public function deliveredorder(Request $request){
 $orders = DB::table('orders')->where("state","=","2")->paginate(10);

 $ordercount = DB::table('orders');
 $allOrderCount  = $ordercount->count();
 
 $pendingOrderCount = order::where("state","=","0")->get();
 $canceledOrderCount = order::where("state","=","1")->get();
 $deliveredOrderCount = order::where("state","=","2")->get();



 return view("manageorder")->with("orders",$orders)
 ->with("allOrderCount",$allOrderCount)
 ->with("pendingOrderCount",$pendingOrderCount->count())
 ->with("canceledOrderCount",$canceledOrderCount->count())
 ->with("deliveredOrderCount",$deliveredOrderCount->count());


}


public function userLogin(Request $request){
  if($request->isMethod('post')){
    $data = $request->input();
    if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'isBlocked'=>'0']))
    {

      $unreadEmailUser = DB::table('chats')->where("state","0")->where("to",Auth::user()->id)->get();


        if($unreadEmailUser->count()!=0){
         
          session(['newemailUser' => 'true']);

        }
        else{
          session(['newemailUser' => 'false']);

        }


      return redirect("myAccount");

    }
    else{
      return redirect ('/userLogin')->with('flash_message_error','Invalid username or Password');
    }
  }

  return view('clients.userLogin');
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
  $userCount = user::all();
  $adsCount = ads::all();
  $catCount = category::all();
  $subCatCount =sub_category::all();
  $cityCount =city::all();
  $totalOrderCount = order::all();
  $pendingOrderCount = order::where("state","=","0")->get();
  $deliveredOrderCount = order::where("state","=","2")->get();
  $newAdCount = ads::where("isValidate","=","0")->get();
  $waitCollectionCount  = ads::where("buyNow","=","2")->get();
  $vipRequestCount  = ads::where("buyNow","=","1")->get();
  $vipValid  = ads::where("buyNow","=","3")->get();

  return view('admin.dashboard')
  ->with("userCount",$userCount->count())
  ->with("adsCount",$adsCount->count())
  ->with("catCount",$catCount->count())
  ->with("subCatCount",$subCatCount->count())
  ->with("cityCount",$cityCount->count())
  ->with("totalOrderCount",$totalOrderCount->count())
  ->with("pendingOrderCount",$pendingOrderCount->count())
  ->with("deliveredOrderCount",$deliveredOrderCount->count())
  ->with("newAdCount",$newAdCount->count())
  ->with("waitCollectionCount",$waitCollectionCount->count())
  ->with("vipRequestCount",$vipRequestCount->count())
  ->with("vipValid",$vipValid->count());

}



public function manageUsers(){
 $userInfos = DB::table('users')->paginate(20);
 


 return view('admin_manage_users')->with("userInfo",$userInfos);

}
public function manageAds(){
 $userInfos = User::all();

 $regions = region::all();
 $category = category::all();
 $ads = DB::table('ads')->paginate(10);

 $inactivatedCount = ads::where("isValidate","=","0")->get();
 $activatedCount = ads::where("isValidate","=","1")->get();
 $isBlockedCount = ads::where("isBlocked","=","1")->get();
 $waitCollectionCount  = ads::where("buyNow","=","2")->get();
 $vipRequestCount  = ads::where("buyNow","=","1")->get();
 $vipValid  = ads::where("buyNow","=","3")->get();

 return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads)
 ->with("inactivatedCount",$inactivatedCount->count())
 ->with("isBlockedCount",$isBlockedCount->count())
 ->with("activatedCount",$activatedCount->count())
 ->with("vipCount",$vipRequestCount->count())
 ->with("vipValid",$vipValid->count())
 ->with("waitCollectionCount",$waitCollectionCount->count());



}



public function vipAds(){
  $regions = region::all();
  $category = category::all();
  $ads = DB::table('ads')->where("buyNow","=","3")->paginate(10);

  $inactivatedCount = ads::where("isValidate","=","0")->get();
  $activatedCount = ads::where("isValidate","=","1")->get();
  $isBlockedCount = ads::where("isBlocked","=","1")->get();
  $waitCollectionCount  = ads::where("buyNow","=","2")->get();
  $vipRequestCount  = ads::where("buyNow","=","1")->get();
  $vipValid  = ads::where("buyNow","=","3")->get();

  //$ads= ads::where("isValidate",'0')->get();
  return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads)
  ->with("inactivatedCount",$inactivatedCount->count())
  ->with("isBlockedCount",$isBlockedCount->count())
  ->with("activatedCount",$activatedCount->count())
  ->with("vipCount",$vipRequestCount->count())
  ->with("vipValid",$vipValid->count())
  ->with("waitCollectionCount",$waitCollectionCount->count());

}



public function inactivatedAds(){
  $regions = region::all();
  $category = category::all();
  $ads = DB::table('ads')->where("isValidate","=","0")->paginate(10);

  $inactivatedCount = ads::where("isValidate","=","0")->get();
  $activatedCount = ads::where("isValidate","=","1")->get();
  $isBlockedCount = ads::where("isBlocked","=","1")->get();
  $waitCollectionCount  = ads::where("buyNow","=","2")->get();
  $vipRequestCount  = ads::where("buyNow","=","1")->get();
  $vipValid  = ads::where("buyNow","=","3")->get();

  //$ads= ads::where("isValidate",'0')->get();
  return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads)
  ->with("inactivatedCount",$inactivatedCount->count())
  ->with("isBlockedCount",$isBlockedCount->count())
  ->with("activatedCount",$activatedCount->count())
  ->with("vipCount",$vipRequestCount->count())
  ->with("vipValid",$vipValid->count())
  ->with("waitCollectionCount",$waitCollectionCount->count());

}
public function activatedAds(){

  $regions = region::all();
  $category = category::all();
  $inactivatedCount = ads::where("isValidate","=","0")->get();
  $activatedCount = ads::where("isValidate","=","1")->get();
  $isBlockedCount = ads::where("isBlocked","=","1")->get();
  $waitCollectionCount  = ads::where("buyNow","=","2")->get();
  $vipRequestCount  = ads::where("buyNow","=","1")->get();
  $vipValid  = ads::where("buyNow","=","3")->get();


  $ads = DB::table('ads')->where("isValidate",'1')->paginate(10);

  //$ads= ads::where("isValidate",'1')->get();
  return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads)
  ->with("inactivatedCount",$inactivatedCount->count())
  ->with("isBlockedCount",$isBlockedCount->count())
  ->with("activatedCount",$activatedCount->count())
  ->with("vipCount",$vipRequestCount->count())
  ->with("vipValid",$vipValid->count())
  ->with("waitCollectionCount",$waitCollectionCount->count());



  
}
public function blockedAds(){
  $regions = region::all();
  $category = category::all();
  $inactivatedCount = ads::where("isValidate","=","0")->get();
  $activatedCount = ads::where("isValidate","=","1")->get();
  $isBlockedCount = ads::where("isBlocked","=","1")->get();
  $waitCollectionCount  = ads::where("buyNow","=","2")->get();
  $vipRequestCount  = ads::where("buyNow","=","1")->get();
  $vipValid  = ads::where("buyNow","=","3")->get();



  $ads = DB::table('ads')->where("isBlocked",'1')->paginate(10);

  //$ads= ads::where("isBlocked",'1')->get();
  return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads)
  ->with("inactivatedCount",$inactivatedCount->count())
  ->with("isBlockedCount",$isBlockedCount->count())
  ->with("activatedCount",$activatedCount->count())
  ->with("vipCount",$vipRequestCount->count())
  ->with("vipValid",$vipValid->count())
  ->with("waitCollectionCount",$waitCollectionCount->count());


  
}

public function vipRequest(){
  $regions = region::all();
  $category = category::all();
  $inactivatedCount = ads::where("isValidate","=","0")->get();
  $activatedCount = ads::where("isValidate","=","1")->get();
  $isBlockedCount = ads::where("isBlocked","=","1")->get();
  $waitCollectionCount  = ads::where("buyNow","=","2")->get();
  $vipRequestCount  = ads::where("buyNow","=","1")->get();
  $vipValid  = ads::where("buyNow","=","3")->get();
  $ads = DB::table('ads')->where("buyNow",'1')->paginate(10);

  //$ads= ads::where("isBlocked",'1')->get();
  return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads)
  ->with("inactivatedCount",$inactivatedCount->count())
  ->with("isBlockedCount",$isBlockedCount->count())
  ->with("activatedCount",$activatedCount->count())
  ->with("vipCount",$vipRequestCount->count())
  ->with("vipValid",$vipValid->count())
  ->with("waitCollectionCount",$waitCollectionCount->count());

  
}

public function waitCollection(){
  $regions = region::all();
  $category = category::all();
  $inactivatedCount = ads::where("isValidate","=","0")->get();
  $activatedCount = ads::where("isValidate","=","1")->get();
  $isBlockedCount = ads::where("isBlocked","=","1")->get();
  $waitCollectionCount  = ads::where("buyNow","=","2")->get();
  $vipRequestCount  = ads::where("buyNow","=","1")->get();
  $vipValid  = ads::where("buyNow","=","3")->get();
  $ads = DB::table('ads')->where("buyNow",'2')->paginate(10);

  //$ads= ads::where("isBlocked",'1')->get();
  return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads)
  ->with("inactivatedCount",$inactivatedCount->count())
  ->with("isBlockedCount",$isBlockedCount->count())
  ->with("activatedCount",$activatedCount->count())
  ->with("vipCount",$vipRequestCount->count())
  ->with("vipValid",$vipValid->count())
  ->with("waitCollectionCount",$waitCollectionCount->count());

  
}



public function editRegion(Request $request){ 

 if($request->isMethod('get')){

  $reg = region::find($request->get("id"));

  return view('edit_region')->with("regId",$reg->id)->with("regName",$reg->regionName);


}


if($request->isMethod('post')){

  $reg = region::find($request->get("id"));
  $reg->regionName=strtolower($request->get("name")) ;
  $reg->save();
  return redirect('manageRegions');

}


}




public function editAd(Request $request){ 
  if($request->isMethod('get')){

  // $regions = region::all();   
   $category = category::all();
   //$size = size::all();
   $ads = ads::find($request->get("id"));

   //$brand= brand::where("subCategoryName",$request->get("subCategoryName"))->get();

   

   return view('edit_Ad')->with("category",$category)->with("ads",$ads);
 }

 if($request->isMethod('post')){

  $data = $request->input();
  $ad = ads::find($request->get('id'));

  $isBlockedFlag = $data['isBlockedFlag'];
  $isValidateFlag = $data['isValidateFlag'];
  $buyNowFlag = $data['buyNowFlag'];


  if ($isValidateFlag != $data['isValidate']) {

        //check if the ad is validated and send a confirmation message to the seller

    if ($data['isValidate'] == "1") {

      $message = "Congratulation Your Ad <".$ad->title."> has been validated. you can now see it online";
      $recever = $ad->userId;
      


      $checkIfConversationExist = conversations::where("userId",Auth::user()->id)->where("with",$recever);
      $checkIfConversationExistWith = conversations::where("userId",$recever)->where("with",Auth::user()->id);






      if($checkIfConversationExist->count() == 0)
      {

        conversations::create([
         'userId' => Auth::user()->id,
         'with' => $recever,
         "created_at"=>now()
       ]); 

      }

      if($checkIfConversationExistWith->count() == 0)
      {
        conversations::create([
         'userId' => $recever,
         'with' => Auth::user()->id,
         "created_at"=>now()
       ]); 

      }

      chat::create([
       'message' => $message,
       "created_at"=>now(),
       'from' => Auth::user()->id,
       'to' => $recever
     ]); 


    }

  }


      //check if ad is blocked or unblocked and inform the user
  if ($isBlockedFlag != $data['isBlocked']) {



    if ($data['isBlocked'] == "1") {

      $message = " Your Ad <".$ad->title."> has been Blocked.For more details check our Terms and conditions";
      $recever = $ad->userId;
      


      $checkIfConversationExist = conversations::where("userId",Auth::user()->id)->where("with",$recever);
      $checkIfConversationExistWith = conversations::where("userId",$recever)->where("with",Auth::user()->id);



      if($checkIfConversationExist->count() == 0)
      {

        conversations::create([
         'userId' => Auth::user()->id,
         'with' => $recever,
         "created_at"=>now()
       ]); 

      }

      if($checkIfConversationExistWith->count() == 0)
      {
        conversations::create([
         'userId' => $recever,
         'with' => Auth::user()->id,
         "created_at"=>now()
       ]); 

      }

      chat::create([
       'message' => $message,
       "created_at"=>now(),
       'from' => Auth::user()->id,
       'to' => $recever
     ]); 


    }

    if ($data['isBlocked'] == "0") {

      $message = " Your Ad <".$ad->title."> has been UnBlocked.";
      $recever = $ad->userId;
      


      $checkIfConversationExist = conversations::where("userId",Auth::user()->id)->where("with",$recever);
      $checkIfConversationExistWith = conversations::where("userId",$recever)->where("with",Auth::user()->id);



      if($checkIfConversationExist->count() == 0)
      {

        conversations::create([
         'userId' => Auth::user()->id,
         'with' => $recever,
         "created_at"=>now()
       ]); 

      }

      if($checkIfConversationExistWith->count() == 0)
      {
        conversations::create([
         'userId' => $recever,
         'with' => Auth::user()->id,
         "created_at"=>now()
       ]); 

      }

      chat::create([
       'message' => $message,
       "created_at"=>now(),
       'from' => Auth::user()->id,
       'to' => $recever
     ]); 


    }

  }

       //check if the vip status has change and inform the user
  if ($buyNowFlag != $data['buyNow']) {



    if ($data['buyNow'] == "3") {

      $message = "We have succesfully collect the product  of your Ad <".$ad->title.">. it will now be display online as VIP and you will be notified after the sale. 5% of the sale amount will be deduced";
      $recever = $ad->userId;
      


      $checkIfConversationExist = conversations::where("userId",Auth::user()->id)->where("with",$recever);
      $checkIfConversationExistWith = conversations::where("userId",$recever)->where("with",Auth::user()->id);



      if($checkIfConversationExist->count() == 0)
      {

        conversations::create([
         'userId' => Auth::user()->id,
         'with' => $recever,
         "created_at"=>now()
       ]); 

      }

      if($checkIfConversationExistWith->count() == 0)
      {
        conversations::create([
         'userId' => $recever,
         'with' => Auth::user()->id,
         "created_at"=>now()
       ]); 

      }

      chat::create([
       'message' => $message,
       "created_at"=>now(),
       'from' => Auth::user()->id,
       'to' => $recever
     ]); 


    }

    if ($data['buyNow'] == "2") {

      $message =" Your VipRequest for  Ad <".$ad->title."> has been Examinated and approved. it will be display online as vip once we have collected the product. 5% of the sale amount will be deduced";


      $recever = $ad->userId;
      


      $checkIfConversationExist = conversations::where("userId",Auth::user()->id)->where("with",$recever);
      $checkIfConversationExistWith = conversations::where("userId",$recever)->where("with",Auth::user()->id);



      if($checkIfConversationExist->count() == 0)
      {

        conversations::create([
         'userId' => Auth::user()->id,
         'with' => $recever,
         "created_at"=>now()
       ]); 

      }

      if($checkIfConversationExistWith->count() == 0)
      {
        conversations::create([
         'userId' => $recever,
         'with' => Auth::user()->id,
         "created_at"=>now()
       ]); 

      }

      chat::create([
       'message' => $message,
       "created_at"=>now(),
       'from' => Auth::user()->id,
       'to' => $recever
     ]); 


    }

    if ($data['buyNow'] == "0") {

     $message = " Your VipRequest for  Ad <".$ad->title."> has been Denied . Check our terms and condition for more details or contact us ";
     $recever = $ad->userId;



     $checkIfConversationExist = conversations::where("userId",Auth::user()->id)->where("with",$recever);
     $checkIfConversationExistWith = conversations::where("userId",$recever)->where("with",Auth::user()->id);



     if($checkIfConversationExist->count() == 0)
     {

      conversations::create([
       'userId' => Auth::user()->id,
       'with' => $recever,
       "created_at"=>now()
     ]); 

    }

    if($checkIfConversationExistWith->count() == 0)
    {
      conversations::create([
       'userId' => $recever,
       'with' => Auth::user()->id,
       "created_at"=>now()
     ]); 

    }

    chat::create([
     'message' => $message,
     "created_at"=>now(),
     'from' => Auth::user()->id,
     'to' => $recever
   ]); 
  }

}
      //end of buyNow flag





$ad->buyNow = $data['buyNow'];
$ad->subCategoryName = $data['subCategoryName'];
$ad->categoryName = $data['category'];



$ad->isBlocked = $data['isBlocked'];
$ad->isValidate = $data['isValidate'];




$ad->save();

  // $regions = region::all();
  // $category = category::all();
  // $ads = ads::all();
  // return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads);
return redirect('manageAds');





}


}

public function deleteAd(Request $request){ 

 ads::destroy($request->get('id'));
 $regions = region::all();
 $category = category::all();
 $ads = ads::all();
 return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads);

}

public function deleteUser(Request $request){ 

 user::destroy($request->get('id'));
 
 return redirect("manageUsers");

}






public function addNewAd(Request $request){       
 $new_name1 =null;
 $new_name2 =null;
 $new_name3 =null;
 $new_name4 =null;
 $new_name5 =null;

 if($request->isMethod('get')){

   $data = $request->input();
   $regions = region::all();   
   $category = category::all();
   $size = size::all();
   $ads = ads::all();
   
            //  dd($data['category']);
   $brand= brand::where("subCategoryName",$data['subCategoryName'])->get();

   

   return view('add_new_ad')->with("category",$category)->with("region",$regions)
   ->with("catval",$data['category'])
   ->with("subCatval",$data['subCategoryName'])
   ->with("size",$size) 
   ->with("brand",$brand);
   

 }


 if($request->isMethod('post')){

   $data = $request->input();
   
   
   
   $image = $request->file('file1');
   $new_name1 = rand().'.'.$image->getClientOriginalExtension();
   $image->move(public_path("publication"),$new_name1);
   
   

   
   if($request->file('file2') != null){

    $image = $request->file('file2');
    $new_name2 = rand().'.'.$image->getClientOriginalExtension();
    $image->move(public_path("publication"),$new_name2);

  } 
  if($request->file('file3') != null){

    $image = $request->file('file3');
    $new_name3 = rand().'.'.$image->getClientOriginalExtension();
    $image->move(public_path("publication"),$new_name3);

  } 

  if($request->file('file4') != null){

    $image = $request->file('file4');
    $new_name4 = rand().'.'.$image->getClientOriginalExtension();
    $image->move(public_path("publication"),$new_name4);

  } 

  if($request->file('file5') != null){

    $image = $request->file('file5');
    $new_name5 = rand().'.'.$image->getClientOriginalExtension();
    $image->move(public_path("publication"),$new_name5);

  } 
  

  $cater = strtolower($data['category']);




  $ad = new ads;
  $ad->buyNow = $request->get('buyNow');
  $ad->subCategoryName =  strtolower($data['subCategoryName']);
  $ad->categoryName =  strtolower($data['category']);
  $ad->regionName=  strtolower($data['RegionName']);
  $ad->cityName =  strtolower($data['cityName']);
  $ad->address = $data['address'];
  $ad->phone1 = $data['phone1'];
  $ad->title = $data['title'];
  $ad->description = $data['description'];

  if(isset($data['phone2'])){

    $ad->phone2 = $data['phone1'];


  }

  if(isset($data['phone3'])){

    $ad->phone3 = $data['phone3'];


  }



  

  if($cater == 'electronic' || $cater =='mobile phones' || $cater =='automotive' )
  {
    $ad->brand = $data['brandName'];

    $ad->model = $data['modelName'];
  }
  
  if($cater == 'fashion and clothing')
  {
    $ad->size = $data['size'];
  }

  
  $ad->userId= Auth::id();
  $ad->isUsed = $data['isUsed'];
  $ad->brand = $data['brandName'];
  $ad->model = $data['modelName']; 

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

  $regions = region::all();
  $category = category::all();
  $ads = ads::all();
  return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads);
} 
}


public function updateUsers(Request $request){

 $data = $request->input();  
 

 $phon = Phone::where('userId',$data['id'])->first();
 
 $userInfos = UserInfo::find($data['id']);
 $user = User::find($data['id']);

 $phon->phone = $data['phone'];
 $user->name = $data['name'];
 $userInfos->address = $data['address'];     
 
 $userInfos->city = $data['city'];
 $phon->save();
 $userInfos->save();
 $user->save();
 
 
 $userInfos = User::all();
 return view('admin_manage_users')->with("userInfo",$userInfos);
 self:: manageUsers();
}


public function manageSubCategory(Request $request){


  $sub = DB::table('sub_categories')->paginate(10);

  $cat = category::all()->sortBy("categoryName");
  return view('manage_sub_category')->with("sub_category",$sub)->with("category",$cat);
      //return view('manage_sub_category')->with("sub_category","www");
}

public function addSubCategory(Request $request){


  $data = $request->input(); 

  $_name = strtolower($data['name']);
  $_categoryName = strtolower($data['categoryName']);
  $_description = strtolower($data['description']);


  sub_category::create([
    'subCategoryName' => $_name,
    'category' => $_categoryName,
    'description' => $_description
  ]); 

  $sub = DB::table('sub_categories')->paginate(10);
  $cat = category::all()->sortBy("categoryName");
  return view('manage_sub_category')->with("sub_category",$sub)->with("category",$cat);
}

public function updateSubCategory(Request $request){
 $data = $request->input();
 $subcat = sub_category::find($data['id']);
 $subcat->subCategoryName = $data['name'];
 $subcat->description = $data['description'];
 $subcat->category = $data['categoryName'];
 
 $subcat->save();


 $sub = DB::table('sub_categories')->paginate(10);
 $cat = category::all()->sortBy("categoryName");
 return view('manage_sub_category')->with("sub_category",$sub)->with("category",$cat);


}
public function updateCity(Request $request){

 $data = $request->input();  
 

 $cit = city::find($data['id']);
 
 
 
 $cit->cityName = strtolower($data['name']);
 $cit->RegionName = strtolower($data['regionName']);       
 $cit->save();
 
 
 return redirect('manageCities');
}


public function addRegions(Request $request){

 $data = $request->input(); 
 $_name = strtolower($data['name']);

 region::create([
  'regionName' => $_name,
]); 
 $regions = region::all();
 return view('manage_regions')->with("region",$regions); 
}



public function manageRegions(Request $request){

  $regions = region::all();
  return view('manage_regions')->with("region",$regions);
  
}
public function manageCategories(Request $request){

 // //$ads = ads::where("userId",Auth::user()->id)->paginate(3);
 // $category = category::all()->paginate(3);
  $category = DB::table('categories')->paginate(6);

 //$category = category::all()->sortBy("categoryName")->paginate(6);
  return view('manage_categories')->with("category",$category);



}

public function updateCategory(Request $request){

 $data = $request->input();
         // dd($request->file('fileIcon'));
 $cat = category::find($data['id']);
 $cat->categoryName = strtolower($data['name']);
 $cat->description = strtolower($data['description']);

 if($request->file('fileIcon') != null){

  $image = $request->file('fileIcon');
  $new_name = rand().'.'.$image->getClientOriginalExtension();
  $image->move(public_path("images"),$new_name);
  $cat->image = $new_name;

}
$cat->save();

$category = DB::table('categories')->paginate(6);

//$category = category::all()->sortBy("categoryName");
return view('manage_categories')->with("category",$category);

         //return view('manage_categories');


}



public function manageCities(Request $request){

  $city = DB::table('cities')->paginate(10);

 // $city = city::all()->sortBy("RegionName");
  $regions = region::all()->sortBy("RegionName");
  return view('manage_cities')->with("city",$city)->with("region",$regions);
  
}

public function addCity(Request $request){

 $data = $request->input(); 

 $_name = strtolower($data['name']);
 $_regionName = strtolower($data['regionName']);

 city::create([
  'cityName' => $_name,
  'RegionName' => $_regionName,
]); 

 $city = DB::table('cities')->paginate(10);
 $regions = region::all()->sortBy("RegionName");
 return view('manage_cities')->with("city",$city)->with("region",$regions);
 
}



public function addCategory(Request $request){

  $validatedData = $request->validate([
   'image'=>'image|mimes:jpeg,png,jpg,gif|max:2048',
   'name'=>'required',
   'description'=> 'required'
 ]);


  $image = $request->file('file');
  $new_name = rand().'.'.$image->getClientOriginalExtension();
  $image->move(public_path("images"),$new_name);

  $data = $request->input(); 
  $_name = strtolower($data['name']);
  $_description = strtolower($data['description']);
  $data = $request->input(); 
  category::create([
    'categoryName' => $_name,
    'description' => $_description ,
    'image' => $new_name
  ]); 

  $category = DB::table('categories')->paginate(6);
  //$category = category::all()->sortBy("categoryName");
  return view('manage_categories')->with("flash_success_message","new category added succesfully")->with("category",$category);
  
  
}






public function blockUsers(Request $request){

 $data = $request->input();  

 $user = User::find($data['id']);

 if($user->isBlocked=="1")
 {

   $user->isBlocked ="0" ;
 }
 
 else {
  $user->isBlocked = "1";

}
// dd($user->isBlocked);
$user->save();


return redirect("manageUsers");

}





public function logout(){
  Session::flush(); 
  return redirect ('/admin')->with('flash_message_success','Signed out succesfully');

}
}
