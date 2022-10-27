<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersPoll extends Component
{
    use WithPagination;
    public $states;
    public $search = '';
    public $sortField;
    public $sortAsc = true;
    public $candidate_id = 0;

    public function mount($states)
    {
        $this->states = $states;
    }

    public function checkbox($id)
    {
        $this->candidate_id = $id;
        // dd($this->candidate_id);
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if($this->sortField === $field){
            $this->sortAsc = !$this->sortAsc; 
        }else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
        // dd($this->sortField);
    }

    public function render()
    {
        return view('livewire.users-poll', ['users' => 
                User::where('name', 'like', '%'.$this->search.'%')
                ->when($this->candidate_id != 0, function ($q) {
                    $q->where('candidate_id', $this->candidate_id);
                })
                // ->join('predictions')
                // ->orderBy('email', 'asc')
                ->paginate(25)
        ]);
    }
}
