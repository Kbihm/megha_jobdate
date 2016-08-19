<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\News;

class NewsController extends Controller
{
    

    /**
     * Prevent any logged in accounts from interacting with Promocodes via this 
     * controller.
     */
    public function __construct()
    {
        $this->middleware('auth');
        //Prevent access from any non Admins
       // if (Auth::check() && Auth::user()->admin_id == null)
       //     return back();
    }

    public function index()
    {
        $news = News::all();
        return view('news.index', compact('news'));
    }

    public function show($id)
    {

        $new = News::find($id);
        return view('news.show', compact('new'));
    }

    public function create()
    {
        return view('news.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, News::$rules);
        $new = New News($request->all());
        $new->save();
        return redirect()->action('NewsController@index');
    }

    public function update($id, Request $request)
    {
        $this->validate($request, News::$rules);
       
        $new = News::find($id);
        $new->update($request->all());
        $new->save();
        return redirect()->action('NewsController@index');            
    }

    public function destroy($id)
    {

        $new = News::find($id);
        $new->delete();
        return redirect()->action('NewsController@index'); 
    }



}
