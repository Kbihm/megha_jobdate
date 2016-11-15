<?php

use Illuminate\Database\Seeder;
use App\Comment;
use App\Employee;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        // Rating 
        // 1 = Negative
        // 2 = Neutral
        // 3 = Positive

        $comment = new Comment;
        $comment->employee_id = 1;
        $comment->employer_id = 1;
        $comment->comment = 'Poor performance all around, terrible work ethic.';
        $comment->rating = 2;
        $comment->approved = true;
        $comment->save();

        $comment = new Comment;
        $comment->employee_id = 1;
        $comment->employer_id = 1;
        $comment->comment = 'Medicore at Best.';
        $comment->rating = 2;
        $comment->save();

        $comment = new Comment;
        $comment->employee_id = 1;
        $comment->employer_id = 1;
        $comment->comment = 'Sub Par Performance!';
        $comment->rating = 1;
        $comment->approved = true;
        $comment->save();

        $comment = new Comment;
        $comment->employee_id = 1;
        $comment->employer_id = 1;
        $comment->comment = 'Awesome Performance!';
        $comment->rating = 3;
        $comment->approved = true;
        $comment->save();

        // $employee = Employee::find(1);
        // $employee->calc_rating();

        $comment = new Comment;
        $comment->employee_id = 2;
        $comment->employer_id = 1;
        $comment->comment = 'Awesome Performance!';
        $comment->rating = 3;
        $comment->approved = true;
        $comment->save();

        // $employee = Employee::find($comment->employee_id);
        // $employee->calc_rating();

    }
}
