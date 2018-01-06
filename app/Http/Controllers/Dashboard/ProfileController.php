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
        return view('admin-dashboard.profile.index', compact('user'));
    }

    public function update(Request $request){
        $user = User::find($request->get('id'));


        if($request->file('file') != null)
        {
            $dir = DIRECTORY_SEPARATOR;
            $extension = $request->file('file')->getClientOriginalExtension();
            $name = time().'.'.$extension;
            $file = $request->file('file');

            $path_image = 'uploads'.$dir.'images'.$dir.'users'.$dir.$name;
            
            Image::make($file)->resize(140, 140)->save(public_path($path_image));
            $request['image'] = $name;
        }

        $user->update($request->except('_token'));
        return redirect()->back()->with('success-message', 'Informações atualizadas com sucesso!');
    }
}
