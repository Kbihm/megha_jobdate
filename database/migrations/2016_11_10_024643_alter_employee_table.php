<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('employees', function ($table) {
            $table->string('state')->default('QLD');
            $table->string('region')->default('Gold Coast Region');
            $table->string('area')->default('Gold Coast South');
            $table->string('suburb')->default('Burleigh Heads');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
    
}
