<?php

namespace App\Http\Livewire;

use Livewire\Component;
use WireUi\Traits\Actions;

class Comments extends Component
{
    use Actions;
    public $comments;
    public function mount($comments)
    {
        $this->comments = $comments;
    }
    public function random()
    {
        $this->comments = CandidateComment::all()->random(10);
        $this->notify('Success', 'Ten random comments', 'success');
        return;
    }
    public function notify($title, $desc, $icon)
    {
        return $this->notification([
            'title' => $title,
            'description' => $desc,
            'icon'        => $icon,
            'timeout'     => 2000
        ]);    
    }
    public function render()
    {
        return view('livewire.comments');
    }
}
