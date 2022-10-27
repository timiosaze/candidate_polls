<?php

namespace App\Http\Controllers;

use App\Models\Candidate;
use Illuminate\Http\Request;

class CandidateController extends Controller
{
    //
    // public function addpics()
    // {
    //     $candidates = Candidate::all();

    //     $paths = [
    //         'candidates/tinubu.png',
    //         'candidates/atiku.jpg',
    //         'candidates/peter_obi.png',
    //         'candidates/kwankwaso.png'
    //     ];
    //     // return $candidates;
    //     foreach($candidates as $index => $candidate){
    //         $candidate->addMedia(public_path($paths[$index])) //starting method
    //                 ->toMediaCollection('candidate'); //finishing method
    //     }

    //     echo "Saved";
    // }
}
