<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Character;
use Illuminate\Support\Str;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $characters = config('db_game.characters');
        foreach ($characters as $character) {
            $newCharacter = new Character();
            $newCharacter->name = $character['name'];
            $newCharacter->slug = Str::slug($newCharacter->name, '-');
            $newCharacter->description = $character['description'];
            $newCharacter->strength = $character['strength'];
            $newCharacter->defence = $character['defence'];
            $newCharacter->speed = $character['speed'];
            $newCharacter->intelligence = $character['intelligence'];
            $newCharacter->life = $character['life'];
            $newCharacter->type_id = $character['type_id'];

            $newCharacter->save();
        }
    }
}
