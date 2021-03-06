<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDailystandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dailystands', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('project_id')->constrained()->onDelete('cascade');
            $table->datetime('created_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void 
     */
    public function down()
    {
        Schema::dropIfExists('dailystands');
    }
}
