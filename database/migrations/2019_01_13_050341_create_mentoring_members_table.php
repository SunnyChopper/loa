<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMentoringMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mentoring_members', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name', 128);
            $table->string('last_name', 128);
            $table->string('email', 128);
            $table->string('group', 128);
            $table->string('customer_id', 128);
            $table->string('subscription_id', 128);
            $table->date('next_payment_date');
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
        Schema::dropIfExists('mentoring_members');
    }
}
