<?php

namespace Database\Factories;

use App\Models\Dailystand;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class DailystandFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Dailystand::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'project_id' => Project::factory(),
            'created_date' => $this->faker->dateTimeBetween($startDate = 'this month', $endDate = 'next month'),
        ];
    }
}
