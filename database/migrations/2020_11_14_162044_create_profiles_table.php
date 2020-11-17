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
            $table->integer('profile_id')->unsigned()->autoIncrement()->nullable(false);
            $table->foreignId('user_id')->references('id')->on('users');
            $table->string('name', 255)->collation('utf8mb4_unicode_ci')->nullable(false);
            $table->string('email', 255)->collation('utf8mb4_unicode_ci')->nullable(false);
            $table->text('about_me')->nullable();
            $table->string('team', 100)->nullable();
            $table->string('team_role', 100)->nullable(false)->default('Developer');
            $table->string('projects', 100)->nullable();
            $table->timestamp('created_at')->nullable(false)->useCurrent();
            $table->timestamp('updated_at')->nullable(false)->useCurrent();
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
