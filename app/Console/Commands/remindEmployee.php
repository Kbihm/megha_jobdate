<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Joboffer;
use App\Employee;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use Auth;
use App\Email;
use Mail;

class remindEmployee extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:remindEmployee';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reminds the employee that they need to respond to a job request seven days after logging in';

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
        $date = date("Y-m-d", strtotime(date("Y-m-d", strtotime("-7 day"))));

        $joboffer = Joboffer::all();
        $joboffer = Joboffer::whereNull('status')->get();
        $employee = Employee::where('id', '=', $joobffer->employee_id)->first();
        
            /**
            * note this is a proposed change that it be 7 days from when the offer is sent ( if it is not replied to ) as opposed to 
            * from when the user logs in
            */
                foreach($joboffer as $joboffer){
                    if($joboffer->created_at < $date ){
                        $data = array(
                            'joboffer' => $joboffer,
                            );
                Mail::send('emails.remindEmployee', $data, function ($message) use ($employee) {

                $message->from('team@jobdate.com', 'JobDate');

                $message->to($employee->user->email)->subject('JobDate - You have a new job offer');
                 });
            }
        }
    }
}