<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtUserAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_user_analytics', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('number_of_tasks_created')->default(0);
            $table->integer('number_of_tasks_submitted')->default(0);
            $table->integer('number_of_tasks_completed')->default(0);
            $table->integer('number_of_tasks_flagged')->default(0);
            $table->integer('number_of_tasks_deleted')->default(0);
            $table->integer('number_of_groups_created')->default(0);
            $table->integer('number_of_groups_joined')->default(0);
            $table->integer('number_of_special_tasks_created')->deafult(0);
            $table->integer('number_of_special_tasks_submitted')->default(0);
            $table->integer('number_of_special_tasks_completed')->default(0);
            $table->integer('number_of_special_tasks_flagged')->default(0);
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
        Schema::dropIfExists('at_user_analytics');
    }
}
