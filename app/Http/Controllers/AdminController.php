<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Validator;
use Response;
use Redirect;
use Session;
use App\User;
use App\Meats;
use App\Commodity;
use App\Code;
use App\Cut;
use App\Country;
use App\Dot;



class AdminController extends Controller
{

    public function checkUser(){
        if(Auth::check()){
            if(Auth::user()->role != '0'){
            return redirect()->intended('/');
            }
        }else{
            return redirect()->intended('/');
        }
    }


    public function register(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        return view('admin.register');
    }

    public function show_com(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $coms = DB::table('commodities')->select('id','kind')->get();

        return view('admin.edit-commodity', compact('coms'));
    }

    public function add_com(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request, [
            'commodity' => 'required | min:2'
            ]);

        $commodity = $request['commodity'];

        $com       = new Commodity();
        $com->kind = $commodity;
        

        $com->save();


        $args = array('add'=>'');
        return redirect()->back()->with($args);

    }

    public function view_com($id){

        if($this->checkUser()){
            return $this->checkUser();
        }
        $id = Crypt::decrypt($id);
        $coms = Commodity::where('id', $id)->first();
        if(!$id){
            return 'Sorry';
        }
            return view('admin.update-commodity', compact('coms'));
    }

    public function update_com(Request $request, $id){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request, [
            'commodity' => 'required | min:2'
            ]);

        $com = Commodity::where('id',$id)->update([
            'kind' => $request['commodity']
            ]);

            $args = array('update' => '');
            return redirect()->back()->with($args);
    }

    public function delete_com(Request $request, $id){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $com_del = Commodity::where('id', $id)->delete();

            $args = array('delete' => '');
            return redirect()->back()->with($args);

    }

    public function show_hscode(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $codes = DB::table('codes')->select('id','hscode')->get();

            return view('admin.edit-hscode', compact('codes'));
    }

    public function add_hscode(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request,[
            'code' => 'required | min:2'
            ]);

            $code = $request['code'];

            $hscode = new Code();
            $hscode->hscode = $code;

            $hscode->save();

            $args = array('add' => '');
            return redirect()->back()->with($args);
    }
    public function view_hscode($id){

        if($this->checkUser()){
            return $this->checkUser();
        }
        $id = Crypt::decrypt($id);
        $codes = Code::where('id', $id)->first();
        if(!$id){
            return 'Sorry';
        }
            return view('admin.update-hscode', compact('codes'));
    }
    public function update_hscode(Request $request, $id){

        if($this->checkUser()){
            return $this->checkUser();
        }

            $this->validate($request, [
            'code' => 'required | min:2'
            ]);

        $code = Code::where('id',$id)->update([
            'hscode' => $request['code']
            ]);

            $args = array('update' => '');
            return redirect()->back()->with($args);
    }

    public function delete_hscode($id){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $del_code = Code::where('id',$id)->delete();

            $args = array('delete' => '');
            return redirect()->back()->with($args);
    }

    public function show_cut(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $cuts = DB::table('cuts')->select('id','cut_type')->get();

            return view('admin.edit-cut', compact('cuts'));
    }

    public function add_cut(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request,[
            'cut' => 'required | min:2'
            ]);

            $cut = $request['cut'];

            $cut_type = new Cut();
            $cut_type->cut_type = $cut;

            $cut_type->save();

            $args = array('add' => '');
            return redirect()->back()->with($args);
    }
    public function view_cut($id){

        if($this->checkUser()){
            return $this->checkUser();
        }
        $id = Crypt::decrypt($id);
        $cuts = Cut::where('id', $id)->first();
        if(!$id){
            return 'Sorry';
        }
            return view('admin.update-cut_type', compact('cuts'));
    }
    public function update_cut(Request $request, $id){

        if($this->checkUser()){
            return $this->checkUser();
        }

            $this->validate($request, [
            'cut' => 'required | min:2'
            ]);

        $cut = Cut::where('id',$id)->update([
            'cut_type' => $request['cut']
            ]);

            $args = array('update' => '');
            return redirect()->back()->with($args);
    }

    public function delete_cut($id){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $del_cut = Cut::where('id',$id)->delete();

            $args = array('delete' => '');
            return redirect()->back()->with($args);
    }

    public function show_country(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $countrys = DB::table('countries')->select('id','country')->get();

            return view('admin.edit-country', compact('countrys'));
    }

    public function add_country(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request,[
            'country' => 'required | min:2'
            ]);

            $coun = $request['country'];

            $country = new Country();
            $country->country = $coun;

            $country->save();

            $args = array('add' => '');
            return redirect()->back()->with($args);
    }
    public function view_country($id){

        if($this->checkUser()){
            return $this->checkUser();
        }
        $id = Crypt::decrypt($id);
        $couns = Country::where('id', $id)->first();
        if(!$id){
            return 'Sorry';
        }
            return view('admin.update-country', compact('couns'));
    }
    public function update_country(Request $request, $id){

        if($this->checkUser()){
            return $this->checkUser();
        }

            $this->validate($request, [
            'country' => 'required | min:2'
            ]);

        $country = Country::where('id',$id)->update([
            'country' => $request['country']
            ]);

            $args = array('update' => '');
            return redirect()->back()->with($args);
    }

    public function delete_country($id){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $del_country = Country::where('id',$id)->delete();

            $args = array('delete' => '');
            return redirect()->back()->with($args);
    }

    public function show_dots(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $dots = DB::table('dots')->select('id','question','answer')->get();

            return view('admin.edit-dots', compact('dots'));
    }

    public function add_dots(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request,[
            'question' => 'required | min:2',
            'answer' => 'required | min:2'
            ]);

            $que = $request['question'];
            $ans = $request['answer'];

            $country = new Dot();
            $country->question = $que;
            $country->answer   = $ans;

            $country->save();

            $args = array('add' => '');
            return redirect()->back()->with($args);
    }
    public function view_dots($id){

        if($this->checkUser()){
            return $this->checkUser();
        }
        $id = Crypt::decrypt($id);
        $dots = Dot::where('id', $id)->first();
        if(!$id){
            return 'Sorry';
        }
            return view('admin.update-dots', compact('dots'));
    }
    public function update_dots(Request $request, $id){

        if($this->checkUser()){
            return $this->checkUser();
        }

            $this->validate($request, [
            'question' => 'required | min:2',
            'answer' => 'required | min:2'
            ]);

        $country = Dot::where('id',$id)->update([
            'question' => $request['question'],
            'answer' => $request['answer']
            ]);

            $args = array('update' => '');
            return redirect()->back()->with($args);
    }

    public function delete_dots($id){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $del_country = Dot::where('id',$id)->delete();

            $args = array('delete' => '');
            return redirect()->back()->with($args);
    }

    public function show_options(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $kinds      = DB::table('commodities')->select('kind')->get();
        $cut_types  = DB::table('cuts')->select('cut_type')->get();
        $codes      = DB::table('codes')->select('hscode')->get();
        $countrys   = DB::table('countries')->select('country')->get();

        return view('admin.add-meatcuts', compact('kinds','cut_types','codes','countrys'));
    }

    public function show_meat(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $meats = DB::table('meat_cuts')->select('kind','cut_type','hscode','name_number','remarks','country')->groupBy('hscode')->get();

        return view('admin.show-meat' , compact('meats'));
    }

    public function view_meat($code){

        if($this->checkUser()){
            return $this->checkUser();
        }
        $code = Crypt::decrypt($code);
        $meat_cuts = Meats::where('hscode', $code)->get();

        return view('admin.view-meat', compact('meat_cuts'))->with('hscode',$code);
    }

    public function add_admin(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

    	$this->validate($request, [
    		'last'    => 'required | min:2 | max:20 | regex:/^[a-zA-Z ]+$/',
    		'first'   => 'required | min:2 | max:20 | regex:/^[a-zA-Z ]+$/',
    		'middle'  => 'required | min:2 | max:20 | regex:/^[a-zA-Z ]+$/',
    		'user'    => 'required | min:2',
    		'pass'    => 'required | min:6 | max:8',
    		'cpass'   => 'required | same:pass',
    		'role'    => 'required'
    		]);

    		$last    = $request['last'];
    		$first   = $request['first'];
    		$middle  = $request['middle'];
    		$user    = $request['user'];
    		$pass    = bcrypt($request['pass']);
    		$role    = $request['role'];
            $status  = 'activated';
            $res     = Auth::user()->firstname;

    	       $member             = new User();
    	       $member->lastname   = $last;
    	       $member->firstname  = $first;
    	       $member->middlename = $middle;
    	       $member->username   = $user;
    	       $member->password   = $pass;
    	       $member->role       = $role;
               $member->status     = $status;
               $member->responsible = $res;

    	       $member->save();

                $args = array('info' =>'');
    	       return redirect()->back()->with($args);

    }

    public function add_meats(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request, [
            'commodity' => 'required',
            'type'      => 'required',
            'code'      => 'required',
            'number'    => 'required',
            'remarks'   => 'required',
            'country'   => 'required'
            
            ]);
                    
    	$files        = Input::file('images');
    	$file_count   = count($files);
    	$upload_count = 0;

    	foreach($files as $file){
    		$rules     = array('file' => 'required');
    		$validator = Validator::make(array('file'=> $file), $rules);

    		if($validator->passes()){
    			$destinationPath = 'resources/views/images/';
    			$filename        = $file->getClientOriginalName();
    			$upload_success  = $file->move($destinationPath, $filename);
                
    			$upload_count ++;



    		      $meat = new Meats();
    		      $meat->kind        = $request['commodity'];
    		      $meat->cut_type    = $request['type'];
    		      $meat->hscode      = $request['code'];
    		      $meat->name_number = $request['number'];
    		      $meat->remarks     = $request['remarks'];
    		      $meat->country     = $request['country'];
    		      $meat->image       = $destinationPath.''.$filename;

    		      $meat->save();

                
                

    		}
    	}

                 $args = array('save' => '');
                return redirect()->back()->with($args);
    }

    public function delete_meat(Request $request, $id){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $del = Meats::where('id', $id)->delete();

        $args = array('delete' => '');
        return redirect()->back()->with($args);
    }

    public function update_meatcut($id){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $id = Meats::where('id', $id)->first();
        if(!$id){
            return 'Sorry';
        }
        return view('admin.update-meat', compact('id'));
    }

    public function update_meat(Request $request, $id){

        if($this->checkUser()){
            return $this->checkUser();
        }
        
        $this->validate($request, [
            'kind' => 'required',
            'cut' => 'required',
            'code' => 'required',
            'name' => 'required',
            'rema' => 'required',
            'coun' => 'required',
            ]);

        $meats = Meats::where('id', $id)->update([

            'kind'        => $request['kind'],
            'cut_type'    => $request['cut'],
            'hscode'      => $request['code'],
            'name_number' => $request['name'],
            'remarks'     => $request['rema'],
            'country'     => $request['coun']
            ]);

            $args = array('update' => '');
            return redirect()->back()->with($args);

    }

    public function count(){

         if($this->checkUser()){
            return $this->checkUser();
        }
        $count_kinds = DB::table('commodities')->select('kind')->count();
        $count_types = DB::table('cuts')->select('cut_type')->count();
        $count_code  = DB::table('codes')->select('hscode')->count();
        $count_coun  = DB::table('countries')->select('country')->count();
        $count_meats = DB::table('meat_cuts')->count();
        $count_dots  = DB::table('dots')->select('question','answer')->count();
        $count_admins = DB::table('users')->select('role')->where('role', '0')->count();
        $count_users = DB::table('users')->select('role')->where('role', '1')->count();
        $count_active = DB::table('users')->select('status')->where('status', 'activated')->count();
        $count_inactive = DB::table('users')->select('status')->where('status', '0')->count();


            return view('admin.dashboard', compact('count_kinds','count_types','count_code','count_coun','count_meats','count_dots','count_admins','count_users','count_active','count_inactive'));        
    }

    public function show_users(){

        $users = DB::table('users')->select('id','lastname','firstname','middlename','username','role','status')->get();

            return view('admin.users', compact('users'));
    }

    public function edit_users($id){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $id = User::where('id', $id)->first();
        if(!$id){
            return 'Sorry';
        }
            return view('admin.edit-users', compact('id'));
    }
    public function update_users(Request $request, $id){

        if($this->checkUser()){
            return $this->checkUser();
        }

            $this->validate($request, [
            'lastname' => 'required | min:2',
            'firstname' => 'required | min:2',
            'middlename' => 'required | min:2',
            'username' => 'required | min:2',
            'status' => 'required'
            ]);

        $country = User::where('id',$id)->update([
            'lastname' => $request['lastname'],
            'firstname' => $request['firstname'],
            'middlename' => $request['middlename'],
            'username' => $request['username'],
            'status' => $request['status']
            ]);

            $args = array('update' => '');
            return redirect()->back()->with($args);
    }
}
