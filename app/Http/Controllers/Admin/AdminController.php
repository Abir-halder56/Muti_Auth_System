<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

class AdminController extends Controller
{


    
    public function dologin(Request $request){
        $request->validate([

            'email' => 'required|email|exists:admins,email',
            'password' => 'required|min:6|max:15'

        ]);
        $check = $request->only('email', 'password');
        if(Auth::guard('admin')->attempt($check)){
            return redirect()->route('admin.home')->with('success', 'Welcome to Dashboard');
        }
        else{
            
            return redirect()->back()->with('error', 'Login failed ');
        }
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect('/');

    }
}


