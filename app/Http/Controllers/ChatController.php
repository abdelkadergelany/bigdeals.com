<?php

namespace App\Http\Controllers;
use App\User;
use App\conversations;
use App\chat;
use Illuminate\Http\Request;
use App\Events\newMessage;



use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use  Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ChatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
            $conversation = conversations::where("userId",Auth::user()->id)->orderBy('created_at','desc')->get();
            $chat  = chat::where("from",Auth::user()->id)->orWhere("to",Auth::user()->id)->orderBy('created_at','asc')->get();
            //dd( $conversation);

         return view('clients.mychat')->with("conversation",$conversation)->with("chat",$chat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
   


public function startConversation (Request $request)
{


       
       $data = $request->input();
       $message = $data["message"];
       $recever = $data["recever"];
      
       $checkIfConversationExist = conversations::where("userId",Auth::user()->id)->where("userId",$recever);
       $checkIfConversationExistWith = conversations::where("userId",$recever)->where("with",Auth::user()->id);
           if($checkIfConversationExist == null)
           {
                conversations::create([
                   'userId' => Auth::user()->id,
                    'with' => $recever,
                    "created_at"=>now()
                       ]); 
   
           }

            if($checkIfConversationExistWith == null)
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

                 return redirect ('/mychat');
          
       
}


public function sendMessage (Request $request)
{
      $data = $request->input();
      $message = $data["message"];
       $recever = $data["recever"];
       $sender = Auth::user()->id;

     // var $checkIfConversationExist = conversations::where("with",Auth::user()->id)->where("userId",$recever);

        chat::create([
                   'message' => $message,
                    "created_at"=>now(),
                    'from' => Auth::user()->id,
                     'to' => $recever
                       ]); 

        event(new newMessage($message,$recever,$sender));


}

    public function deleteConversation(Request $request)
    {
        //
          
        conversations::destroy($request->get('convId'));
         $conversation = conversations::where("userId",Auth::user()->id)->orderBy('created_at','desc')->get();
            $chat  = chat::where("from",Auth::user()->id)->orWhere("to",Auth::user()->id)->orderBy('created_at','asc')->get();

         return view('clients.mychat')->with("conversation",$conversation)->with("chat",$chat);
    }



public function loadMessage(Request $request)
    {
        //
          
      
         $conversation = conversations::find($request->convId);
         $with = $conversation->with;
            $chat  = chat::where("from",Auth::user()->id)
                       ->where("to",$with)
                        ->orWhere("to",Auth::user()->id)
                        ->where("from",$with)
                        ->orderBy('created_at','asc')
                        ->get();
         //   dd($chat);

                 $output = "<span id='conv' data-with=".$with." class='d-block p-2 bg-primary text-white'>". returnNAme($with)."</span>";

                          //   dd($output);
                      foreach ($chat as $key => $value) {
                          # code...
 
              if($value->from != Auth::user()->id ){

               $output .= "<div class='incoming_msg'>";
              $output .= "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'>";
             $output .= "</div>";
             $output .= "<div class='received_msg'>";
                $output .= "<div class='received_withd_msg'>";
                 $output .= "<p class='sms'>".$value->message."</p>";
                 $output .= "<span class='time_date'>" . $value->created_at->format('h : i : s | d M Y ')."</span>";
                $output .= "</div> </div> </div>";
                }
              else{
               $output .= "<div class='outgoing_msg'>";
              $output .= "<div class='sent_msg'>";
               $output .=  "<p>" .$value->message."</p>";
                $output .= "<span class='time_date'>". $value->created_at->format('h : i : s | d M Y ')."</span>";
              $output .= "</div> </div>";
              }
             
                      }

                    $output .= "<input type='hidden'  id='openedConversation' value=".Auth::user()->id.">";
                    $output .=  "<input type='hidden'  id='openedConversation2' value=".$with.">";
                  //  dd($output);
                    return $output;

         //return view('clients.mychat')->with("conversation",$conversation)->with("chat",$chat);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(chat $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(chat $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, chat $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(chat $chat)
    {
        //
    }
}
