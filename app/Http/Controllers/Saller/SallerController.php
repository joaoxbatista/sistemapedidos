<?php

namespace App\Http\Controllers\Saller;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use Auth;

class SallerController extends Controller
{
   public function index()
   {
       return view('saller-dashboard.home');
   }

   public function profile()
   {
       $saller = Auth::user();
       return view('saller-dashboard.profile.index', compact('saller'));
   }

}
