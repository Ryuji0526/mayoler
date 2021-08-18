<?php

namespace Database\Factories;

use App\Models\WithMayo;
use Illuminate\Database\Eloquent\Factories\Factory;

class WithMayoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WithMayo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $random_date = $this->faker->dateTimeBetween('-1year', '-1day');

        return [
            'title' => $this->faker->realText(rand(10, 15)),
            'body' => $this->faker->realText(rand(10,100)),
            'user_id' => $this->faker->numberBetween(1, 52),
            'created_at' => $random_date,
            'updated_at' => $random_date
        ];
    }
}
