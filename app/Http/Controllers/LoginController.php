<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    // Level 0 == Admin
    // Level 1 == Superadmin

    public function index(){

        $user = Auth::user();
        if($user->level == 0){
            return redirect()->route('admin.dashboard');
        }
        if($user->level == 1){
            return redirect()->route('superadmin.dashboard');
        }
    }

    public function admin(){
        return view('admin.dashboard');
    }

    public function superadmin(){
        return view('superadmin.dashboard');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
