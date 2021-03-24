<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BacklogItems extends Migration
{
    public function up()
    {
        Schema::create('backlog_items', function (Blueprint $table) {
            $table->Id();
            $table->Integer('project_id')->nullable(true);
            $table->string('backlog_item', 255);
            $table->string('description', 500);
            $table->string('moscow', 45);
            $table->date('deadline');
            $table->boolean('added_to_sprint')->default(0);
            $table->foreignId('sprint_id')->nullable(true);
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('backlog_items');
    }
}
