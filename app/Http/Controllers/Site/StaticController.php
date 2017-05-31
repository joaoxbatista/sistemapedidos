<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StaticController extends Controller
{
    
    public function home(){
    	return view('static.home');
    }

    public function about(){
    	return view('static.about');
    }
}
