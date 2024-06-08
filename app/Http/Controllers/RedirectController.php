<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class RedirectController extends Controller
{
    //
    public function controlPanel(){
        if(Auth::user()->role_id == 2){
            return redirect()->route('Admin Dashboard');
        }
        else{
            return redirect()->route('dashboard');
        }
    }

  
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
        }
}
