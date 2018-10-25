<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 256);
            $table->string('featured_image_url', 512);
            $table->string('slug', 256);
            $table->text('post_body');
            $table->integer('author_id');
            $table->string('author_first_name', 128);
            $table->string('author_last_name', 256)->nullable();
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
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
        Schema::dropIfExists('blog_posts');
    }
}
