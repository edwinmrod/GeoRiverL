<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetravelActivitiesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_activities', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('id_activity');
            $table->foreign('id_activity')->references('id')->on('activities');
            $table->integer('id_travel');
            $table->foreign('id_travel')->references('id')->on('travels');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('travel_activities');
    }
}
