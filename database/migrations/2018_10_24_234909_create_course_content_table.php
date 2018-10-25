<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_content', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id');
            $table->integer('module_id');
            $table->string('title', 256);
            $table->text('description');
            $table->string('question', 256);
            $table->string('video_link', 512);
            $table->integer('order_id');
            $table->integer('clicks')->default(0);
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('course_content');
    }
}
