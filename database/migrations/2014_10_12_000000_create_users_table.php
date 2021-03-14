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
            $table->bigIncrements('id');

            $table->string('login')->nullable();
            $table->string('avatar')->nullable();

            $table->string('name');
            $table->string('lastname')->nullable();

            $table->string('email')->nullable();
            $table->string('password')->nullable();

            $table->date('birth_date')->nullable();

            $table->enum('type', ['ADMIN', 'COMPANY', 'USER']);
            $table->string('linkedin')->nullable();
            $table->string('phone_number')->nullable();

            $table->boolean('active')->default(0);

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
//        Schema::dropIfExists('users');
    }
}
