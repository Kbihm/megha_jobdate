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
        $data = [''];
        Mail::send('emails.welcome', $data, function ($message) {

            $message->from('team@jobdate.com', 'JobDate');

            $message->to('liam.a.southwell@gmail.com')->subject('JobDate - Sent Job Request');

        });
    }
}