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
    

public function sendMessage (Request $request)
{
      $data = $request->input();
      $message = $data["message"];
       $recever = $data["recever"];
        event(new newMessage($message,$recever));


}

    public function deleteConversation(Request $request)
    {
        //
          
        conversations::destroy($request->get('convId'));
         $conversation = conversations::where("userId",Auth::user()->id)->orderBy('created_at','desc')->get();
            $chat  = chat::where("from",Auth::user()->id)->orWhere("to",Auth::user()->id)->orderBy('created_at','asc')->get();

         return view('clients.mychat')->with("conversation",$conversation)->with("chat",$chat);
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
