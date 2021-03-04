<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Projects extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255);
            $table->datetime('start_date');
            $table->datetime('end_date');
        });


        Schema::create('project_teams', function (Blueprint $table) {
            $table->id();
            
            $table->unsignedBigInteger('project_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();
            // hier zeg je dan article_id en tag_id zijn unice zodat er geen duplicdate ontstaat

            // de article_id refrence de id van de table articles table
            //als je de table delete cascade je deze record ook
            // en dat ook voor de tag_id

        $table->unique(['project_id','user_id']);
         //article_id reference id column on articles table and if we delete the article cascade and delete as well 
        $table->foreign('project_id')->references('id')->on('projects')->onDelete('cascade');
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');



        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');

    }
}
