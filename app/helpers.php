<?php
use App\User;
use App\Phone;
use App\UserInfo;
use App\city;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\conversations;
use App\chat;
use App\ads;
//use Illuminate\Database\Eloquent\Model;

if(!function_exists('returnEmail')){

  function returnEmail($id)
  {
   $emailInfos = User::find($id);
   return "$emailInfos->email";
 }

}

if(!function_exists('showRating')){

  function showRating($rate)
  {   
   $output= "";
   if($rate ==1){

     $output = "<span style='color: orange;' class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span>";

   }
   if($rate ==2){

     $output = "<span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span>";

   }
   if($rate ==3){

     $output = "<span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span>";

   }

   if($rate ==4){

     $output = "<span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span class='fa fa-star checked'></span>";

   }

   if($rate ==5){

     $output = "<span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span>";

   }

   if($rate > 1 && $rate < 2){

     $output = "<span style='color: orange;' class='fa fa-star checked'></span><i class='fas fa-star-half-alt' style='color: orange'></i><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span>";

   }

   if($rate > 2 && $rate<3){

     $output = "<span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><i class='fas fa-star-half-alt' style='color: orange'></i><span class='fa fa-star checked'></span><span class='fa fa-star checked'></span>";

   }
   if($rate >3 && $rate <4){

     $output = "<span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><i class='fas fa-star-half-alt' style='color: orange'></i><span class='fa fa-star checked'></span>";

   }

   if($rate >4 && $rate <5){

     $output = "<div><span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><span style='color: orange;' class='fa fa-star checked'></span><i class='fas fa-star-half-alt' style='color: orange'></i></div>";

   }


   if($rate==0){
    $output =" "."<b>Saler Not Rated Yet</b>";

  }
  else {
   $output = $output." &nbsp;&nbsp;&nbsp;&nbsp;<b> ".number_format($rate,2)."/5</b>";

 }


 return $output;



}

}



if(!function_exists('getAds')){

  function getAds($id)
  {
   $ads = ads::where("id","=",$id)->get();
   //dd($ads);
   return $ads;
 }

}





if(!function_exists('getOutput')){

  function getOutput($add)
  { 

    $output = '';

    foreach($add as $ads)
    {

      $title=reduceString($ads->title);

      $date = $ads->created_at->diffForHumans();
      if($ads->isUsed=="1")
      {

        $condition ="Used";

      }
      else{
        $condition ="New";

      }


      if($ads->buyNow!="3"){


        $output .="<a href=/product-details?id=".$ads->id." ". "class='border_all_categories'>
        <div class='row'>
        <div class='col-sm-4'>
        <img src='publication/".$ads->pict1."' class='img-thumbnail' alt='images' width='100'
        height='100'>
        </div>
        <div class='col-sm-8'>
        <h5><b>".$title."(".$condition.")".
        "</b></h5>
        <span>".$ads->subCategoryName."</span><br>
        <span style='color: #7B1FA2;'>".$ads->cityName."&nbsp;&nbsp;</span><span>".$ads->address."</span><br>
        <span class='price_all_categories'>TK ".$ads->price."</span>

        </div>
        </div>
        <span class='time_all_categories'>".$date."</span><br>
        </a><hr>";
      }

      if($ads->buyNow=="3"){

        $output.= "<div class='offer offer-info' ><div class='shape'><div class='shape-text'>VIP</div></div>".
        "<a href=/product-details?id=".$ads->id." "." class='border_all_categories'><div class='offer-content'>".
        "<div class='row'><div class='col-sm-4'>"."<img src='publication/".$ads->pict1."' class='img-thumbnail' alt='images' width='100'
        height='100'> </div><div class='col-sm-8'>
        <h5><b>".$title."(".$condition.")"."</b></h5>
        <span>".$ads->subCategoryName."</span><br>
        <span style='color: #7B1FA2;'>".$ads->cityName."&nbsp;&nbsp;</span><span>".$ads->address."</span><br>
        <span class='price_all_categories'>TK ".$ads->price."</span></div></div>
        <span class='time_all_categories'>".$date."</span><br></div></a></div><hr>";
        
        
        
        
        



      }



    }

               // $vide="0";
    

    return  $output;
  }

}



if(!function_exists('getSubCat')){

  function getSubCat($val,$action)
  {
   $query = strtolower($val);



   if($action == "subCat")

   {

    $subcat= DB::table('sub_categories')
    ->where('category', 'like', '%'.$query.'%')
    ->get();


  }


  if($action == "city")

  {


    $subcat = city::where('RegionName','=',$query)->orderBy("cityName","ASC")->get();


  }

  return $subcat;

  
}

}




