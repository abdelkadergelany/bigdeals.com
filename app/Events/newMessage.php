<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class newMessage  implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $message;
    public $recever;
    public $sender;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($message,$recever,$sender)
    {
        //
        $this->message = $message;
       // dd($message);
        $this->recever =$recever;
        $this->sender =$sender;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        
        return new Channel('chat');
    }

     public function broadcastAs()
    {
        return "my-event";
    }
}
