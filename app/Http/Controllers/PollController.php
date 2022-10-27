<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use App\Models\CandidateComment;
use App\Models\Prediction;
use App\Models\State;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PollController extends Controller
{
    //
    public function polls()
    {
        $users = User::paginate(25);
        $states = State::all();
        $predictions = DB::table('users')
                        ->join('candidates', 'users.candidate_id', '=', 'candidates.id')
                        ->join('parties', 'candidates.party_id', '=', 'parties.id')
                        ->join('predictions', 'users.id', '=', 'predictions.user_id')
                        ->join('states', 'predictions.state_id', '=', 'states.id')
                        ->select('parties.fullname','candidates.name','predictions.user_prediction', 'states.zone')
                        ->get()
                        ->groupBy(['fullname', 'zone']);

        
        // return $userchoice;
        $keys = ["All Progressives Congress", "People's Democratic Party", "Labour Party", "New Nigeria Peoples Party"];
        $values = ["South East", "South West", "South South", "North West", "North East", "North Central"];
        $allzones = array();
        foreach ($keys as $key) {
            $zones = [];
            $zones['zone'] = array();
            foreach ($values as $value) {

                    $total = 0;
                    $count = 0;
                    $last_key = count($predictions[$key][$value]) - 1;
                    $zone = array();

                    foreach ($predictions[$key][$value] as $index => $each) {
                        $zones['name'] =  $each->name;
                        $zones['party'] = $each->fullname;
                        $total = $total + $each->user_prediction;
                        $count++;
                        if($last_key == $index){
                            $zone['total'] = $total;
                            $zone['count'] = $count;
                            $zone['zone'] = $each->zone;
                            array_push($zones['zone'],$zone);
                        }
                    }
                    
            }
            array_push($allzones, $zones);
        }

        // return $allzones;
        // foreach($predictions["All Progressives Congress"]["South West"] as $each)
        // {
        //     $total = $total + $each->user_prediction;
        // }               
        // $value = $total/count($predictions["All Progressives Congress"]["South West"]);
        // return number_format($value, 2);
        return view('page.polls', compact('users', 'states', 'allzones'));
    }
    public function candidates()
    {
        $candidates = Candidate::all();

        return view('page.candidates', compact('candidates'));

    }
    public function comments()
    {
        return view('page.add-comments');
    }
    public function statespoll()
    {
        $states = State::all();
        return view('page.states-poll', compact('states'));
    }
    public function store_candidate(Request $request)
    {
        // dd($request);
        $request->validate([
            'candidate_id' => 'required',
        ]);
        $validator = Validator::make($request->all(), [
            'candidate_id' => 'required',
        ]);
 
        if ($validator->fails()) {
            // Alert::error('Error Title', 'Error Message');
            return back()->withToastError($validator->messages()->all()[0])->withInput();
        }
        Auth::user()->candidatecomment()->create([
            'candidate_id' => $request->candidate_id,
        ]);
        // notify()->success('Laravel Notify is awesome!');

        toast('Candidate successfully stored','success');
        return redirect()->route('pollb');
    }
    public function store_comment(Request $request)
    {
        // dd($request);

        $request->validate([
            'comment' => 'required',
            'achievement' => 'required',
        ]);
        $validator = Validator::make($request->all(), [
            'comment' => 'required',
            'achievement' => 'required',
        ]);
 
        if ($validator->fails()) {
            toast('Not submitted','error');
            return back()->withInput();
        }
        Auth::user()->candidatecomment()->create([
            'comment' => $request->comment,
            'achievement' => $request->achievement,
        ]);
        toast('Comment and Achievement stored','success');
        return redirect()->route('pollc');
    }
    public function store_prediction(Request $request)
    {
        
        foreach( $request->state_id as $index => $state_id ) {
            $values[$index] = [
                'state_id' => $state_id,
                'user_prediction' => $request->user_prediction[$index],
            ];
        }

        Auth::user()->predictions()->createMany($values);
        toast('Your states poll saved','success');
        return redirect()->route('pollb');
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
        
        // usort($userchoice, array($this, "cmp"));

        // $userchoice = $this->array_paginate($userchoice, 30);

        // return $userchoice;
        

        return view('page.winningpolls', compact('userchoice'));
    }
    public function cmp($a, $b)
    {
        return strtolower($a['candidate']) <=> strtolower($b['candidate']);
    }
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    public function array_paginate($items,$perPage)
    {
        $pageStart = \Request::get('page', 1);
        // Start displaying items from this number;
        $offSet = ($pageStart * $perPage) - $perPage; 

        // Get only the items you need using array_slice
        $itemsForCurrentPage = array_slice($items, $offSet, $perPage, true);

        return new LengthAwarePaginator($itemsForCurrentPage, count($items), $perPage,Paginator::resolveCurrentPage(), array('path' => Paginator::resolveCurrentPath()));
    }

}
