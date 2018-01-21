<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BusinessSettings;
use Auth;
use App\User;
class BusinessSettingController extends Controller
{
    public function index()
    {
    	return view('admin-dashboard/business_settings/index');
    }

    public function json(Request $request)
    {
    	$userId = Auth::user()->id;

    	$user = User::find($userId);

        $result = $user->business_setting != null ? $user->business_setting : null;

    	return response()->json($result);
    }
}
