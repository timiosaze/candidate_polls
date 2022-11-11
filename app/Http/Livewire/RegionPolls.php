<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RegionPolls extends Component
{
    public $predictions;


    public function mount($predictions)
    {
        $this->predictions = $predictions;
    }

    public function render()
    {
        return view('livewire.region-polls');
    }
}
