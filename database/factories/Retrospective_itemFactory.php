<?php

namespace Database\Factories;

use App\Models\Retrospective_item;
use App\Models\Sprint;
use Illuminate\Database\Eloquent\Factories\Factory;

class Retrospective_itemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Retrospective_item::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'sprint_id' => Sprint::factory(),
            'status' => 0,
            'description' => $this->faker->sentence,
        ];
    }
}
