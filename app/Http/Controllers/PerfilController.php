<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;

class PerfilController extends Controller
{
    //
    public function show(){
        $user = Auth::user();

        return view('admin.users.profile', ['user' => $user]);
    }
}
