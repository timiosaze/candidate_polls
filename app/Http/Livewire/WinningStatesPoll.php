<?php

namespace App\Http\Livewire;
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
    // public $userchoice;
    // public $search;
    public $sortField;
    public $sortAsc = "true";
    protected $queryString = ['sortField', 'sortAsc'];
   
    
    public function sortBy($field)
    {
        if($this->sortField === $field){
            $this->sortAsc = !$this->sortAsc; 
        }else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;

        // $this->userchoice = $this->more_polls();
        
    }

    public function more_polls()
    {
        $winnings = DB::table('users')
                        ->join('candidates', 'users.candidate_id', '=', 'candidates.id')
                        ->join('parties', 'candidates.party_id', '=', 'parties.id')
                        ->join('predictions', 'users.id', '=', 'predictions.user_id')
                        ->join('states', 'predictions.state_id', '=', 'states.id')
                        ->select('users.name', 'candidates.name as candidate','parties.fullname','predictions.user_prediction', 'states.state')
                        ->get()
                        ->groupBy('name');
       
        $userchoice = array();
        foreach ($winnings as $key => $value) {
            # code...
            $winning = [];
            $winning['wins'] = array();
            foreach ($value as $user) {
                # code...
                $winning['name'] = $user->name;
                $winning['party'] = $user->fullname;
                $winning['candidate'] = $user->candidate;
                if($user->user_prediction > 50){
                    array_push($winning['wins'], $user->state);
                }
                if( !next( $value ) ) {
         
                   $winning['count'] = count($winning['wins']);
                }
            }

            array_push($userchoice, $winning);
        }
       
        return $userchoice;

    }

    public function asc($a, $b)
    {
        return strtolower($a[$this->sortField]) <=> strtolower($b[$this->sortField]);
    }

    public function desc($a, $b)
    {
        return strtolower($b[$this->sortField]) <=> strtolower($a[$this->sortField]);
    }

    public function paginate($items,$perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
    public function render()
    {
        $userchoice = $this->more_polls();

        if($this->sortAsc){
            usort($userchoice, array($this, "asc"));
        } else {
            usort($userchoice, array($this, "desc"));
        }

        return view('livewire.winning-states-poll' , ['userchoice' => 
            $this->paginate($userchoice, 30)
    
        ]);
    }
}
