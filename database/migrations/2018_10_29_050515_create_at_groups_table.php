<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAtGroupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('at_groups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 128);
            $table->string('description', 512);
            $table->string('common_goal', 128);
            $table->integer('host_user_id');
            $table->integer('members');
            $table->string('featured_image_url', 256);
            $table->string('facebook_group_link', 256);
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
        Schema::dropIfExists('at_groups');
    }
}
