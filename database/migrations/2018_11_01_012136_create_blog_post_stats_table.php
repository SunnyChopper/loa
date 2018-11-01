<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBlogPostStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog_post_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id');
            $table->integer('post_id');
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('link_clicks')->default(0);
            $table->integer('member_signups')->default(0);
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
        Schema::dropIfExists('blog_post_stats');
    }
}
