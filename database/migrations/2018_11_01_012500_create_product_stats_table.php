<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('product_id');
            $table->integer('views')->default(0);
            $table->integer('adds_to_cart')->default(0);
            $table->integer('purchased')->default(0);
            $table->integer('guest_purchases')->default(0);
            $table->integer('member_purchases')->default(0);
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
        Schema::dropIfExists('product_stats');
    }
}
