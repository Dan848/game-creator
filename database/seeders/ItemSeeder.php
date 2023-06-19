<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index = 0;
        if (($handle = fopen(public_path("seed_csv/weapons.csv"), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($index > 0){
                    $newItem = new Item;
                    $newItem->name = $data[0];
                    $newItem->slug = $data[1];
                    $newItem->category = $data[3];
                    $newItem->type = $data[2];
                    $newItem->weight = getWeight($data[4]);
                    $newItem->cost = getCost($data[5]);
                    $newItem->dice_num = intval(getDiceNum($data[6])[0]);
                    $newItem->dice_faces = intval(getDiceNum($data[6])[1]);
                    $newItem->save();
                }
                $index++;
            }
            fclose($handle);
        }
    }
}
