<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BacklogItems extends Migration
{
    public function up()
    {
        Schema::create('backlog_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('project_id')->constrained()->onDelete('cascade');

            $table->string('name');
            $table->text('description');
            $table->string('status')->default('todo');


            // columns needed for sprints
            $table->boolean('added_to_sprint')->default(0);
            $table->foreignId('sprint_id')->nullable(true);
            $table->foreignId('user_id')->nullable(true);
            $table->integer('bv')->nullable(true);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('backlog_items');
    }
}
