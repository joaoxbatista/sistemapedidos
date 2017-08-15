<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
	public function index()
	{}
	public function show(Request $request, $id)
	{}

	public function create(Request $request)
	{
		return view('dashboard.category.create');
	}
	public function store(Request $request)
	{
		$this->validate($request, [
			'name' => 'required|max:255'
		]);

		Category::create($request->except('_token'));
		return redirect()->route('products')->with('success-message', 'Categoria criada com sucesso!');
	}

	public function edit(Request $request, $id)
	{}
	public function update(Request $request)
	{}

	public function delete(Request $request, $id)
	{}
	public function destroy(Request $request)
	{}
}