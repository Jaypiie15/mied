<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function main(){
    	return view('auth.login');
    }

    public function register(){
    	return view('admin.register');
    }

    public function add_meatcuts(){
    	return view('admin.add-meatcuts');
    }
}
