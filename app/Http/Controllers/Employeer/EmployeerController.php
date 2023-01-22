<?php

namespace App\Http\Controllers\Employeer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Employeer;
use Illuminate\Support\Facades\Auth;

use Illuminate\Contracts\Auth\Authenticatable;

class EmployeerController extends Controller
{
    public function dologin(Request $request){
        dd($request->all());

        $request->validate([
            

            'email' => 'required|email|exists:employeers,email',
            'password' => 'required|min:6|max:15'

        ]);
        $check = $request->only('email', 'password');
        if(Auth::guard('employee')->attempt($check)){
            return redirect()->route('employee.home')->with('success', 'Welcome to Dashboard');
        }
        else{
            
            return redirect()->back()->with('error', 'Login failed ');
        }
    }

    public function logout(){
        Auth::guard('employee')->logout();
        return redirect('/');

    }
}