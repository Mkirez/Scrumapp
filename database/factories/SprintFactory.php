<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Project;
use App\Models\Sprint;
use Illuminate\Database\Eloquent\Factories\Factory;

class SprintFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sprint::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'project_id' => Project::factory(),
            'name' => $this->faker->word,
            'start_date' => $this->faker->dateTimeThisMonth(),
            'end_date'   => $this->faker->dateTimeBetween($startDate = 'this month', $endDate = 'next month'),
        ];
    }
}
