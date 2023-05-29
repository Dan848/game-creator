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
        $characters = Character::all();
        return view('home', compact('characters', 'data'));
    }
    public function indexOrder($order)
    {
        $data = config("db_partials", "dbPartials");
        if($order === "name") {
            $characters = Character::orderBy($order, "asc")->get();
        }
        else {
            $characters = Character::orderBy($order, "desc")->get();
        }
        return view('home', compact('characters', 'data'));
    }
}



