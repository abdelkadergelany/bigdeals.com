 @extends('layouts/main_layout')


@section('style')
<link rel="stylesheet" href="{{asset('css/style.css')}}">
<link rel="stylesheet" href="{{asset('css/chat.css')}}">
 <script src="https://js.pusher.com/5.0/pusher.min.js"></script>
 <style type="text/css">
   .sms{color:white !important;
    background-color: black!important;; 
  }
 </style>
@stop
@section('contains')
  <!-- BEGINING  my chat-->


    <input type="hidden" name="receve" id="receverId" value="{{Auth::user()->id}}">
    <div class="container">
    <h3 class=" text-center lead">Messaging</h3>
    <div class="messaging">
      <div class="inbox_msg">

        <div class="inbox_people">
          <div class="headind_srch">
            <div class="recent_heading">
              <h4>Recent</h4>
            </div>
            <div class="search_bar_position">
              <div class="stylish-input-group">
                <input type="text" class="search-bar" placeholder="Search">
                <span class="input-group-addon">
                  <button type="button"> <i class="fa fa-search" aria-hidden="true"></i> </button>
                </span> </div>
            </div>
          </div>

          <div class="inbox_chat">

            @forelse ($conversation as $conv)
            <button onclick="loadChat(this)" value="{{$conv->id}}" >
              <!-- <input id="conId" type="hidden" value="$conv->id" name=""> -->
               <div class="chat_list">
                <div class="chat_people">
                  <div class="chat_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil"> </div>
                  <div class="chat_ib">
                  <h5>{{returnNAme($conv->with)}} <span class="chat_date">{{$conv->created_at->format('d M Y h:i')}}</span></h5>
                  <p>{{returnLastMessage($conv->with)}}</p><br>
                   <form method="post" action="{{ route('deleteConversation') }}?convId={{$conv->id}}">{{csrf_field()}}
                     <input type="submit" class="btn-danger p-0" style="float:right; width: 50px;;height: 25px" value="delete">
                   </form>
                  
                </div>
              </div>
            </div>
          </button>
            @empty
              <p>&nbsp;&nbsp;&nbsp;&nbsp;No Conversation Yet</p>
            @endforelse


          </div>

        </div>

        <div class="mesgs">
          <div id="msg_history" class="msg_history">

        @if(!$conversation->isEmpty() )
            <span id="conv" data-with="{{$conversation->first()->with}}" class="d-block p-2 bg-primary text-white"> From {{returnNAme($conversation->first()->with)}}</span><br><br>
             
             @foreach ($chat as $chat)
           
           
           @if($conversation->first()->with == $chat->from || $conversation->first()->with == $chat->to )
              
               @if($conversation->first()->with == $chat->from)
            <div class="incoming_msg">
              <div class="incoming_msg_img"> <img src="https://ptetutorials.com/images/user-profile.png" alt="sunil">
              </div>
              <div class="received_msg">
                <div class="received_withd_msg">
                  <p class="sms">{{$chat->message}}</p>
                  <span class="time_date"> {{ $chat->created_at->format('h : i : s | d M Y ')}}</span>
                </div>
              </div>
            </div>

               @else
            <div class="outgoing_msg">
              <div class="sent_msg">
                <p>{{$chat->message}}</p>
                <span class="time_date"> {{ $chat->created_at->format('h : i : s | d M Y ')}}</span>
              </div>
            </div>
               @endif
            

            @endif
            @endforeach

         @endif
             <input type="hidden"  id="openedConversation" value="{{$chat->to}}">
             <input type="hidden"  id="openedConversation2" value="{{$chat->from}}">

          </div>
          <div class="type_msg">
            <form id="message-submit" method="post" action="{{ route('sendMessage') }}?">
            <div class="input_msg_write">
              <input type="hidden" name="_token" id="token-message" value="{{csrf_token()}}"> 
              <input id="message" type="text" class="write_msg" placeholder="Type a message" name="message" />
              <button type="submit"   class="msg_send_btn"  value="Send"><i style='font-size:20px' class='fas'>&#xf1d8;</i></button>
            </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
   




    <!-- ENDING  chat-->

 <script>


  $( document ).ready(function() {


    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('16cd61370fc9eee60b71', {
      cluster: 'ap2',
      forceTLS: true
    });

    var channel = pusher.subscribe('chat');
    channel.bind('my-event', function(data) {
   
      var id = $('#receverId').val();
            //console.log(data.recever);
      if(parseInt(id)  === parseInt(data.recever) )
      {
         var from  = $('#openedConversation2').val();
         var to  = $('#openedConversation').val();
         var  wit = null;
         
            if(from == data.recever)
            {

               wit =to;
            }
            else 
              {wit = from};

            if(wit == data.sender )
         {

           var d = new Date();
               var dat ="";
               dat = d.getHours() +":"+ d.getMinutes() ;
            
             var recevedMessage = document.createElement("div");
            recevedMessage.setAttribute("class","incoming_msg");
            recevedMessage.innerHTML ="<div class='received_withd_msg'><p class='sms'>" + data.message +"</p> <span class='time_date'>" +
             dat +" </span></div>";
              document.getElementById("msg_history").appendChild(recevedMessage);
        } 

      }
     
    
    });



 $('#message-submit').on('submit',function(e){
    $('#message').focus();
 e.preventDefault();
 var message=$('#message').val();
 var token=$('#token-message').val();
     $.ajax({
             type:'post',
             url:'{{URL::to('/sendMessage')}}',
             data:{
                 message:message,
                 recever:document.getElementById("conv").getAttribute("data-with"),
                 _token:token,
                 
             }
         
             });
              var d = new Date();
               var dat ="";
               dat = d.getHours() +":"+ d.getMinutes();
             document.getElementById('message-submit').reset();

             var sentMessage = document.createElement("div");
            sentMessage.setAttribute("class","outgoing_msg");
            sentMessage.innerHTML ="<div class='sent_msg'><p>" + message +"</p> <span class='time_date'>" + dat +" </span> </div>";
              document.getElementById("msg_history").appendChild(sentMessage);
            
               
              
           
 });






 });
   
  </script>
  <script >
    
    function loadChat(t){
 //$('#fetchConcversation').on('click',function(e){
    //$('#message').focus();
 //e.preventDefault();
 var conv=t.value;
  
   var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
     document.getElementById("msg_history").innerHTML = this.responseText;

     //console.log(this.responseText);
    }
  };
  xhttp.open("GET", "/loadMessage?convId="+conv, true);
  xhttp.send();
               
              
           
 
}
  </script>
@stop