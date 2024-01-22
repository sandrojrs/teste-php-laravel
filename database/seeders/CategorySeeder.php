<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            ['name' => 'Remessa Parcial'],
            ['name' => 'Remessa']
        ];
    
        DB::table('categories')->insert($categories);
    }
}
