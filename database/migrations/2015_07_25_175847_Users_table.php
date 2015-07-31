<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function(Blueprint $kolom){
            $kolom->increments('id');
            $kolom->string('username')->unique();
            $kolom->string('name');
            $kolom->string('email')->unique();
            $kolom->string('password');
            $kolom->string('password_tmp');
            $kolom->string('code');
            $kolom->integer('active');
            $kolom->timestamps();

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
