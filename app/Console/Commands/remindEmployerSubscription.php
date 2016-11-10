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
        $date = date("Y-m-d");
        $employers = Employer::all();
        //be sure to handle this. check employer subscription date
    }
}
