<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class SendMessage extends Component
{
    public $selectedConversation;
    public $receiverInstance;
    public $body;
    public $createdMessage;
    
    public function getListeners(){
        return [
            'updateSendMessage',
            'refresh' => '$refresh',
            'dispatchMessageSent',
        ];
    }

    public function sendMessage(){
        if($this->body == null){
            return null;
        }

        $createdMessage = Message::create([
            'conversation_id' => $this->selectedConversation->id,
            'sender_id' => auth()->user()->id,
            'receiver_id' => $this->receiverInstance->id,
            'body' => $this->body,
        ]);

        
        
        $this->createdMessage = $createdMessage;
        
        $this->selectedConversation->last_time_message = $createdMessage->created_at;
        $this->selectedConversation->save();
        
        // $this->emitSelf('dispatchMessageSent');
        // $this->dispatchMessageSent();


        $this->emitTo('chat.chat-box','pushMessage', $createdMessage->id);
        $this->emitTo('chat.chat-list','updateChatLists');

        $this->reset('body');

        $this->emitSelf('dispatchMessageSent');
    }

    public function updateSendMessage(Conversation $conversation, User $receiver){
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
    }

    public function dispatchMessageSent(){
        broadcast(new MessageSent(Auth()->user(),  $this->createdMessage, $this->selectedConversation,  $this->receiverInstance));
    }

    public function render()
    {
        return view('livewire.chat.send-message');
    }
}
