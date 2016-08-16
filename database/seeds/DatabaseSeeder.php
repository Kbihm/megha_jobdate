<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(NewsSeeder::class);
        $this->call(PromocodeSeeder::class);
        $this->call(SettingSeeder::class);
    }
}
