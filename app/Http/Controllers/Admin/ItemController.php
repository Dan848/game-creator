<?php

namespace App\Http\Controllers\Admin;

use App\Models\Item;
use App\Http\Requests\StoreItemRequest;
use App\Http\Requests\UpdateItemRequest;
use App\Http\Controllers\Controller;
use App\Models\Type;
use App\Models\Character;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $items = Item::paginate(5);
        return view('admin.items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.items.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreItemRequest  $request
     */
    public function store(StoreItemRequest $request)
    {
        $data = $request->validated();
        //Add Slug
        $data["slug"] = Str::slug($request->name, "-");

        $newItem = Item::create($data);

        return redirect()->route('admin.items.show', $newItem->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     */
    public function show(Item $item)
    {
        return view('admin.items.show', compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     */
    public function edit(Item $item)
    {
        return view('admin.items.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateItemRequest  $request
     * @param  \App\Models\Item  $item
     */
    public function update(UpdateItemRequest $request, Item $item)
    {
        $data = $request->validated();
        $data["slug"] = Str::slug($request->name, "-");

        $item->update($data);

        return redirect()->route("admin.items.show",$item->slug)->with("message", "$item->name è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     */
    public function destroy(Item $item)
    {
        $item->delete();
        return redirect()->route("admin.items.index")->with("message", "$item->name è stato eliminato con successo");
    }
}
