<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Http\Controllers\Joboffer;
use App\Http\Controllers\Employee;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\User;
use Auth;
use App\Email;
use Mail;

class remindEmployerSubscription extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:remindEmployerSubscription';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify any employers with a sub that ends soon';

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
                $date = date("Y-M-D");
        $employers = Employer::all();
        foreach($employers as $employer){
            $sub_end = explode('-', $employer->subscription_end);
            $sub_end = $sub_end[0] . '-' . $sub_end[2] . '-' . $sub_end[1];
            $sub_end = strtotime($sub_end);
            $diff = $sub_end - strtotime($date);
            $diff = $diff/60/60/24;
            if($diff < 32){
               
                        $data = array(
                            'user' => Auth::user(),
                            );

                        Mail::send('emails.remindSub', $data, function ($message) {

                            $message->from('team@jobdate.com', 'JobDate');

                            $message->to($employer->user->email)->subject('JobDate - Subscription Renewal Soon');

                        });
                            }

        }
        //be sure to handle this. check employer subscription date
    }
}
