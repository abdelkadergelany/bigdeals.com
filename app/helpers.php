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
   $value = str_limit($val, 40);
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



// //
// DB::table('chat')
//             ->where('from', '=', '$user')
//             ->orWhere(function($query)
//             {
//                 $query->where('votes', '>', 100)
//                       ->where('title', '<>', 'Admin');
//             })
//             ->get();
//     //


    $chat  = chat::where("from",$with)->orWhere("to",$with)->orderBy('created_at','DESC')->first();
    if($chat != null)
     return "$chat->message";

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