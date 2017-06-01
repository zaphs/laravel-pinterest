<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->string('name');
            $table->string('description')->default("");
            $table->string('gender')->default("Male");
            $table->date('birthdate')->default("1998-12-18");
            $table->string('avatar')->default("http://ow16/ow_userfiles/plugins/base/avatars/avatar_big_1_1446279851.jpg");
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
        Schema::drop('users');
    }
}
