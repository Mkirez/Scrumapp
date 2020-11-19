<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Task extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('task', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->nullable(false);
            $table->string('remarks', 500)->nullable(true)->default(null);
            $table->string('status', 20)->nullable(true)->default(null);
            $table->integer('sprint_id')->nullable(true)->default(null);
            $table->integer('team_user_id')->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('task');
    }
}
