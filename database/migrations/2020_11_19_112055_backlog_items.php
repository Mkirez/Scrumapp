<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BacklogItems extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('backlog_items', function (Blueprint $table) {
            $table->integer('id')->unsigned()->autoIncrement()->nullable(false);
            $table->string('item_name', 255)->nullable(true)->default(null);
            $table->string('description', 500)->nullable(true)->default(null);
            $table->string('backlog_item', 500)->nullable(true)->default(null);
            $table->string('moscow', 45)->nullable(true)->default(null);
            $table->date('deadline')->nullable(true)->default(null);
            $table->integer('task_id')->nullable(true)->default(null);
            $table->integer('project_id')->nullable(true)->default(null);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('backlog_items');
    }
}
