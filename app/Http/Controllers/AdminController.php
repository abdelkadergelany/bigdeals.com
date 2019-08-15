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

     
      public function userLogin(Request $request){
        if($request->isMethod('post')){
            $data = $request->input();
            if(Auth::attempt(['email'=>$data['email'],'password'=>$data['password'],'isBlocked'=>'0']))
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
       $userInfos = User::all();
       

       return view('admin_manage_users')->with("userInfo",$userInfos);

}
public function manageAds(){
       $userInfos = User::all();
       
        $regions = region::all();
        $category = category::all();
        $ads = ads::all();
         return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads);

}

public function inactivatedAds(){
  $regions = region::all();
        $category = category::all();

  $ads= ads::where("isValidate",'0')->get();
  return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads);

}
public function activatedAds(){

  $regions = region::all();
        $category = category::all();
  $ads= ads::where("isValidate",'1')->get();
  return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads);


  
}
public function blockedAds(){
  $regions = region::all();
        $category = category::all();
$ads= ads::where("isBlocked",'1')->get();
  return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads);

  
}






public function editAd(Request $request){ 
  if($request->isMethod('get')){

           //$data = $request->input();
         $regions = region::all();   
        $category = category::all();
         $size = size::all();
          $ads = ads::find($request->get("id"));
         //$request->get("subCategoryName")
            //  dd($data['category']);
        $brand= brand::where("subCategoryName",$request->get("subCategoryName"))->get();

             

         return view('edit_Ad')->with("category",$category)
         ->with("region",$regions)
         ->with("size",$size) 
         ->with("brand",$brand)
         ->with("ads",$ads);
       }

       if($request->isMethod('post')){

           $phone1 = null;
           $phone2 = null;
           $phone3 = null;
           
       $data = $request->input();
        
        $ad = ads::find($request->get('id'));


        $ad->buyNow = $request->get('buyNow');
        $ad->subCategoryName = $data['subCategoryName'];
        $ad->categoryName = $data['category'];
      $ad->regionName= $data['RegionName'];
           $ad->cityName = $data['cityName'];
            $ad->address = $data['address'];
            $ad->categoryName = $data['category'];
            $ad->subCategoryName = $data['subCategoryName'];
            $ad->phone1 = $data['phone1'];
             $ad->phone2 = $phone2;
              $ad->phone3 = $phone3;
              

            $ad->title = $data['title'];
            $ad->description = $data['description'];

            

            if($data['category'] == 'Electronic' || $data['category'] =='Mobile Phones' )
            {
              $ad->brand = $data['brandName'];

              $ad->model = $data['modelName'];
            }
            
            if($data['category'] == 'Fashion and Clothing')
            {
              $ad->size = $data['size'];
            }

            $ad->isBlocked = $data['isBlocked'];
            $ad->isValidate = $data['isValidate'];
            $ad->isUsed = $data['isUsed'];
            $ad->brand = $data['brandName'];
            $ad->model = $data['modelName']; 

             if ($data['negociable'] =='1' ) {
            $ad->negociable = $data['negociable'];
             }

            
              $ad->authenticity = $data['authenticity'];
              $ad->price = $data['price'];              

              $ad->save();

         $regions = region::all();
        $category = category::all();
        $ads = ads::all();
         return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads);





       }


}

public function deleteAd(Request $request){ 

   ads::destroy($request->get('id'));
        $regions = region::all();
        $category = category::all();
        $ads = ads::all();
         return view('manage_ads')->with("category",$category)->with("region",$regions)->with("ads",$ads);

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
            $ad->title = $data['title'];
            $ad->description = $data['description'];

            

            if($data['category'] == 'Electronic' || $data['category'] =='Mobile Phones' )
            {
              $ad->brand = $data['brandName'];

              $ad->model = $data['modelName'];
            }
            
            if($data['category'] == 'Fashion and Clothing')
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
       
        $sub = sub_category::all()->sortBy("subCategoryName");
         $cat = category::all();
          return view('manage_sub_category')->with("sub_category",$sub)->with("category",$cat);
      //return view('manage_sub_category')->with("sub_category","www");
}

