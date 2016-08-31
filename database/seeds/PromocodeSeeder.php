<?php

use Illuminate\Database\Seeder;
use App\Promocode;

class PromocodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $promocode = new Promocode;
        $promocode->number_of_uses = '10';
        $promocode->days = '10';
        $promocode->expiry = '2016-02-02';
        $promocode->code = "a8sf2";
        $promocode->number_of_times_used = 0;
        $promocode->save();

        $promocode = new Promocode;
        $promocode->number_of_uses = '10';
        $promocode->days = '101';
        $promocode->expiry = '22';
        $promocode->code = "a8s2222f2";
        $promocode->number_of_times_used = 0;
        $promocode->save();


    }
}
