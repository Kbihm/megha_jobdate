<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class RequestsController extends Controller
{
    
    public function __construct() 
    {
        $this->middleware('auth');
        $this->middleware('employer');
    }


}
