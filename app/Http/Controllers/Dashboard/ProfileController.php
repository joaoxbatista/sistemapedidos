<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('dashboard.profile.index', compact('user'));
    }
}
