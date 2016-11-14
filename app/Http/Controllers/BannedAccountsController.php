<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Banned;

class BannedAccountsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function ban($id) {
        $banned = new Banned;
        $banned->user_id = $id;
        $banned->save();

        return redirect('/admin/user/'.$id);
    }

    public function unban($id) {
        $banned = Banned::where('user_id', $id)->first();
        if (sizeOf($banned) == 0)
            return back();
        $banned->delete();

        return redirect('/admin/user/'.$id);
    }


}
