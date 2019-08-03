<?php
use App\User;
use App\Phone;
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

function returnIsBlocked($id)
{
     $emailInfos = User::find($id);
     return "$emailInfos->isBlocked";
    
}


function getRegions()
{
      
     return region::All();
     
}



}

if(!function_exists('returnPhone')){
	
function returnPhone($id)
{
     $phon = Phone::where('userId',$id)->first();
    
 
    // return "$phon->phoneNUmber";
     return "$phon->phone";
}

}