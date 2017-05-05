<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use App\User;
use App\Meats;

class UserController extends Controller
{

	public function checkUser(){
        if(Auth::check()){
            if(Auth::user()->role != '1'){
            return redirect()->intended('/');
            }
        }else{
            return redirect()->intended('/');
        }
    }

    public function main(){

    	 if($this->checkUser()){
            return $this->checkUser();
        }
    	$meatss = DB::table('meat_cuts')->select('kind','cut_type','hscode','name_number','remarks','country')->groupBy('hscode')->get();

    		return view('auth.main', compact('meatss'));
    }

    public function view_meat($code){

         if($this->checkUser()){
            return $this->checkUser();
        }
        $code = Crypt::decrypt($code);
        $meat_cuts = Meats::where('hscode',$code)->get();

        	return view('auth.view-meat', compact('meat_cuts'))->with('hscode', $code);
    }

    public function show_dots(){
        if($this->checkUser()){
            return $this->checkUser();
        }

        $dots = DB::table('dots')->select('id','question','answer')->get();

            return view('auth.show-dots', compact('dots'));
        }

        public function print_meat($id){

        if($this->checkUser()){
            return $this->checkUser();
        }
        $id = Crypt::decrypt($id);
        $print = Meats::where('id', $id)->first();
        if(!$print){
            return 'Sorry';
        }
        return view('auth.print-meat', compact('print'));
    }

    public function print_all($code){
        
        if($this->checkUser()){
            return $this->checkUser();
        }
        $code = Crypt::decrypt($code);
        $meat_cuts = DB::table('meat_cuts')->select('kind','cut_type','hscode','name_number','remarks','country','image')->where('show','1')->where('hscode',$code)->get();

        return view('auth.print-all' , compact('meat_cuts'));
    }

}
