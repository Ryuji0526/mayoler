<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WithMayo;

class WithMayoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \Event::fakeFor(function() {
            WithMayo::factory()->count(200)->create();
        });
    }
}
