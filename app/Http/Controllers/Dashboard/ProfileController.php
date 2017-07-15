<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Image;
use App\User;
class ProfileController extends Controller
{
    public function index(){
        $user = Auth::user();
        return view('dashboard.profile.index', compact('user'));
    }

    public function update(Request $request){
        $user = User::find($request->get('id'));


        if($request->file('file') != null)
        {
            $dir = DIRECTORY_SEPARATOR;
            $extension = $request->file('file')->getClientOriginalExtension();
            $name = time().$request->get('name').'.'.$extension;
            $file = $request->file('file');

            Image::make($file)->resize(240, 240)->save(public_path('uploads'.$dir.'images'.$dir.'users'.$dir.$name));
            $request['image'] = $name;
        }

        $user->update($request->except('_token'));
        return redirect()->back()->with('success-message', 'Informações atualizadas com sucesso!');
    }
}
