<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BannedAccountsController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function ban($id) {
        $banned = new Banned;
        $banned->id = $id;
        $banned->save();
        return redirect('/admin/user/'.$id);
    }

    public function unban($id) {
        $banned = Banned::find($id);
        $banned->delete();
        return redirect('/admin/user/'.$id);
    }


}
