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

        $verification = new Verification();
        $verification->hash = str_random(8);
        $verification->user_id = $id;
        $verification->save();

                $data = array(
            'verification' => $verification
            );

        Mail::send('emails.verify', $data, function ($message) use ($user) {
            $message->from('team@jobdate.com', 'JobDate');

            $message->to($user->email)->subject('JobDate - Verify Your Account');

        });
                    
        return redirect('email/signUp/'.$user->id);
    }

        public function destroy($link)
    {
        $user = Auth::user();
        $verification = Verification::where('user_id', '=', $user->id)->first();
        if($verification->hash == $link){
        $user->email_verified = TRUE;
        $user->save();
        $verification->delete();
        return redirect('/profile');
        }
    }
}
