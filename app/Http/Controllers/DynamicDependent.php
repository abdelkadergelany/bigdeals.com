<?php

namespace App\Http\Controllers;
use App\city;
use App\sub_category;
use App\modele;
use Illuminate\Http\Request;

class DynamicDependent extends Controller
{

    public function fetch(Request $request)
    { 

    	
             

      $select = $request->get('select');

        
      if ($select == "RegionName") {

      	 $value = $request->get('value');
      $dependent = $request->get('dependent');

      $data = city::where($select,$value)->get();
  

       
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     //echo $output;
     return response()->json($output);
      }


     if ($select == "brandName") {

      	 $value = $request->get('value');
      $dependent = $request->get('dependent');
      
      $data = modele::where($select,$value)->get();
      //$data = modele::all();
  
      // die ( $data);
       
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     //echo $output;
     return response()->json($output);
      }

     

     if ($select == "category") {
     	$value = $request->get('value');
      $dependent = $request->get('dependent');

      $data = sub_category::where($select,$value)->get();
  

       
     $output = '<option value="">Select '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$dependent.'">'.$row->$dependent.'</option>';
     }
     //echo $output;
     return response()->json($output);
     }


    }

}
