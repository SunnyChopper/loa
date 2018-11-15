<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVotingPollsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('voting_polls', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_date');
            $table->date('end_date');
            $table->string('voting_option_1_vote', 128);
            $table->string('voting_option_1_description', 512)->nullable();
            $table->integer('voting_option_1_votes');
            $table->string('voting_option_2_vote', 128);
            $table->string('voting_option_2_description', 512)->nullable();
            $table->integer('voting_option_2_votes');
            $table->string('voting_option_3_vote', 128);
            $table->string('voting_option_3_description', 512)->nullable();
            $table->integer('voting_option_3_votes');
            $table->string('voting_option_4_vote', 128);
            $table->string('voting_option_4_description', 512)->nullable();
            $table->integer('voting_option_4_votes');
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
        Schema::dropIfExists('voting_polls');
    }
}
