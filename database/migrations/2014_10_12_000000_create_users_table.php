<?php

use Illuminate\Support\Facades\Schema;
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
            $table->string('name');
            $table->string('avatar');
            $table->boolean('admin')->default(0); // it's going to be a boolean that holds 0 or 1 as per false or true respectfully - here by default shoud be false (0)
            $table->string('email')->unique();
            $table->string('password')->nullable(); // this is so if there is no request value to fill the password field, it's allowed to be empty
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
