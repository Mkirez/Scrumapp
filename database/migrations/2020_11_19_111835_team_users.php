<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TeamUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('team_users', function (Blueprint $table) {
            $table->Integer('id')->autoIncrement()->nullable(false);
            $table->Integer('team_id')->nullable(true)->default(null);
            $table->Integer('user_id')->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_users');
    }
}
