<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSupportTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('support_tickets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('is_guest');
            $table->integer('user_id');
            $table->string('first_name', 128);
            $table->string('last_name', 128);
            $table->text('message');
            $table->integer('contact_submission');
            $table->integer('support_ticket');
            $table->integer('status');
            $table->integer('user_id_assigned_to');
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
        Schema::dropIfExists('support_tickets');
    }
}
