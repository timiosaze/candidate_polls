<?php

namespace App\Http\Livewire;

use Livewire\Component;

class UserPollModal extends Component
{
    public $userModal = false;
    public $user;

    public function view($user)
    {
        $this->user = $user;
        $this->userModal = true;
    }

    public function render()
    {
        return view('livewire.user-poll-modal');
    }
}
