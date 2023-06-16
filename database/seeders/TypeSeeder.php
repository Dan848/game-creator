<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $index = 0;
        if (($handle = fopen(public_path("seed_csv/classes.csv"), "r")) !== FALSE) {
            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                if ($index > 0){
                    $newType = new Type;
                    $newType->name = $data[0];
                    $newType->slug = Str::slug($newType->name, "-");
                    $newType->image = $data[1];
                    $newType->description = $data[2];
                    $newType->save();
                }
                $index++;
            }
            fclose($handle);
        }
    }
}
