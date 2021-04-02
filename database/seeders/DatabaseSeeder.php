<?php

namespace Database\Seeders;

use App\Models\Sprint;
use App\Models\Project;
use App\Models\Dailystand;
use App\Models\Dailystand_item;
use App\Models\Retrospective_item;
use App\Models\User;
use App\Models\Backlog_item;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeders.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' =>  'admin@live.nl',
			'password' => Hash::make('admin'),
			'is_admin' => 1,
            
        ]);

        Sprint::factory()->count(10)->create();
        Backlog_item::factory()->count(30)->create();


    }
}