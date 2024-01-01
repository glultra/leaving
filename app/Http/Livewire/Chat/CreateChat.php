<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use PDO;

class CreateChat extends Component
{
    public $users;
    public $message = "Hello how are you ";

    public function checkconversation($receiverId)
    {
        $checkedConversation = Conversation::where('receiver_id', auth()->user()->id)
            ->where('sender_id', $receiverId)
            ->orWhere('receiver_id', $receiverId)
            ->where('sender_id', auth()->user()->id)->get();

        if(count($checkedConversation) == 0){
            // dd('no conversation');

            // Create Conversation
            $createdConversation = Conversation::create([
                'sender_id' => auth()->user()->id,
                'receiver_id' => $receiverId, 
                'last_time_message' => now()
            ]);

            // Create Message
            $createdMessage = Message::create([
                'conversation_id' => $createdConversation->id, 
                'sender_id' => auth()->user()->id,
                'receiver_id' => $receiverId,
                'body' => $this->message,
            ]);

            // Update Conversation
            $createdConversation->last_time_message = $createdMessage->created_at;
            $createdConversation->save();

            dd($createdMessage);


        }else if(count($checkedConversation) >= 1){
            dd('conversation exist');
        }
    }

    public function mount()
    {
        $this->users = User::where('id', '!=', auth()->user()->id)->get();
    }

    public function render()
    {
        return view('livewire.chat.create-chat');
    }
}
