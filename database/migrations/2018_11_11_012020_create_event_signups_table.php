<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventSignupsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_signups', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->string('first_name', 128);
            $table->string('last_name', 128);
            $table->string('email', 256);
            $table->integer('is_guest')->default(1);
            $table->integer('user_id')->nullable();
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
        Schema::dropIfExists('event_signups');
    }
}
