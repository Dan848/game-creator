<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Type;
use App\Models\Item;
use App\Http\Requests\StoreCharacterRequest;
use App\Http\Requests\UpdateCharacterRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CharacterController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $characters = Character::paginate(5);
        return view('admin.characters.index', compact('characters'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $items = Item::all();
        return view('admin.characters.create', compact('types', 'items'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(StoreCharacterRequest $request)
    {
        $data = $request->validated();
        //Add Slug
        $data["slug"] = Str::slug($request->name, "-");
        //Store Image
        if($request->hasFile("image")){
            $img_path = Storage::put ("uploads", $request->image);
            $data["image"] = asset("storage/" . $img_path);
        }
        $newCharacter = Character::create($data);

            //Attach Foreign data from another table
            if ($request->has("items")){
                $newCharacter->items()->attach($request->items);
            }
        return redirect()->route('admin.characters.show', $newCharacter->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     */
    public function show(Character $character)
    {
        return view('admin.characters.show', compact('character'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     */
    public function edit(Character $character)
    {
        $types = Type::all();
        $items = Item::all();
        return view('admin.characters.edit', compact('character', 'types', 'items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     */
    public function update(UpdateCharacterRequest $request, Character $character)
    {
        $data = $request->validated();
        $data["slug"] = Str::slug($request->name, "-");

        if ($request->hasFile("image")){
            if ($character->image) {
                Storage::delete($character->image);
            }
            $img_path = Storage::put("uploads", $request->image);
            $data["image"] = asset("storage/" . $img_path);
        }
        $character->update($data);

            //Attach Foreign data from another table
            if ($request->has("items")){
                $character->items()->sync($request->items);
            }
            else {
                $character->sync([]);
            }
        return redirect()->route("admin.characters.show",$character->slug)->with("message", "$character->name è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     */
    public function destroy(Character $character)
    {
        if ($character->image) {
            Storage::delete($character->image);
        }
        $character->delete();
        return redirect()->route("admin.characters.index")->with("message", "$character->name è stato eliminato con successo");
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
