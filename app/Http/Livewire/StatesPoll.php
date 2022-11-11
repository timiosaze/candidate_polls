<?php

namespace App\Http\Livewire;

use App\Http\Resources\StateResource;
use App\Models\State;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use WireUi\Traits\Actions;

class StatesPoll extends Component
{
    use Actions;
    public $states;
    public $ids;
    public $names;
    public $values;
    public $reasons = [];
    public $cardModal = false;
    public $selectedState;
    public function mount()
    {
       $this->states = json_decode(json_encode(StateResource::collection(State::all()), true), true);
       foreach ($this->states as $state){
            $state = (array) $state;
            array_push($this->reasons, '');
       }
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

    public function submit()
    {
        foreach( $this->states as $index => $state) {
            $values[$index] = [
                'state_id' => $state['id'],
                'user_prediction' => $state['value'],
            ];
        }
        

        foreach ($values as $value){
            Auth::user()->predictions()->create($value);
        }
        
        $this->notify('Success', 'States poll successfully saved', 'success');
        return;
    }

    public function render()
    {
        return view('livewire.states-poll');
    }
}
