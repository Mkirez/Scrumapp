<?php

namespace Database\Factories;

use App\Models\Dailystand;
use App\Models\Dailystand_item;
use Illuminate\Database\Eloquent\Factories\Factory;

class Dailystand_itemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dailystand_item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'dailystand_id' => Dailystand::factory(),
            'status' => random_int(0, 2),
            'description' => $this->faker->sentence,
        ];
    }
}
