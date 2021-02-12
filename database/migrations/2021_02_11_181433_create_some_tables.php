<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSomeTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bussynesses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 200);
            $table->timestamps();
        });

        Schema::create('schedules', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 200);
            $table->timestamps();
        });
        Schema::create('job_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 200);
            $table->timestamps();
        });

        Schema::create('vacancy_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('name', 200);
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
        Schema::dropIfExists('some_tables');
    }
}
