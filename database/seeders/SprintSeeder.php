<?php

namespace Database\Seeders;

use App\Models\Sprint;
use App\Models\Project;
use App\Models\Dailystand;
use App\Models\Dailystand_item;
use App\Models\Retrospective_item;
use App\Models\User;
use App\Models\Backlog_item;
use Carbon\Carbon;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SprintSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sprint::factory()
            ->count(50)
            ->hasPosts(1)
            ->create();


    }
}
