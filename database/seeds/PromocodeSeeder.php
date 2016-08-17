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
        $promocode->percentage = '10';
        $promocode->days = '10';
        $promocode->expiry = '22';
        $promocode->code = "a8sf2";
        $promocode->save();

    }
}
