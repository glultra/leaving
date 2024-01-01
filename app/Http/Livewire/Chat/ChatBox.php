<?php

namespace App\Http\Livewire\Chat;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use Livewire\Component;

class ChatBox extends Component
{
    public $receiverInstance;
    public $selectedConversation;
    public $message_count;
    public $messages;
    public $height;
    public $paginateVar = 10;

    public function getListeners(){
        $auth_id = auth()->user()->id;
        return [
            'loadConversation',
            'pushMessage',
            'loadmore',
            'updateHeight',
            "echo-private:chat.{$auth_id},MessageSent"=>'broadcastedMessageReceived',
        ];
    }

    public function broadcastedMessageReceived($event){
        // dd($event);
        $this->emitTo('chat.chat-list', 'refresh');


        $broadcastedMessage = Message::find($event['message']);
        if($this->selectedConversation){
            if((int) $this->selectedConversation->id === (int) $event['conversation_id']){
                $broadcastedMessage->read = 1;
                $broadcastedMessage->save();

                $this->pushMessage($broadcastedMessage->id);
            }
        }
    }

    public function pushMessage($newMessage){
        $newMessage = Message::find($newMessage);
        $this->messages->push($newMessage);
        $this->dispatchBrowserEvent('rowChatToBottom');
    }

    public function loadmore(){
        // dd('top reached');
        $this->paginateVar = $this->paginateVar + 10;
        $this->message_count = Message::where('conversation_id', $this->selectedConversation->id)->count();
        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
            ->skip($this->message_count - $this->paginateVar)
            ->take($this->paginateVar)
            ->get();

        $height = $this->height;
        $this->dispatchBrowserEvent('updatedHeight', ($height));
    }

    public function updateHeight($height){
        $this->height = $height;
    }

    public function loadConversation(Conversation $conversation, User $receiver)
    {
        // dd($receiverInstance);
        $this->selectedConversation = $conversation;
        $this->receiverInstance = $receiver;
        $this->message_count = Message::where('conversation_id', $this->selectedConversation->id)->count();
        $this->messages = Message::where('conversation_id', $this->selectedConversation->id)
            ->skip($this->message_count - $this->paginateVar)
            ->take($this->paginateVar)
            ->get();
        
        $this->dispatchBrowserEvent('chatSelected');
    }

    public function render()
    {
        return view('livewire.chat.chat-box');
    }
}
