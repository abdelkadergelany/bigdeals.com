<?php
use App\User;
use App\Phone;
use App\UserInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\conversations;
use App\chat;
//use Illuminate\Database\Eloquent\Model;

if(!function_exists('returnEmail')){
     
function returnEmail($id)
{
     $emailInfos = User::find($id);
     return "$emailInfos->email";
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