public function addSubCategory(Request $request){

   
    $data = $request->input(); 
        sub_category::create([
            'subCategoryName' => $data['name'],
            'category' => $data['categoryName'],
            'description' => $data['description']
        ]); 

         $sub = sub_category::all()->sortBy("subCategoryName");
         $cat = category::all();
          return view('manage_sub_category')->with("sub_category",$sub)->with("category",$cat);
}

public function updateSubCategory(Request $request){
     $data = $request->input();
     $subcat = sub_category::find($data['id']);
     $subcat->subCategoryName = $data['name'];
     $subcat->description = $data['description'];
     $subcat->category = $data['categoryName'];
  
     $subcat->save();


         $sub = sub_category::all()->sortBy("subCategoryName");
         $cat = category::all();
          return view('manage_sub_category')->with("sub_category",$sub)->with("category",$cat);


}
public function updateCity(Request $request){

       $data = $request->input();  
    

     $cit = city::find($data['id']);
       
         
        
        $cit->cityName = $data['name'];
        $cit->RegionName = $data['regionName'];       
        $cit->save();
       
       
       $city = city::all()->sortBy("RegionName");
        $regions = region::all();
         return view('manage_cities')->with("city",$city)->with("region",$regions);
}


 public function addRegions(Request $request){

       $data = $request->input(); 
        region::create([
            'regionName' => $data['name'],
        ]); 
        $regions = region::all();
         return view('manage_regions')->with("region",$regions); 
}

 public function manageRegions(Request $request){

        $regions = region::all();
         return view('manage_regions')->with("region",$regions);
 
}
 public function manageCategories(Request $request){

                 
         $category = category::all()->sortBy("categoryName");
         return view('manage_categories')->with("category",$category);

         
 
}

 public function updateCategory(Request $request){

         $data = $request->input();
         // dd($request->file('fileIcon'));
          $cat = category::find($data['id']);
          $cat->categoryName = $data['name'];
          $cat->description = $data['description'];

            if($request->file('fileIcon') != null){
           
        $image = $request->file('fileIcon');
        $new_name = rand().'.'.$image->getClientOriginalExtension();
        $image->move(public_path("images"),$new_name);
        $cat->image = $new_name;

        }
          $cat->save();
            
         
         $category = category::all()->sortBy("categoryName");
         return view('manage_categories')->with("category",$category);

         //return view('manage_categories');
          
 
}



public function manageCities(Request $request){

        $city = city::all()->sortBy("RegionName");
        $regions = region::all();
         return view('manage_cities')->with("city",$city)->with("region",$regions);
 
}

 public function addCity(Request $request){

       $data = $request->input(); 
        city::create([
            'cityName' => $data['name'],
            'RegionName' => $data['regionName'],
        ]); 
       $city = city::all()->sortBy("RegionName");
        $regions = region::all();
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
        category::create([
            'categoryName' => $data['name'],
            'description' => $data['description'],
            'image' => $new_name
        ]); 
          $category = category::all()->sortBy("categoryName");
         return view('manage_categories')->with("flash_success_message","new category added succesfully")->with("category",$category);
        
        
}






 public function blockUsers(Request $request){

       $data = $request->input();  

       $user = User::find($data['id']);
        //dd($request->input());
        if($user->isBlocked==1)
        {

           $user->isBlocked = 0;
        }
      
        else {
          $user->isBlocked = 1;
        }
       
       $user->save();
       
       
            $userInfos = UserInfo::all();
         return view('admin_manage_users')->with("userInfo",$userInfos);
       
}





  public function logout(){
      Session::flush(); 
      return redirect ('/admin')->with('flash_message_success','Signed out succesfully');

}
}
            