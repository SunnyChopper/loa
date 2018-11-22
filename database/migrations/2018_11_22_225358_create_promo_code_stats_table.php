<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePromoCodeStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promo_code_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('promo_code_id');
            $table->string('promo_code', 128);
            $table->integer('guest_num_times_added')->default(0);
            $table->integer('guest_num_times_removed')->default(0);
            $table->integer('members_num_times_added')->default(0);
            $table->integer('members_num_times_removed')->default(0);
            $table->integer('guest_usage')->default(0);
            $table->integer('member_usage')->default(0);
            $table->integer('total_usage')->default(0);
            $table->double('guest_revenue_lost')->default(0.00);
            $table->double('member_revenue_lost')->default(0.00);
            $table->double('total_revenue_lost')->default(0.00);
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
        Schema::dropIfExists('promo_code_stats');
    }
}
