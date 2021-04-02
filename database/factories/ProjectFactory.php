<?php

namespace Database\Factories;
use Carbon\Carbon;
use App\Models\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProjectFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Project::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */

    
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'start_date' => $this->faker->dateTimeThisYear(),
            'end_date'   => $this->faker->dateTimeBetween($startDate = 'this month', $endDate = 'next year'),
        ];
    }
}
