<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Validator;
use Response;
use Redirect;
use Session;
use App\Accounts;
use App\Meats;
use App\Commodity;
use App\Code;
use App\Cut;
use App\Country;



class AdminController extends Controller
{
    public function register(){

        return view('admin.register');
    }

    public function show_com(){
        $coms = DB::table('commodities')->select('id','kind')->get();

        return view('admin.edit-commodity', compact('coms'));
    }

    public function add_com(Request $request){
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
        $id = Commodity::where('id', $id)->first();
        if(!$id){
            return 'Sorry';
        }
            return view('admin.update-commodity', compact('id'));
    }

    public function update_com(Request $request, $id){
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
        $com_del = Commodity::where('id', $id)->delete();

            $args = array('delete' => '');
            return redirect()->back()->with($args);

    }

    public function show_hscode(){
        $codes = DB::table('codes')->select('id','hscode')->get();

            return view('admin.edit-hscode', compact('codes'));
    }

    public function add_hscode(Request $request){
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
        $id = Code::where('id', $id)->first();
        if(!$id){
            return 'Sorry';
        }
            return view('admin.update-hscode', compact('id'));
    }
    public function update_hscode(Request $request, $id){
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
        $del_code = Code::where('id',$id)->delete();

            $args = array('delete' => '');
            return redirect()->back()->with($args);
    }

    public function show_cut(){
        $cuts = DB::table('cuts')->select('id','cut_type')->get();

            return view('admin.edit-cut', compact('cuts'));
    }

    public function add_cut(Request $request){
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
        $id = Cut::where('id', $id)->first();
        if(!$id){
            return 'Sorry';
        }
            return view('admin.update-cut_type', compact('id'));
    }
    public function update_cut(Request $request, $id){
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
        $del_cut = Cut::where('id',$id)->delete();

            $args = array('delete' => '');
            return redirect()->back()->with($args);
    }


    public function show_options(){

        $kinds      = DB::table('commodities')->select('kind')->get();
        $cut_types  = DB::table('cuts')->select('cut_type')->get();
        $codes      = DB::table('codes')->select('hscode')->get();
        $countrys   = DB::table('countries')->select('country')->get();

        return view('admin.add-meatcuts', compact('kinds','cut_types','codes','countrys'));
    }

    public function show_meat(){

        $meats = DB::table('meat_cuts')->select('kind','cut_type','hscode','name_number','remarks','country')->groupBy('hscode')->get();

        return view('admin.show-meat' , compact('meats'));
    }

    public function view_meat($code){

        $code      = Hash::check('plain-text',$code);
        $meat_cuts = Meats::where('hscode', $code)->get();

        return view('admin.view-meat', compact('meat_cuts'))->with('hscode',$code);
    }

    public function add_admin(Request $request){
    	$this->validate($request, [
    		'last'    => 'required | min:2 | max:20 | regex:/^[A-Za-z\s-_]+$/',
    		'first'   => 'required | min:2 | max:20 | regex:/^[A-Za-z\s-_]+$/',
    		'middle'  => 'required | min:2 | max:20 | regex:/^[A-Za-z\s-_]+$/',
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

    	       $member             = new Accounts();
    	       $member->lastname   = $last;
    	       $member->firstname  = $first;
    	       $member->middlename = $middle;
    	       $member->username   = $user;
    	       $member->password   = $pass;
    	       $member->role       = $role;

    	       $member->save();

                $args = array('info' =>'');
    	       return redirect()->back()->with($args);

    }

    public function add_meats(Request $request){
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


    }

    public function delete_meat(Request $request, $id){
        $del = Meats::where('id', $id)->delete();

        return redirect()->back();
    }

    public function update_meatcut($id){
        $id = Meats::where('id', $id)->first();
        if(!$id){
            return 'Sorry';
        }
        return view('admin.update-meat', compact('id'));
    }

    public function update_meat(Request $request, $id){

        $meats = Meats::where('id', $id)->update([

            'kind'        => $request['kind'],
            'cut_type'    => $request['cut'],
            'hscode'      => $request['code'],
            'name_number' => $request['name'],
            'remarks'     => $request['rema'],
            'country'     => $request['coun']
            ]);
    }
}
