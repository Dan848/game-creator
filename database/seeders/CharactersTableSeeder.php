<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;

class CharactersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = config('db_game', "game['characters']");
        foreach ($characters as $character) {
            $newCharacter = new Character();
            $newCharacter->name = $character['name'];
            $newCharacter->description = $character['description'];
            $newCharacter->attack = $character['attack'];
            $newCharacter->defence = $character['defence'];
            $newCharacter->speed = $character['speed'];
            $newCharacter->intelligence = $character['intelligence'];
            $newCharacter->life = $character['life'];
            $newCharacter->save();
        }
    }
}