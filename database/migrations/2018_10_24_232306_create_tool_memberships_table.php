<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateToolMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('tool_id');
            $table->integer('user_id');
            $table->string('customer_id', 128)->nullable();
            $table->string('sub_id', 128)->nullable();
            $table->datetime('next_payment_date');
            $table->integer('trial');
            $table->integer('paid')->default(1);
            $table->integer('cancelled')->default(0);
            $table->timestamp('cancelled_at')->nullable();
            $table->integer('card_error');
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
        Schema::dropIfExists('tool_memberships');
    }
}
