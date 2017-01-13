<?php

namespace App\Http\Controllers;

use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use App\Avatar;

class PerfilController extends Controller
{
    //
    public function index(){
        $user = Auth::user();

        $userId = Auth::user()->id;

        $avatarId = User::findOrFail($userId)->avatar_id;

        $avatarName = Avatar::findOrFail($avatarId)->name;

        return view('admin.users.profile', ['user' => $user, 'avatar' => $avatarName]);
    }

    public function store(Request $request){

        $image = $request->file('file');

        $imageName = time() . ".". $image->getClientOriginalExtension();

        Image::make($image)->resize(200,200)->save(public_path('uploads/avatars/' . $imageName));

        $imageCreated = Avatar::create(['name' => $imageName]);

        $user = User::findOrFail(Auth::user()->id);

        if($user->avatar_id != 0){
            $avatar = Avatar::findOrFail($user->avatar_id);
            unlink(public_path('uploads/avatars/' . $avatar->name ));
            $avatar->delete();
        }

        $user->avatar_id = $imageCreated->id;

        $user->update();




        return redirect('/perfil');


    }
}
