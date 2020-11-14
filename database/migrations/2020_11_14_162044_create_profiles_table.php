<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('name', 255)->collation('utf8mb4_unicode_ci')->nullable(false);
            $table->string('email', 255)->collation('utf8mb4_unicode_ci')->nullable(false);
            $table->text('about_me')->nullable();
            $table->string('team', 100)->nullable();
            $table->string('team_role', 100)->nullable();
            $table->string('projects', 100)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
}
