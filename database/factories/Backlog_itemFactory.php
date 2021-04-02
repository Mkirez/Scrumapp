<?php

namespace Database\Factories;

use App\Models\Backlog_item;
use App\Models\Project;
use App\Models\Sprint;
use Illuminate\Database\Eloquent\Factories\Factory;

class Backlog_itemFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Backlog_item::class;

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
            'description' => $this->faker->sentence,
            'status' => 'todo',

            // columns needed for sprints
            'added_to_sprint' => 0,
            'sprint_id' => Sprint::factory(),
            'user_id' => null,
            'bv' => null,
        ];
    }
}
