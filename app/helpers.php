<?php
use App\User;
use App\Phone;
use App\UserInfo;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
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