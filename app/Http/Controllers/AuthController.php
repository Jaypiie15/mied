<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function main(){
    	if(!Auth::check()){
    		return view('auth.login');
    	}
    		return view('auth.main');
    }
}
