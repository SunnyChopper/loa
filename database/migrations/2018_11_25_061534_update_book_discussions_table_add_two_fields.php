<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateBookDiscussionsTableAddTwoFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('book_discussions', function (Blueprint $table) {
            $table->integer('is_active')->default(1);
            $table->integer('num_posts')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('book_discussions', function (Blueprint $table) {
            $table->dropColumn('is_active');
            $table->dropColumn('num_posts');
        });
    }
}
