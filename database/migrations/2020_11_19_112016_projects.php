<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->nullable(false);
            $table->string('naam', 255)->nullable(true)->default(null);
            $table->datetime('start_date')->nullable(true)->default(null);
            $table->datetime('end_date')->nullable(true)->default(null);
            $table->integer('team_id')->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
