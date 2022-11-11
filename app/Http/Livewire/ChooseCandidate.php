<?php

namespace App\Http\Livewire;

use App\Http\Resources\StateResource;
use App\Models\Candidate;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use WireUi\Traits\Actions;

class ChooseCandidate extends Component
{
    use Actions;
    public $candidate_id = null;
    public $currentStep = 1;
    public $candidates;
    protected $rules = [
        'candidate_id' => 'required',
    ];
    public $states;
    public $ids;
    public $names;
    public $values;
    public $reasons = [];
    public $cardModal = false;
    public $selectedState;
    public $comment;
    public $achievement;

    public function mount()
    {
       $this->states = json_decode(json_encode(StateResource::collection(State::all()), true), true);
       foreach ($this->states as $state){
            $state = (array) $state;
            array_push($this->reasons, '');
       }
       $this->candidates = Candidate::all();
    }

    public function showModal($state)
    {
        $this->selectedState = $state;
        $this->cardModal = true;
        // dd($this->selectedState);
    }

    public function save()
    {
        $this->cardModal = false;
        // dd($this->reasons);
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

    public function first()
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
            $this->notify('Error', $validator->errors()->first(), 'error', 'dontRefreshPage');
            return;
        }
        // Auth::user()->candidate_id = $this->candidate_id;
        // Auth::user()->save();
        $name = Candidate::find($this->candidate_id)->name;
        $this->notify('Success', 'Choosed: ' . $name , 'success', 'next_second');
        return;
    }
    

    public function second()
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
            $this->notify('Error', $validator->errors()->first(), 'error', 'dontRefreshPage');
            return;
        }
       

        $this->notify('Success','Your comment saved successfully', 'success', 'next_third');
        return;
    }

    public function submit()
    {
        // dd($this->reasons[1]);
        foreach( $this->states as $index => $state) {
            $values[$index] = [
                'state_id' => $state['id'],
                'user_prediction' => $state['value'],
                'reason' => $this->reasons[$index]
            ];
        }
        $user = Auth::user();
        $user->candidate_id = $this->candidate_id;
        $user->save();
        $user->candidatecomment()->delete();
        $user->candidatecomment()->create([
            'comment' => $this->comment,
            'achievement' => $this->achievement,
        ]);
        $user->predictions()->delete();
        foreach ($values as $value){
            $user->predictions()->create($value);
        }
        
        $this->notify('Success', 'States poll successfully saved', 'success', 'home');
        return;
    }
    public function next_second()
    {
        $this->currentStep = 2;
    }

    public function next_third()
    {
        $this->currentStep = 3;
    }
    public function home()
    {
        return redirect('/');
    }

    public function refreshPage()
    {
        $this->dispatchBrowserEvent('refresh-page');
    }

    public function dontRefreshPage()
    {
        // $this->dispatchBrowserEvent('refresh-page');
    }

    public function notify($title, $desc, $icon, $method)
    {
        return  $this->notification([
            'title'       => $title,
            'description' => $desc,
            'icon'        => $icon,
            'timeout'     => 2500,
            'onTimeout' => [
                'method' => $method,
                'params' => ['onTimeout'],
            ],
        ]);
    }
    
    public function render()
    {
        return view('livewire.choose-candidate');
    }
}
