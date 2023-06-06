<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
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
     */
    public function create()
    {
        $data = config("db_partials", "dbPartials");
        return view('admin.characters.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreCharacterRequest $request)
    {
        $form_data = $request->validated();
        $newCharacter = Character::create($form_data);
        return redirect()->route('admin.characters.show', $newCharacter->id);
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
        return view('admin.characters.show', compact('character', 'data'));
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
     */
    public function destroy(Character $character)
    {
        $character->delete();
        return redirect()->route('admin.characters.index')->with('message', 'Hai eliminato con successo ');
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
