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
use Illuminate\Support\Facades\DB;

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
      DB::table('chats')->where("state","0")->where("to",Auth::user()->id)->update(['state' => "1"]);
      session(['newemailUser' => 'false']);



      $conversation = getAllConversation(Auth::user()->id);
      $lastConvId = getLatestConversationId(Auth::user()->id);

      if( $lastConvId==null)
      {
        return view('clients.noConversation')->with("conversation",$conversation);

      }

      $chat  = chat::where("convId",$lastConvId->id)->orderBy('created_at','asc')->get();


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

     $ownerConvSender = createConversation(Auth::user()->id,$recever);
     $ownerConvRecever = createConversation($recever,Auth::user()->id);



     $testSender = createMessage($ownerConvSender,Auth::user()->id,$message,Auth::user()->id,$recever);
     $testRcever = createMessage($ownerConvRecever,$recever,$message,Auth::user()->id,$recever);


     return redirect ('/mychat');          

   }


   public function sendMessage (Request $request)
   {
    $data = $request->input();
    $message = $data["message"];
    $recever = $data["recever"];
    $sender = Auth::user()->id;




    $ownerConvSender = createConversation(Auth::user()->id,$recever);
    $ownerConvRecever = createConversation($recever,Auth::user()->id);



    $testSender = createMessage($ownerConvSender,Auth::user()->id,$message,Auth::user()->id,$recever);
    $testRcever = createMessage($ownerConvRecever,$recever,$message,Auth::user()->id,$recever);



    event(new newMessage($message,$recever,$sender));


  }




  public function deleteConversation(Request $request)
  {

    conversations::destroy($request->get('convId'));

    return redirect("mychat");


  }



  public function loadMessage(Request $request)
  {
        //


   $conversation = conversations::find($request->convId);
   $with = $conversation->with;
   $chat  = loadMessage($request->convId);
         

   $output = "<span id='conv' data-with=".$with." class='d-block p-2 bg-primary text-white'>". returnNAme($with)."</span>";

                          
   foreach ($chat as $key => $value) {
                          # code...

    if($value->from != Auth::user()->id ){
     $output .= "<br/><br/>";
     $output .= "<div class='incoming_msg'>";
     $output .= "<div class='incoming_msg_img'> <img src='https://ptetutorials.com/images/user-profile.png' alt='sunil'>";
     $output .= "</div>";
     $output .= "<div class='received_msg'>";
     $output .= "<div class='received_withd_msg'>";
     $output .= "<p class='sms'>".$value->message."</p>";
     $output .= "<span class='time_date'>" . $value->created_at->format('h : i  / d M Y ')."</span>";
     $output .= "</div> </div> </div>";
   }
   else{
     $output .= "<div class='outgoing_msg'>";
     $output .= "<div class='sent_msg'>";
     $output .=  "<p>" .$value->message."</p>";
     $output .= "<span class='time_date'>". $value->created_at->format('h : i  / d M Y ')."</span>";
     $output .= "</div> </div>";
   }

 }

 $output .= "<input type='hidden'  id='openedConversation' value=".Auth::user()->id.">";
 $output .=  "<input type='hidden'  id='openedConversation2' value=".$with.">";

 return $output;


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
