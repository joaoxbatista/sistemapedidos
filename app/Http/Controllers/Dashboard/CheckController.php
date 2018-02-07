<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckController extends Controller
{

	public function create($id)
	{
		
		return view('dashboard.check.create', compact('id'));
	}

	public function store(Request $request)
	{
		dd($request->all());
	}

	public function remove()
	{
		return view('dashboard.check.remove');	
	}

	public function confirm()
	{
		
	}


}
