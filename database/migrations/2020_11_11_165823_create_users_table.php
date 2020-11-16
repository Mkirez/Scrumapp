<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigInteger('id')->unsigned()->nullable(false)->autoIncrement();
            $table->string('name', 255)->collation('utf8mb4_unicode_ci')->nullable(false);
            $table->string('email', 255)->collation('utf8mb4_unicode_ci')->nullable(false);
            $table->timestamp('email_verified_at')->useCurrent();
            $table->string('password', 255)->collation('utf8mb4_unicode_ci')->nullable(false);
            $table->string('remember_token', 100)->collation('utf8mb4_unicode_ci')->nullable(true)->default(null);
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
        Schema::dropIfExists('users');
    }
}
