<?php

use Illuminate\Database\Seeder;
use App\Comment;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comment = new Comment;
        $comment->owner_user_id = '4';
        $comment->user_id = '2';
        $comment->comment = 'Well Um Ahh';
        $comment->rating = '2';
        $comment->save();

    }
}
