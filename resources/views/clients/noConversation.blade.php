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
        


          </div>
    
        </div>
      </div>

    </div>
  </div>
   




    <!-- ENDING  chat-->

 
@stop