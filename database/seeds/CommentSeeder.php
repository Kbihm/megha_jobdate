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
        $comment->employee_id = 1;
        $comment->employer_id = 1;
        $comment->comment = 'Well Um Ahh';
        $comment->rating = '2';
        $comment->save();

        $comment = new Comment;
        $comment->employee_id = 1;
        $comment->employer_id = 1;
        $comment->comment = 'Sub Par Performance!';
        $comment->rating = 1;
        $comment->approved = true;
        $comment->save();

    }
}
