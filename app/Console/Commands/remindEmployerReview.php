<?php

namespace App\Console\Commands;
use App\Joboffer;
use App\Employee;
use App\Employer;
use Illuminate\Console\Command;
use App\Email;
use Mail;

class remindEmployerReview extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:remindEmployerReview';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remind and employer  to review';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $date = date("Y-m-d");
        $joboffer = Joboffer::where('status', '=', 'accepted')->get();
        foreach($joboffer as $job){

            if($job->date < $date && $job->reminded_employer != 1){
                $employer = Employer::where('id', '=', $job->employer_id)->first();
                $employee = Employee::where('id', '=', $job->employee_id)->first();
                        $data = array(
                                'joboffer' => $job,
                                'employee' => $employee,
                                'employer' => $employer,

                                );
                Mail::send('emails.remindEmployerReview', $data, function ($message) use ($employer) {

                $message->from('team@jobdate.com', 'JobDate');
                $message->to($employer->user->email)->subject('JobDate - Dont forget to leave a review!');
                        });
                $job->reminded_employer = 1;
                $job->save();
                }
        }
    }
}
