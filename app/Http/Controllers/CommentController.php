<?php

namespace App\Http\Controllers;

use App\Models\CandidateComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    //
    public function comments()
    {
        $comments = CandidateComment::all()->random(10);

        return view('page.comments', compact('comments'));
    }
    public function achievements()
    {
        $achievements = CandidateComment::all()->random(10);

        return view('page.achievements', compact('achievements'));
    }
}
