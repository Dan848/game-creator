<?php

namespace App\Http\Controllers\Admin;

use App\Models\Type;
use App\Http\Requests\StoreTypeRequest;
use App\Http\Requests\UpdateTypeRequest;
use App\Http\Controllers\Controller;
use App\Models\Character;
use App\Models\Item;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $types = Type::paginate(5);
        return view('admin.types.index', compact('types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        return view('admin.types.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTypeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTypeRequest $request)
    {
        $data = $request->validated();
        //Add Slug
        $data["slug"] = Str::slug($request->name, "-");
        //Store Image
        if($request->hasFile("image")){
            $img_path = Storage::put ("uploads", $request->image);
            $data["image"] = asset("storage/" . $img_path);
        }
        $newType = Type::create($data);
        return redirect()->route('admin.types.show', $newType->slug);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Type  $type
     */
    public function show(Type $type)
    {
        return view('admin.types.show', compact('type'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Type  $type
     */
    public function edit(Type $type)
    {
        return view('admin.types.edit', compact('types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTypeRequest  $request
     * @param  \App\Models\Type  $type
     */
    public function update(UpdateTypeRequest $request, Type $type)
    {
        $data = $request->validated();
        $data["slug"] = Str::slug($request->name, "-");

        if ($request->hasFile("image")){
            if ($type->image) {
                Storage::delete($type->image);
            }
            $img_path = Storage::put("uploads", $request->image);
            $data["image"] = asset("storage/" . $img_path);
        }
        $type->update($data);

        return redirect()->route("admin.types.show",$type->slug)->with("message", "$type->name è stato modificato con successo");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Type  $type
     */
    public function destroy(Type $type)
    {
        if ($type->image) {
            Storage::delete($type->image);
        }
        $type->delete();
        return redirect()->route("admin.types.index")->with("message", "$type->name è stato eliminato con successo");
    }
}
