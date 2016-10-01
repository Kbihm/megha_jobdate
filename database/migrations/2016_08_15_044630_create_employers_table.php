<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->nullable();
            $table->string('abn');
            $table->string('address');
            $table->string('promo_code')->nullable();
            $table->string('phone');
            $table->string('establishment_name');
            $table->datetime('subscription_end');
            $table->boolean('email_confirmed')->default(false);
            // $table->boolean('subscription_active')->default(false);
            
            // GET STRIPE DATA


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
        Schema::drop('employers');
    }
}
