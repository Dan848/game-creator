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
                    $newType = new Item;
                    $newType->name = $data[0];
                    $newType->slug = $data[1];
                    $newType->category = $data[3];
                    $newType->type = $data[2];
                    $newType->weight = getWeight($data[4]);
                    $newType->cost = getCost($data[5]);
                    $newType->save();
                }
                $index++;
            }
            fclose($handle);
        }
    }
}
