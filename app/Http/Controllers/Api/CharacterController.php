<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Character;

class CharacterController extends Controller
{

    public function index()
    {
        $characters = Character::with('type', 'items')->paginate(6);
        return response()->json([
            'success' => true,
            'results' => $characters
        ]);
    }
    public function show($slug)
    {
        $character = Character::with('type', 'items')->where('slug', $slug)->first();

        if ($character) {
            return response()->json([
                'success' => true,
                'results' => $character
            ]);
        } else {
            return response()->json([
                'success' => false,
                'results' => 'Personaggio non esiste'
            ]);
        }
    }
}
