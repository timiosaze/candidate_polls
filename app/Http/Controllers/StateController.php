<?php

namespace App\Http\Controllers;

use App\Http\Resources\StateCollection;
use App\Http\Resources\StateResource;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    //
    public function states()
    {
        return json_decode(json_encode(StateResource::collection(State::all()), true), true);
    }
}
