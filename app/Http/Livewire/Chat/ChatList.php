<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ChatList extends Component
{
    public $auth_id;
    public $receiverInstance;
    public $conversations;
    public $name;
    public $selectedConversation;

    protected $listeners = [
        'chatUserSelected',
        'updateChatLists',
        'refresh' => '$refresh'
    ];

    public function updateChatLists(){
        $this->mount();
    }

    public function chatUserSelected(Conversation $conversation, $receiverId){
        $this->selectedConversation = $conversation;
        $this->receiverInstance = User::find($receiverId);
        $this->emitTo('chat.chat-box','loadConversation',$this->selectedConversation, $this->receiverInstance);
        $this->emitTo('chat.send-message','updateSendMessage',$this->selectedConversation, $this->receiverInstance);
    }

    public function getChatUserInstance(Conversation $conversation, $request){
        $this->auth_id = Auth::user()->id;

        if($conversation->sender_id == $this->auth_id){
            $this->receiverInstance = User::firstWhere('id', $conversation->receiver_id);
        }else{
            $this->receiverInstance = User::firstWhere('id', $conversation->sender_id);
        }

        if(isset($request)){
            return $this->receiverInstance->$request; 
        }
    }

    public function mount(){
        $this->auth_id = Auth::user()->id;
        $this->conversations = Conversation::where('sender_id', $this->auth_id)
            ->orWhere('receiver_id', $this->auth_id)
            ->orderBy('last_time_message', 'DESC')->get();
        
        $first_conv = $this->conversations->first();
        try {
            //code...
            $this->chatUserSelected($first_conv, $first_conv->receiver_id);
            $this->emitTo('chat.chat-box','loadConversation',$first_conv, $first_conv->receiver_id);

        } catch (\Throwable $th) {
            //throw $th;
            $this->emitTo('chat.chat-box','loadConversation',$first_conv, $first_conv?->receiver_id);
        }

        // loadConversation($first_conv, $first_conv->receiver_id);
        // dd($first_conv, $first_conv->receiver_id);
    }

    public function render()
    {
        return view('livewire.chat.chat-list');
    }
}
