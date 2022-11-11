<?php

namespace App\Http\Livewire;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class WinningStatesPoll extends Component
{
    use WithPagination;
    public $sortField= 'name';
    public $sortAsc = true;
    protected $queryString = ['sortField', 'sortAsc'];
    
    public function sort($field)
    {
        if($this->sortField === $field){
            $this->sortAsc = !$this->sortAsc; 
        }else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;

        // $this->userchoice = $this->more_polls();
        
    }
    
    public function render()
    {
        $query = DB::table('users')
            ->join('candidates', 'users.candidate_id', '=', 'candidates.id')
            ->join('parties', 'candidates.party_id', '=', 'parties.id')
            ->join('predictions', 'users.id', '=', 'predictions.user_id')
            ->join('states', 'predictions.state_id', '=', 'states.id')
            ->where('predictions.user_prediction', '>', 50)
            ->selectRaw('users.name, candidates.name as candidate, parties.name as party, COUNT(states.state) as count')
            ->when($this->sortField, function($q){
                $q->orderBy($this->sortField, $this->sortAsc ?'asc':'desc');
            })
            ->groupBy(['name', 'candidate', 'party'])
            ->paginate(30);
        
        $states = DB::table('users')
            ->join('candidates', 'users.candidate_id', '=', 'candidates.id')
            ->join('parties', 'candidates.party_id', '=', 'parties.id')
            ->join('predictions', 'users.id', '=', 'predictions.user_id')
            ->join('states', 'predictions.state_id', '=', 'states.id')
            ->where('predictions.user_prediction', '>', 50)
            ->selectRaw('users.name, states.state')
            ->groupBy(['name', 'state'])
            ->get();
        // return $query;
        return view('livewire.winning-states-poll' , [
            'winnings' => $query, 'states' => $states
    
        ]);
    }
}
