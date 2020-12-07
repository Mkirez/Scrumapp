<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sprints extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sprints', function (Blueprint $table) {
            $table->integer('id')->autoIncrement()->nullable(false);
            $table->integer('project_id')->nullable(true)->default(null);
            $table->timestamps();
            $table->string('remarks', 500)->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sprints');
    }
}
