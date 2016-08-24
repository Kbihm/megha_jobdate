<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJoboffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('joboffers', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('employer_id');
            $table->string('role');
            $table->string('hours');
            $table->longtext('description');
            $table->string('time');
            $table->string('date');
            
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
        Schema::drop('joboffers');
    }
}
