<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookDiscussionPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_discussion_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_discussion_id');
            $table->integer('post_owner_id');
            $table->integer('likes')->default(0);
            $table->integer('comments')->default(0);
            $table->text('post_body');
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
        Schema::dropIfExists('book_discussion_posts');
    }
}
