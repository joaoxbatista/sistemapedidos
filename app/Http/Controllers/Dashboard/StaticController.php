<?php
	
	/*
	| Classe Responsável por gerênciar páginas informatívas do Painel (Dashboard)
	*/

	namespace App\Http\Controllers\Dashboard;
	use Illuminate\Http\Request;
	use App\Http\Controllers\Controller;

	class StaticController extends Controller{
		
		public function home(){
			return view('admin-dashboard.index');
		}
	}
