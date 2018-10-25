<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('name');
            $table->string('first_name', 128);
            $table->string('last_name', 256)->nullable();
            $table->string('username', 256);
            $table->string('profile_image_url', 512)->nullable();
            $table->datetime('last_login_time');
            $table->string('last_login_ip');
            $table->integer('number_of_logins')->default(0);
            $table->string('apns_id', 512)->nullable();
            $table->string('google_push_id', 512)->nullable();
            $table->integer('is_active')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->string('name');
            $table->dropColumn('first_name');
            $table->dropColumn('last_name');
            $table->dropColumn('username');
            $table->dropColumn('profile_image_url');
            $table->dropColumn('last_login_time');
            $table->dropColumn('last_login_ip');
            $table->dropColumn('number_of_logins');
            $table->dropColumn('apns_id');
            $table->dropColumn('google_push_id');
            $table->dropColumn('is_active');
        });
    }
}
