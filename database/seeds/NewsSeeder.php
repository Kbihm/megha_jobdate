<?php

use Illuminate\Database\Seeder;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            $news = new News;
        $news->title = 'Test Post';
        $news->message = 'Hola comment ca, konichiwa, pardon mon francais, bonjour madame';
        $news->save();
    }
}
