<?php

use Illuminate\Database\Seeder;
use App\Settings;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $setting = new Settings;
        $setting->sub_days = 30;
        $setting->sub_price = 29.99;
        $setting->support_email = "support@jobdate.com.au";
        $setting->dispute_email = "support@jobdate.com.au";
        $setting->employee_registration_blocked = false;
        $setting->save();

    }
}
