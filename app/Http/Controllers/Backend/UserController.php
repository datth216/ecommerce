<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function usersAll(){
        $user = User::all();
        return view('backend.user.all_user', compact('user'));
    }
}
