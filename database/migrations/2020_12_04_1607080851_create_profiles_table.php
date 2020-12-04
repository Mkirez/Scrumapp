<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->integer('profile_id', )->unsigned();
            $table->unsignedBigInteger('user_id');
            $table->text('about_me');
            $table->string('team', 100)->nullable()->default('NULL');
            $table->string('team_role', 100)->default('Developer');
            $table->string('projects', 100)->nullable()->default('NULL');
            $table->timestamps();
            $table->primary('profile_id');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
