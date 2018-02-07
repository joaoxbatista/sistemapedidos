<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
	public function index()
	{
		$categories = Category::orderBy('id', 'desc')->get();
		return view('admin-dashboard.stock.category.index', compact('categories'));
	}
	
	public function create(Request $request)
	{
		return view('dashboard.category.create');
	}

	public function store(Request $request)
	{
		
		try {
            Category::create($request->except('_token'));
            
        } catch (Exception $e) {
            return response()->json($e);
        }

	}

	public function update(Request $request)
	{
		$category = Category::find($request->get('id'));
        $category->update($request->except(['_token', 'id']));
        return response()->json($category, 200); 
	}

	public function destroy(Request $request)
	{
		$category = Category::find($request->get('id'));
		$category->delete();
	}

	public function json(){
		$categories = Category::orderBy('id', 'desc')->get();
        return response()->json($categories, 200);
	}
}