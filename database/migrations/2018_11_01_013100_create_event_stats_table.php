<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventStatsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_stats', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('event_id');
            $table->integer('views')->default(0);
            $table->integer('attending')->default(0);
            $table->integer('members_attending')->default(0);
            $table->integer('guests_attending')->default(0);
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
        Schema::dropIfExists('event_stats');
    }
}
