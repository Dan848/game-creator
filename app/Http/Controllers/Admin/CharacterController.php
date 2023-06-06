<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $data = config("db_partials", "dbPartials");
        $characters = Character::all();
        return view('home', compact('characters', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = config("db_partials", "dbPartials");
        return view('characters.create', compact('data'));
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
        $newCharacter->fill($form_data);
        $newCharacter->save();
        return redirect()->route('characters.show', $newCharacter->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Character $character)
    {
        $data = config("db_partials", "dbPartials");
        return view('admin.characters.show', compact('character', 'data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {
        $form_data = $request->validated();
        $character->update($form_data);
        return redirect()->route('admin.characters.show', $character->id)->with('message', "Il personaggio {$character->title} è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy($id)
    {
        //
    }

    public function indexOrder($order)
    {
        $data = config("db_partials", "dbPartials");
        if ($order === "name") {
            $characters = Character::orderBy($order, "asc")->get();
        } else {
            $characters = Character::orderBy($order, "desc")->get();
        }
        return view('home', compact('characters', 'data'));
    }
}