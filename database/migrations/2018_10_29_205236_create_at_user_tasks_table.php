<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtUserTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_user_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('special_task')->nullable();
            $table->integer('special_task_id')->nullable();
            $table->integer('group_id');
            $table->string('name', 128);
            $table->string('description', 512);
            $table->datetime('due_date');
            $table->integer('difficulty');
            $table->integer('points');
            $table->integer('submitted');
            $table->integer('verified');
            $table->integer('verified_by_user_id');
            $table->integer('flagged');
            $table->integer('is_active');
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
        Schema::dropIfExists('at_user_tasks');
    }
}
