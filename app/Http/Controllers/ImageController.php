<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class ImageController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    
}
