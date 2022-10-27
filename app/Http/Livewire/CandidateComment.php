<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use WireUi\Traits\Actions;

class CandidateComment extends Component
{
    use Actions;
    public $comment;
    public $achievement;

    public function submit()
    {
        $validator = Validator::make([
            'comment' => $this->comment,
            'achievement' => $this->achievement,
        ], 
        [
            'comment' => 'required',
            'achievement' => 'required',
        ]);
 
        if ($validator->fails()) {
            $this->notify('Error', $validator->errors()->first(), 'error');
            return;
        }
        Auth::user()->candidatecomment()->updateOrCreate([
            'comment' => $this->comment,
            'achievement' => $this->achievement,
        ]);

        $this->notify('Success','Your comment saved successfully', 'success');
        sleep(2);
        return redirect()->to('/pollc');
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
        return view('livewire.candidate-comment');
    }
}
