<?php

namespace App\Http\Livewire;

use App\Models\Candidate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use WireUi\Traits\Actions;

class ChooseCandidate extends Component
{
    use Actions;
    public $candidate_id = null;
    // public $person;
    public $candidates;
    protected $rules = [
        'candidate_id' => 'required',
    ];

    public function mount()
    {
        // $this->person = Candidate::find(1);
        $this->candidates = Candidate::all();
    }

    public function set($id)
    {
        $this->candidate_id = $id;

        $this->check($id);
    }

    public function check($id)
    {
        return $this->candidate_id == $id;
    }

    public function submit()
    {
        $validator = Validator::make(
            [
                'candidate_id'  => $this->candidate_id,
            ],
            [
                'candidate_id' => 'required',
            ]
        );

        if ($validator->fails()) {
            $this->notify('Error', $validator->errors()->first(), 'error');
            return;
        }
        Auth::user()->candidate_id = $this->candidate_id;
        Auth::user()->save();
        $this->notify('Success', 'Choosed: ' . Auth::user()->candidate->name, 'success');
        sleep(2);
        return redirect()->to('/pollb');
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
        return view('livewire.choose-candidate');
    }
}
