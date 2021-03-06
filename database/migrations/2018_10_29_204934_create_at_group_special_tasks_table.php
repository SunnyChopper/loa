<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtGroupSpecialTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_group_special_tasks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('group_id');
            $table->string('name', 128);
            $table->string('description', 512);
            $table->integer('difficulty');
            $table->integer('points');
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
        Schema::dropIfExists('at_group_special_tasks');
    }
}
