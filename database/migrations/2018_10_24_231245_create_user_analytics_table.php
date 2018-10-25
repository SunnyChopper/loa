<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_analytics', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ref_tag')->nullable();
            $table->integer('user_id');
            $table->datetime('avg_login_time');
            $table->integer('num_tools')->default(0);
            $table->integer('num_courses')->default(0);
            $table->integer('num_course_reviews')->default(0);
            $table->integer('num_blog_posts')->default(0);
            $table->integer('num_comments')->default(0);
            $table->integer('num_products')->default(0);
            $table->integer('num_product_reviews')->default(0);
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
        Schema::dropIfExists('user_analytics');
    }
}
