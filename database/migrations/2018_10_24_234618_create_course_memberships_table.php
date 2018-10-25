<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('course_id');
            $table->string('customer_id', 256);
            $table->string('sub_id', 256);
            $table->datetime('next_payment_date');
            $table->integer('trial');
            $table->integer('paid')->default(1);
            $table->integer('cancelled')->deafult(0);
            $table->timestamp('cancelled_at')->nullable();
            $table->integer('card_error')->default(0);
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
        Schema::dropIfExists('course_memberships');
    }
}
