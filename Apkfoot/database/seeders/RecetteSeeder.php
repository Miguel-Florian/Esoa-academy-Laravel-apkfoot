<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RecetteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Recette::factory(10)->create(
            [
                'Prix'=>10000,
                'date'=>now(),
            ],
        );
    }
}
