<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AdminController extends Controller
{
    public function logout(){
        // destroy session
        Auth::logout();
        return redirect()->route('login');
    }
}
