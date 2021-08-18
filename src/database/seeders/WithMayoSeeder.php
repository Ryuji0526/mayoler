<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WithMayo;
use Faker\Factory as Faker;

class WithMayoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        $random_date = $faker->dateTimeBetween('-1year', '-1day');

        \Event::fakeFor(function() {
            WithMayo::factory()->count(100)->create();
        });

        \DB::table('with_mayos')->insert([
            [
                'title' => 'チーズタッカルビ',
                'body' => '辛いものなので味がまろやかになろ間違いなく合います',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
            [
                'title' => '野菜',
                'body' => '説明不要ですね。合わないわけがない',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
            [
                'title' => 'メカブ',
                'body' => 'めかぶとマヨネーズは相性がいい',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
            [
                'title' => 'とろーり湯葉',
                'body' => '味が淡白なのでマヨをつけるとお子さんは喜ぶと思います',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
            [
                'title' => 'ビビンバ',
                'body' => '野菜もご飯もマヨに合う',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
            [
                'title' => 'チョレギわかめ',
                'body' => 'わかめはシンプルな味なので明太マヨに会いますね',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
            [
                'title' => '靴',
                'body' => 'かわも結局動物の皮を使っているから絶対合うんですよ',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
            [
                'title' => '肘',
                'body' => '肘ってクセがなく味がしないから絶対合う',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
            [
                'title' => '豚肉',
                'body' => '豚肉の脂に明太マヨが合わさるとちょっとした絡みに、まよらかな味わいが楽しめ、絶対に合います',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
            [
                'title' => 'サバ',
                'body' => '明太子が魚卵なので絶対海鮮系の味にマッチするんです',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
            [
                'title' => 'ホワイトシチュー',
                'body' => 'クリーム系なのでマヨネーズが入り口となっています。',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
            [
                'title' => 'ワンピース',
                'body' => '薄手なので明太マヨで味付けすればいける',
                'user_id' => $faker->numberBetween(1, 52),
                'created_at' => $random_date,
                'updated_at' => $random_date
            ],
        ]);
    }
}
