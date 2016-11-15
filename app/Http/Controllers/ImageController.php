<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Config\Image;
use App\Http\Requests;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
        // $this->middleware('employee');
    }

        public function store(Request $request)
    {   
        // $this->validate($request, Image::$rules);
        $user = Auth::user();
        $file = $request->file('image');
        $filename = $user->employee->id . '.jpg';
        if ($file) {
            Storage::disk('local')->put($filename, File::get($file));
        }
        return redirect('/profile');
    }

        public function readImage($filename)
    {   
            $file = Storage::disk('local')->get($filename);
            return new Response($file, 200);
    }
}

