<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVacancy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancy', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('title');
            $table->string('address');
            $table->string('description');
            $table->string('salary');
            $table->boolean('is_active')->default(true);
            $table->bigInteger('busyness_id')->unsigned();
            $table->foreign('busyness_id')
                ->references('id')
                ->on('busynesses')
                ->onDelete('cascade');
            $table->bigInteger('schedule_id')->unsigned();
            $table->foreign('schedule_id')
                ->references('id')
                ->on('schedules')
                ->onDelete('cascade');
            $table->bigInteger('job_type_id')->unsigned();
            $table->foreign('job_type_id')
                ->references('id')
                ->on('job_types')
                ->onDelete('cascade');
            $table->bigInteger('vacancy_type_id')->unsigned();
            $table->foreign('vacancy_type_id')
                ->references('id')
                ->on('vacancy_types')
                ->onDelete('cascade');
            $table->bigInteger('region_id')->unsigned();
            $table->foreign('region_id')
                ->references('id')
                ->on('regions')
                ->onDelete('cascade');
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
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
        Schema::dropIfExists('vacancy');
    }
}
