<?php

namespace App\Http\Controllers;

use App;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function user($username)
    {
        $user = User::where('username','=',$username);

        if($user->count()){

            $user = $user->first();

            return view('users.profile.index',compact('user'));
        }
        return App::abort(404);


    }
}
