<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bank;

class BankController extends Controller
{
	public function json()
    {
        $banks = Bank::orderBy('name')->get();
        return response()->json($banks, 200);
    }
}