<?php

namespace App\Http\Livewire;
use Livewire\Component;

class SubscriptionForm extends Component
{

    public $email;

    public function submit()
    {
        
    }

    public function render()
    {
        return view('livewire.subscription-form');
    }
}
