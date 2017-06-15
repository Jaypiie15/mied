<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Support\Facades\Lang;
use Session;

class AuthController extends Controller   
{
    use ThrottlesLogins;



    public function login(){
        if(Auth::check() ){
            if(Auth::user()->role == '0'){
                return redirect()->intended('/admin/dashboard');
             }
                return redirect()->intended('auth/main'); 

        }else{
             return view('auth.login');
        }
    }
        public function after_login(Request $request){

        $this->validate($request, [
                'username' => 'required', 
                'password' => 'required'
                
            ]);

        $username = $request['username'];
        $password = $request['password'];
        $status   = 'activated';
        

        if($this->hasTooManyLoginAttempts($request)){
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }


        if(Auth::attempt(['username'=> $username, 'password'=> $password, 'status'=> $status])){
            $request->session()->regenerate();
            $this->clearLoginAttempts($request);

             if(Auth::user()->role == '0'){
                $args = array('role' => 'admin');
                return response()->json($args);
             }
            elseif(Auth::user()->role == '1'){
                $args = array('role' => 'user');
                return response()->json($args);
             }
                
        }else{
            $this->incrementLoginAttempts($request);
            $args = array('role' => 'error');
                return response()->json($args);
            
        }

        
    }


    public function username()
    {
        return 'username';
    }


    public function logout(Request $request){
        Auth::logout();

        $request->session()->flush();

        $request->session()->regenerate();

        return redirect('/');
    }


}
