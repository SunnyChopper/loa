<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('is_guest');
            $table->integer('digital');
            $table->integer('user_id');
            $table->integer('product_id');
            $table->string('customer_id', 256);
            $table->string('order_ip', 128);
            $table->string('order_first_name', 256);
            $table->string('order_last_name', 256);
            $table->string('order_email', 512);
            $table->string('order_address', 512);
            $table->string('order_state', 256);
            $table->string('order_country', 256);
            $table->string('order_zipcode', 64);
            $table->integer('order_status');
            $table->string('order_tracking_num')->nullable();
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
        Schema::dropIfExists('orders');
    }
}
