<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    //
    public function show()
    {
        return view('page.contact');
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'body' => 'required',
            'email' => 'required|email',
        ]);
    }
}
