<?php

namespace App\Http\Controllers\Seller;

use Illuminate\Http\Request;
use  App\Http\Controllers\Controller;
use App\Models\Product;
use Auth;

class SellerController extends Controller
{
   public function index()
   {
    
       return view('seller-dashboard.home');
   }

   public function profile()
   {
       $seller = Auth::user();
       return view('seller-dashboard.profile.index', compact('seller'));
   }

}
