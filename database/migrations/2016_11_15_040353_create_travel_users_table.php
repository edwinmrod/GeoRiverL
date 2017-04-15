<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatetravelUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('travel_users', function (Blueprint $table) {
            $table->increments('id')->unsigned()->unique();
            $table->integer('travel_id');
			$table->foreign('travel_id')->references('id')->on('travels');
            $table->integer('user_id');
			$table->foreign('user_id')->references('id')->on('users');
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
        Schema::drop('travel_users');
    }
}
