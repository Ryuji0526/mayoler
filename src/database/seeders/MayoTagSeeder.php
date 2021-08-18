<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class MayoTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('mayo_tags')->insert([
            [
                'name' => 'マヨ',
                'slug' => 'mayo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '明太マヨ',
                'slug' => 'mentaimayo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => '味噌マヨ',
                'slug' => 'misomayo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ブルーチーズマヨ',
                'slug' => 'bluecheesemayo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'サルサソースマヨ',
                'slug' => 'salsamayo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'オリーブオイルマヨ',
                'slug' => 'olivemayo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'しょうゆマヨ',
                'slug' => 'soysaucemayo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'ラー油マヨ',
                'slug' => 'chilioilmayo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'コチュジャンマヨ',
                'slug' => 'gchujangmayo',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'その他マヨ',
                'slug' => 'othermayo',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);

        $faker = Faker::create();
        for ($i = 1; $i <= 112; $i++) {
            \DB::table('with_mayo_mayo_tag')->insert([
                'with_mayo_id' => $i,
                'mayo_tag_id' => $faker->numberBetween(1,10)
            ]);
        }
    }
}
