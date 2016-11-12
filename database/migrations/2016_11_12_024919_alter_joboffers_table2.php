<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterJoboffersTable2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //this is for adding a 'review left' field so employers cannot review employees twice.
    public function up()
    {
            Schema::table('joboffers', function ($table) {
            $table->boolean('review_left')->default(false);
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
