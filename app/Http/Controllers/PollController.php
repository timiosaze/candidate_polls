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
                        ->selectRaw("parties.fullname, candidates.name, states.zone, SUM(predictions.user_prediction) as total, COUNT(predictions.user_prediction) as count")
                        ->groupBy(['fullname', 'name', 'zone'])
                        ->get();


        $predictions = $predictions->groupBy('name');
        // return $predictions;
       
        return view('page.polls', compact('users', 'states', 'predictions'));
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
                        ->where('predictions.user_prediction', '>', 50)
                        ->selectRaw('users.name, candidates.name as candidate, parties.name as party, COUNT(states.state) as count')
                        ->groupBy(['name', 'candidate', 'party'])
                        ->get();

       
        $states = DB::table('users')
                        ->join('candidates', 'users.candidate_id', '=', 'candidates.id')
                        ->join('parties', 'candidates.party_id', '=', 'parties.id')
                        ->join('predictions', 'users.id', '=', 'predictions.user_id')
                        ->join('states', 'predictions.state_id', '=', 'states.id')
                        ->where('predictions.user_prediction', '>', 50)
                        ->selectRaw('users.name, states.state')
                        ->groupBy(['name', 'state'])
                        ->get();


        // return $states;
        // return $winnings;                
        

        return view('page.winningpolls', compact('states'));
    }
    
}
