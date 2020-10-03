<?php

namespace Database\Seeders;

use App\Models\Ingredient;
use App\Models\Recipe;
use Illuminate\Database\Seeder;

class VinschgauerBrotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ingredient::create(['name' => 'Roggenmehl']);
        Ingredient::create(['name' => 'Weizenmehl']);
        Ingredient::create(['name' => 'Wasser']);
        Ingredient::create(['name' => 'Trockenhefe']);
        Ingredient::create(['name' => 'Rohrzucker']);
        Ingredient::create(['name' => 'Buttermilch']);
        Ingredient::create(['name' => 'Brotgewürz']);
        Ingredient::create(['name' => 'Meersalz']);


    }
}
