<?php

namespace App\Http\Livewire;

use App\Mail\ContactMail;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use WireUi\Traits\Actions;

class ContactForm extends Component
{
    use Actions;
    public $firstname;
    public $lastname;
    public $phoneNumber = '';
    public $email;
    public $body;
    protected $rules = [
        'firstname' => 'required',
        'lastname' => 'required',
        'email' => 'required|email',
        'body' => 'required',
    ];
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $validatedData = $this->validate();

        

        Mail::mailer('postmark')->to(env('MAIL_FROM_ADDRESS'))
                ->send(new ContactMail($this->firstname, $this->lastname, $this->email, $this->body, $this->phoneNumber));

        $this->notify('Message Sent', 'Your message has been delivered', 'success');

        $this->clear();
    }

    public function clear()
    {
        $this->firstName = '';
        $this->lastName = '';
        $this->phoneNumber = '';
        $this->email = '';
        $this->body = '';
    }

    public function notify($title, $description, $icon)
    {
        return $this->notification([
            'title' => $title,
            'description' => $description,
            'icon'        => $icon,
            'timeout'     => 5000
        ]);
    }
    public function render()
    {
        return view('livewire.contact-form');
    }
}
