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

        $business_setting = BusinessSettings::where('user_id', $userId)->first();
    	return response()->json($business_setting);
    }

    public function update(Request $request)
    {
        $userId = Auth::user()->id;
        $business_setting = BusinessSettings::where('user_id', $userId)->first();

        $data = $request->all();
        $business_setting->update($data);
        return response()->json($business_setting);
    }
}
