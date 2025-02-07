<?php

namespace App\Http\Livewire\Chat;

use App\Models\Conversation;
use App\Models\Message;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Livewire\Component;

class CreateChat extends Component
{
    public $users;

    public function mount()
    {
        $this->users = User::all(); // Par exemple, obtenir tous les utilisateurs
    }

    public function render()
    {
        return view('livewire.chat.create-chat');
    }
}
