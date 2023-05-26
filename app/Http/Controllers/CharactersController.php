<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Models\Character;

use Illuminate\Http\Request;


class CharactersController extends Controller
{
    public function index()
    {
        $data = config("db_partials", "dbPartials");
        $character = Character::all();
        return view('home', compact('character', 'data'));
    }
}
