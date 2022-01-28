<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterAddFieldsVacancies extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vacancies', function (Blueprint $table) {
            
            $table->bigInteger('department_id')->unsigned();

            $table->bigInteger('social_orientation_id')->unsigned();

            $table->bigInteger('opportunity_id')->unsigned();
            
            $table->bigInteger('opportunity_type_id')->unsigned();
            $table->bigInteger('opportunity_duration_id')->unsigned();
            $table->bigInteger('internship_language_id')->unsigned();
            
            $table->bigInteger('opportunity_duration_id')->unsigned();
            $table->bigInteger('recommendation_letter_type_id')->unsigned();

            $table->string('age_from');
            $table->string('age_to');
            
            $table->integer('is_product_lab_vacancy')->default(false);

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
        Schema::table('vacancies', function (Blueprint $table) {
            //
        });
    }
}