if(!function_exists('reduceString')){

  function reduceString($val)
  {
   $value = str_limit($val, 70);
   return  $value;
 }

}


if(!function_exists('getCamel')){

  function getCamel($val)
  {
   $value = ucwords($val);
   return  $value;
 }

}





if(!function_exists('returnNAme')){

  function returnNAme($id)
  {
   $emailInfos = User::find($id);
   return "$emailInfos->name";

 }
}


if(!function_exists('returnLastMessage')){

  function returnLastMessage($with)

  {


    $chat  = chat::where("from",$with)->orWhere("to",$with)->orderBy('created_at','DESC')->first();
    if($chat != null){
    
    $mess = str_limit($chat->message, 40);
         $mess=$mess."...";
          return $mess;
   }
 }
}

function returnIsBlocked($id)
{
 $emailInfos = User::find($id);
 return "$emailInfos->isBlocked";

}



function returnPhone($id)
{
     //$phon = Phone::find([$id]);
 $phon = Phone::All();

     //dd($phon);
     //return "$phon->id";
     //return "$phon->phone";
 foreach($phon as $key ) {
   if ($key->userId==$id)
     return $key->phone;
 }
}




function returnCity($id)
{
     // $city = UserInfo::find($id);
     // return $city["city"];
 $city = UserInfo::All();
 foreach($city as $key ) {
   if ($key->userId==$id)
     return $key->city;
 }

}

if(!function_exists('returnAddress')){

  function returnAddress($id)
  {
   $Add = UserInfo::All();

   foreach($Add as $key ) {
     if ($key->userId==$id)
       return $key->address;
   }
 }
}


if(!function_exists('returnCategoryName')){

  function returnCategoryName($id)
  {
   $cat = category::find($id);

   return "$cat->categoryName";
 }
}

if(!function_exists('returnDescription')){

  function returnDescription($id)
  {
   $cat = category::find($id);

   return "$cat->dsecription";
 }
}

if(!function_exists('returnImage')){

  function returnImage($id)
  {
   $cat = category::find($id);

   return "$cat->image";
 }
}

if(!function_exists('getConversationId')){

  function getConversationId($_userId,$_with)
  {
   $conversation = conversations::where("userId",$_userId)->where("with",$_with)->first();

   return $conversation->id;
 }
}

if(!function_exists('getLatestConversationId')){

  function getLatestConversationId($_userId)
  {
   $conversation = conversations::where("userId",$_userId)->orderBy('updated_at','desc')->first();
    
   return $conversation;
 }
}



if(!function_exists('getAllConversation')){

  function getAllConversation($_userId)
  {
   $conversation = conversations::where("userId",Auth::user()->id)->orderBy('updated_at','desc')->get();

   return $conversation;
 }
}




if(!function_exists('createConversation')){

  function createConversation($_userId,$_with)
  {
   $isConversationExistOnUserId = checkConversation($_userId,$_with);

   if($isConversationExistOnUserId==0)
   {

    conversations::create([
     'userId' => $_userId,
     'with' => $_with,
     "created_at"=>now(),
     "updated_at"=>now()
   ]); 


  }
  if($isConversationExistOnUserId == 1)
  {
   $updatconv = conversations::where("userId",$_userId)->where("with",$_with)->first();

   $updatconv->updated_at = now();
   $updatconv->save();

 }
      $convId = getConversationId($_userId,$_with);
      return $convId;


}
}


if(!function_exists('checkConversation')){

  function checkConversation($_userId,$_with)
  {
   $isExist = conversations::where("userId",$_userId)->where("with",$_with)->get();
   if($isExist->count()==0)
   {
     return  0;

   }
   return 1;
 }
}



if(!function_exists('createMessage')){

  function createMessage($_convId,$_owner,$_message,$_from,$_to)
  {
 
  chat::create([
                   'message' => $_message,
                   'owner' => $_owner,
                   'convId' => $_convId,
                    "created_at"=>now(),
                    "updated_at"=>now(),
                    'from' => $_from,
                     'to' => $_to,
                     'state' => '0'
                       ]); 
return 1;
 }
   
}


if(!function_exists('loadMessage')){

  function loadMessage($_convId)
  {
 
     $chat  = chat::where("convId",$_convId)->orderBy('created_at','asc')->get();
   return  $chat ;
 }
  
}

