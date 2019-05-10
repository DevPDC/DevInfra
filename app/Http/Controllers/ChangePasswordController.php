<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\User;

class ChangePasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function updatePassword(Request $request)
    {
        $current = Hash::check($request->current_password);
        
        if(Auth::user()->password != $current)
        {
            $user = User::find(Auth::user()->id);

            $user->password = Hash::make($current);

            $use->save();

            Session::flash('success','Your Password has been changed!');

            return back();
        }   
        else if(Auth::user()->password == $current)
        {
            Session::flash('error','New and Current Password must not be identical!');

            return back();
        }
    }
}
