<?php

namespace App\Http\Controllers;

use Mail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests;
use Auth;
use App\Verification;
use App\User;

class VerificationController extends Controller
{
        public function store($id)
    {   
        $user = User::where('id', '=', $id)->first();
        $prevers = Verification::where('user_id', '=', $user->id)->get();
        foreach($prevers as $pre){
            $pre->delete();
        }
         if(Auth::user()->employee->id == $user->employee->id){
        $verification = new Verification();
        $verification->hash = str_random(8);
        $verification->user_id = $id;
        $verification->save();

                $data = array(
            'verification' => $verification,
            'user' => $user
            );

        Mail::send('emails.verify', $data, function ($message) use ($user) {
            $message->from('team@jobdate.com', 'JobDate');

            $message->to($user->email)->subject('JobDate - Verify Your Account');

        });
         }            
        return redirect('home');
    }

        public function destroy($link)
    {
        if(Auth::check()){
        $user = Auth::user();
        $verification = Verification::where('user_id', '=', $user->id)->first();
        if($verification->hash == $link){
            $employee = $user->employee;
            $employee->email_confirmed = 1;
            $employee->save();
        $user->email_verified = TRUE;
        $user->save();
        $verification->delete();
        return redirect('email/signUp/'.$user->id);
        }
        }
        else return redirect('/');
    }
}
