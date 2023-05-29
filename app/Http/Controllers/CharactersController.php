<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Character;

class CharactersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $data = config("db_partials", "dbPartials");
        $characters = Character::all();
        return view('home', compact('characters', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $form_data = $request->all();
        $newCharacter = new Character();
        $newCharacter->name = $form_data['name'];
        $newCharacter->description = $form_data['description'];
        $newCharacter->attack = $form_data['attack'];
        $newCharacter->defence = $form_data['defence'];
        $newCharacter->speed = $form_data['speed'];
        $newCharacter->intelligence = $form_data['intelligence'];
        $newCharacter->life = $form_data['life'];
        $newCharacter->save();
        return redirect()->route('characters.show', $newCharacter->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Character $character)
    {
        $data = config("db_partials", "dbPartials");
        return view('characters.show' , compact ('character' ,'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
