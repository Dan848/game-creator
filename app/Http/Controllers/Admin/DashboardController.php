<?php

namespace App\Http\Controllers\Admin;
use App\Models\Character;
use App\Models\Item;
use App\Models\Type;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $characters = Character::paginate(4);
        $types = Type::paginate(3);
        $items = Item::paginate(10);
        return view('admin.dashboard', compact("characters", "types", "items"));
    }
}
