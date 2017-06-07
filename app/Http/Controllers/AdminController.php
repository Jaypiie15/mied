<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Carbon\Carbon;
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
use App\Fme;
use App\Faq;


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

    public function show_com(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        return view('admin.edit-commodity');
    }

    public function com_tbl(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $coms = DB::table('commodities')->select('id','kind','show')->where('show', '1')->get();

        return view('admin.show-com', compact('coms'));
    }

    public function add_com(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request, [
            'commodity' => 'required | min:2'
            ]);

        $commodity = $request['commodity'];
        $check = Commodity::where('kind', $commodity)->where('show','1')->exists();

        if($check){

            return response()->json(['error' => 'error']);

        }

        $com       = new Commodity();
        $com->kind = ucfirst($commodity);
        $com->responsible = Auth::user()->firstname;
        $com->show = '1';
        

        $com->save();
        $args = array('save' => 'save');
        return response()->json($args);

    }

    public function view_com(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }
        
        if($request->ajax())
        {
            return response(Commodity::find($request->id));
        }
    }

    public function update_com(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request, [
            'com' => 'required | min:2'
            ]);

        $commodity = $request['com'];
        $check = Commodity::where('kind', $commodity)->where('show','1')->exists();


        if($check){
            $args = array('error' => 'error');
            return response()->json($args);

        }

        $com = Commodity::find($request->id);
        $com->kind = ucfirst($commodity);
        $com->responsible = Auth::user()->firstname;
        $com->save();

            $args = array('update' => 'update');
            return response()->json($args);
    }

    public function delete_com(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $com_del = Commodity::find($request->id);
        $com_del->responsible = Auth::user()->firstname;
        $com_del->show = '0';
        $com_del->save();

            return response()->json();

    }

    public function com_logs(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $com_logs = DB::table('commodities')->orderBy('updated_at','DESC')->get();

            return view('admin.com-logs', compact('com_logs'));   
    }

    public function show_hscode(){

        if($this->checkUser()){
            return $this->checkUser();
        }

            return view('admin.edit-hscode');
    }

    public function code_tbl(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $codes = DB::table('codes')->select('id','hscode','show')->where('show','1')->get();

            return view('admin.show-code', compact('codes'));
    }

    public function add_hscode(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request,[
            'code' => 'required | min:2'
            ]);

            $code = $request['code'];
            $check = Code::where('hscode',$code)->where('show','1')->exists();

            if($check)
            {

              $args = array('error' => 'error');
              
                return response()->json($args);  
            }

            $hscode = new Code();
            $hscode->hscode = $code;
            $hscode->responsible = Auth::user()->firstname;
            $hscode->show = '1';

            $hscode->save();

            $args = array('save' => 'save');
            return response()->json($args);
    }
    public function view_hscode(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        if($request->ajax())
        {
            return response(Code::find($request->id));
        }
    }
    public function update_hscode(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

            $this->validate($request, [
            'code' => 'required | min:2'
            ]);

        $cod = $request['code'];
        $check = Code::where('hscode',$cod)->where('show','1')->exists();

        if($check){

            $args = array('error' => 'error');
                return response()->json($args);

        }

        $code = Code::find($request->id);
        $code->hscode = $cod;
        $code->responsible = Auth::user()->firstname;
        $code->save();

            $args = array('update' => 'update');
            return response()->json($args);
    }

    public function delete_hscode(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }


        $code_del = Code::find($request->id);
        $code_del->responsible = Auth::user()->firstname;
        $code_del->show = '0';
        $code_del->save();

            return response()->json();
    }

    public function code_logs(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $code_logs = DB::table('codes')->orderBy('updated_at', 'DESC')->get();

            return view('admin.code-logs', compact('code_logs'));
    }

    public function show_cut(){

        if($this->checkUser()){
            return $this->checkUser();
        }

            return view('admin.edit-cut');
    }

    public function cut_tbl(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $cuts = DB::table('cuts')->select('id','cut_type','show')->where('show','1')->get();

            return view('admin.show-cut', compact('cuts'));
    }

    public function add_cut(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request,[
            'cut' => 'required | min:2'
            ]);

            $cut = $request['cut'];
            $check = Cut::where('cut_type',$cut)->where('show','1')->exists();

            if($check){

                $args = array('error' => 'error');
                    return response()->json($args); 

            }

            $cut_type = new Cut();
            $cut_type->cut_type = ucfirst($cut);
            $cut_type->responsible = Auth::user()->firstname;
            $cut_type->show = '1';

            $cut_type->save();

            $args = array('save' => 'save');
            return response()->json($args);
    }
    public function view_cut(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        if($request->ajax())
        {
            return response(Cut::find($request->id));
        }
    }
    public function update_cut(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

            $this->validate($request, [
            'cut' => 'required | min:2'
            ]);

        $cu = $request['cut'];
        $check = Cut::where('cut_type',$cu)->where('show','1')->exists();


        if($check){

            $args = array('error' => 'error');

                return response()->json($args);            
        }
        $cut = Cut::find($request->id);
        $cut->cut_type = ucfirst($cu);
        $cut->responsible = Auth::user()->firstname;
        $cut->save();

            $args = array('update' => 'update');
            return response()->json($args);
    }

    public function delete_cut(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }


        $del_cut = Cut::find($request->id);
        $del_cut->responsible = Auth::user()->firstname;
        $del_cut->show = '0';
        $del_cut->save();

            return response()->json();
    }

    public function cut_logs(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $cut_logs = DB::table('cuts')->orderBy('updated_at', 'DESC')->get();

            return view('admin.cut-logs', compact('cut_logs'));
    }

    public function show_country(){

        if($this->checkUser()){
            return $this->checkUser();
        }

            return view('admin.edit-country');
    }

    public function coun_tbl(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $countrys = DB::table('countries')->select('id','country','show')->where('show','1')->get();

            return view('admin.show-coun', compact('countrys'));
    }

    public function add_country(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request,[
            'country' => 'required | min:2'
            ]);

            $coun = $request['country'];
            $check = Country::where('country',$coun)->where('show','1')->exists();

            if($check){

            $args = array('error' => 'error');
                return response()->json($args); 

            }

            $country = new Country();
            $country->country = ucfirst($coun);
            $country->responsible = Auth::user()->firstname;
            $country->show = '1';

            $country->save();

            $args = array('save' => 'save');
            return response()->json($args);
    }
    public function view_country(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        if($request->ajax()){
            return response(Country::find($request->id));
        }
    }
    public function update_country(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

            $this->validate($request, [
            'country' => 'required | min:2'
            ]);

        $coun = $request['country'];
        $check = Country::where('country',$coun)->where('show','1')->exists();

        if($check){

        $args = array('error' => 'error');
            return response()->json($args);

        }
        $country = Country::find($request->id);
        $country->country = ucfirst($coun);
        $country->responsible = Auth::user()->firstname;
        $country->save();

            $args = array('update' => 'update');
            return response()->json($args);
    }

    public function delete_country(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $del_country = Country::find($request->id);
        $del_country->responsible = Auth::user()->firstname;
        $del_country->show = '0';
        $del_country->save();

            return response()->json();
    }

    public function coun_logs(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $coun_logs = DB::table('countries')->orderBy('updated_at', 'DESC')->get();

            return view('admin.coun-logs', compact('coun_logs'));
    }

    public function show_fme(){

        if($this->checkUser()){
            return $this->checkUser();
        }

            return view('admin.edit-fme');
    }

    public function fme_tbl(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $fmes = DB::table('fmes')->select('id','name_number','show')->where('show','1')->get();

            return view('admin.show-fme', compact('fmes'));
    }

    public function add_fme(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request,[
            'name' => 'required | min:2' 
            ]);

        $name = $request['name'];
        $check = Fme::where('name_number', $name)->where('show','1')->exists();

        if($check){

            $args = array('error' => 'error');
                return response()->json($args);  
        }

        $fme = new Fme();
        $fme->name_number = $name;
        $fme->responsible = Auth::user()->firstname;
        $fme->show = '1';

        $fme->save();

            $args = array('save' => 'save');
            return response()->json($args);

    }

    public function view_fme(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        if($request->ajax()){
            return response(Fme::find($request->id));
        }       
    }

    public function update_fme(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request,[
            'name' => 'required | min:2'
            ]);

        $name = $request['name'];
        $check = Fme::where('name_number', $name)->where('show','1')->exists();

        if($check){

            $args = array('error' => 'error');
                return response()->json($args);

        }

        $fme = Fme::find($request->id);
        $fme->name_number = $name;
        $fme->responsible = Auth::user()->firstname;
        $fme->save();

            $args = array('update' => 'update');
            return response()->json($args);   
    }

    public function delete_fme(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $del_fme = Fme::find($request->id);
        $del_fme->responsible = Auth::user()->firstname;
        $del_fme->show = '0';
        $del_fme->save();

            return response()->json();
      
    }

    public function fme_logs(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $fme_logs = DB::table('fmes')->orderBy('updated_at','DESC')->get();

            return view('admin.fme-logs', compact('fme_logs'));
    }

    public function show_faqs(){

        if($this->checkUser()){
            return $this->checkUser();
        }

            return view('admin.edit-faqs');
    }

    public function faqs_tbl(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $faqs = DB::table('faqs')->select('id','question','answer','show')->where('show','1')->get();

            return view('admin.show-faqs', compact('faqs'));
    }

    public function add_faqs(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request,[
            'que' => 'required | min:2',
            'ans' => 'required | min:2'
            ]);

            $que = $request['que'];
            $ans = $request['ans'];
            $check = Faq::where('question',$que)->where('answer',$ans)->where('show','1')->exists();

            if($check){
                $args = array('error' => 'error');
                    return response()->json($args);
            }

            $faq = new Faq();
            $faq->question = ucfirst($que);
            $faq->answer = ucfirst($ans);
            $faq->responsible = Auth::user()->firstname;
            $faq->show = '1';

            $faq->save();

            $args = array('save' => 'save');
                return response()->json($args);
    }

    public function view_faqs(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        if($request->ajax()){

            return response(Faq::find($request->id));
        }
    }

    public function update_faqs(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $this->validate($request,[
            'que' => 'required | min:2',
            'ans' => 'required | min:2'
            ]);
        $que = $request['que'];
        $ans = $request['ans'];
        $check = Faq::where('question',$que)->where('answer',$ans)->where('show','1')->exists();

        if($check){

            $args = array('error' => 'error');
                return response()->json($args);
        }

        $faqs = Faq::find($request->id);
        $faqs->question = ucfirst($que);
        $faqs->answer   = ucfirst($ans);
        $faqs->responsible = Auth::user()->firstname;
        $faqs->save();

        $args = array('update' => 'update');
        return response()->json($args);
    }

    public function delete_faqs(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $del_faq = Faq::find($request->id);
        $del_faq->responsible = Auth::user()->firstname;
        $del_faq->show = '0';
        $del_faq->save();

        return response()->json();
    }

    public function faqs_logs(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $faq_logs = DB::table('faqs')->orderBy('updated_at', 'DESC')->get();
            return view('admin.faqs-logs', compact('faq_logs'));
    }

    public function show_dots(){

        if($this->checkUser()){
            return $this->checkUser();
        }

            return view('admin.edit-dots');
    }

    public function dots_tbl(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $dots = DB::table('dots')->select('id','question','answer','show')->where('show','1')->get();

            return view('admin.show-dots', compact('dots'));
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
            $check = Dot::where('question',$que)->where('answer',$ans)->where('show','1')->exists();

            if($check){

            $args = array('error' => 'error');
                return response()->json($args);

            }
            $dots = new Dot();
            $dots->question = ucfirst($que);
            $dots->answer   = ucfirst($ans);
            $dots->responsible = Auth::user()->firstname;
            $dots->show = '1';

            $dots->save();

            $args = array('save' => 'save');
            return response()->json($args);
    }
    public function view_dots(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

        if($request->ajax()){

            return response(Dot::find($request->id));
        }
    }
    public function update_dots(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }

            $this->validate($request, [
            'question' => 'required | min:2',
            'answer' => 'required | min:2'
            ]);

        $que = $request['question'];
        $ans = $request['answer'];
        $check = Dot::where('question',$que)->where('answer',$ans)->where('show','1')->exists();


        if($check){

            $args = array('error' => 'error');
                return response()->json($args);

        }
        $dot = Dot::find($request->id);
        $dot->question = ucfirst($que);
        $dot->answer   = ucfirst($ans);
        $dot->responsible = Auth::user()->firstname;
        $dot->save();

            $args = array('update' => 'update');
            return response()->json($args);
    }

    public function delete_dots(Request $request){

        if($this->checkUser()){
            return $this->checkUser();
        }


        $del_dots = Dot::find($request->id);
        $del_dots->responsible = Auth::user()->firstname;
        $del_dots->show = '0';
        $del_dots->save();

            return response()->json();
    }

    public function dots_logs(){

        $dots_logs = DB::table('dots')->orderBy('updated_at', 'DESC')->get();

            return view('admin.dots-logs', compact('dots_logs'));
    }

    public function show_options(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $kinds      = DB::table('commodities')->select('kind')->where('show','1')->get();
        $cut_types  = DB::table('cuts')->select('cut_type')->where('show','1')->get();
        $codes      = DB::table('codes')->select('hscode')->where('show','1')->get();
        $countrys   = DB::table('countries')->select('country')->where('show','1')->get();
        $fmes       = DB::table('fmes')->select('name_number')->where('show','1')->get();

        return view('admin.add-meatcuts', compact('kinds','cut_types','codes','countrys','fmes'));
    }

    public function show_meat(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $meats = DB::table('meat_cuts')->select('kind','cut_type','hscode','name_number','remarks','country')->where('show','1')->get();

        return view('admin.show-meat' , compact('meats'));
    }

    public function view_meat($code){

        if($this->checkUser()){
            return $this->checkUser();
        }
        $code = Crypt::decrypt($code);
        $meat_cuts = Meats::where('hscode', $code)->where('show','1')->get();

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
    		'pass'    => 'required | min:6 | max:20',
    		'cpass'   => 'required | same:pass',
    		'role'    => 'required'
    		]);

    		$last    = ucfirst($request['last']);
    		$first   = ucfirst($request['first']);
    		$middle  = ucfirst($request['middle']);
    		$user    = $request['user'];
    		$pass    = bcrypt($request['pass']);
    		$role    = $request['role'];
            $status  = 'activated';
            $res     = Auth::user()->firstname;

            $check = User::where('username',$user)->exists();

            if($check){

            $args = array('error' =>'error');
               return response()->json($args);

            }

    	       $member             = new User();
    	       $member->lastname   = $last;
    	       $member->firstname  = $first;
    	       $member->middlename = $middle;
    	       $member->username   = $user;
    	       $member->password   = $pass;
    	       $member->role       = $role;
               $member->status     = $status;
               $member->responsible = $res;
               $member->show = '1';

    	       $member->save();

                $args = array('save' =>'save');
    	       return response()->json($args);

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
    			$destinationPath = 'images/';
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
                  $meat->responsible = Auth::user()->firstname;
                  $meat->show = '1';

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


        $del = Meats::where('id', $id)->update([
            'show' => '0',
            'responsible' => Auth::user()->firstname
            ]);

        $args = array('delete' => '');
        return redirect()->back()->with($args);
    }

    public function update_meatcut($id){

        if($this->checkUser()){
            return $this->checkUser();
        }
        $id = Crypt::decrypt($id);
        $meatss = Meats::where('id', $id)->first();
        if(!$meatss){
            return 'Sorry';
        }
        return view('admin.update-meat', compact('meatss'));
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
            'country'     => $request['coun'],
            'responsible' => Auth::user()->firstname
            ]);

            $args = array('update' => '');
            return redirect()->back()->with($args);

    }

    public function meat_logs(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $meat_logs = DB::table('meat_cuts')->orderBy('updated_at','DESC')->get();

            return view('admin.meat-logs', compact('meat_logs'));
    }

    public function count(){

         if($this->checkUser()){
            return $this->checkUser();
        }
        $count_kinds = DB::table('commodities')->select('kind','show')->where('show','1')->count();
        $count_types = DB::table('cuts')->select('cut_type','show')->where('show','1')->count();
        $count_code  = DB::table('codes')->select('hscode','show')->where('show','1')->count();
        $count_coun  = DB::table('countries')->select('country','show')->where('show','1')->count();
        $count_meats = DB::table('meat_cuts')->where('show','1')->count();
        $count_dots  = DB::table('dots')->select('question','answer')->where('show','1')->count();
        $count_fmes  = DB::table('fmes')->select('name_number')->where('show','1')->count();
        $count_faqs  = DB::table('faqs')->select('faqs')->where('show','1')->count();
        $count_admins = DB::table('users')->select('role')->where('role', '0')->where('show','1')->count();
        $count_users = DB::table('users')->select('role')->where('role', '1')->where('show','1')->count();
        $count_active = DB::table('users')->select('status')->where('status', 'activated')->where('show','1')->count();
        $count_inactive = DB::table('users')->select('status')->where('status', '0')->where('show','1')->count();


            return view('admin.dashboard', compact('count_kinds','count_types','count_code','count_coun','count_meats','count_dots','count_fmes','count_faqs','count_admins','count_users','count_active','count_inactive'));        
    }

    public function show_users(){

        if($this->checkUser()){
            return $this->checkUser();
        }

            return view('admin.users');
    }

    public function user_tbl(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $users = DB::table('users')->select('id','lastname','firstname','middlename','username','role','status','show')->where('show','1')->get();

            return view('admin.show-user', compact('users'));
    }

    public function user_logs(){

        if($this->checkUser()){
            return $this->checkUser();
        }

        $user_logs = DB::table('users')->orderBy('updated_at', 'DESC')->get();

            return view('admin.user-logs', compact('user_logs'));
    }

    public function edit_users(Request $request, $id){

        if($this->checkUser()){
            return $this->checkUser();
        }
        $id = Crypt::decrypt($id);
        $user = User::where('id', $id)->first();
        if(!$user){
            return 'Sorry';
        }
            return view('admin.edit-users', compact('user'));
    }
    public function update_users(Request $request, $id){

        if($this->checkUser()){
            return $this->checkUser();
        }

            $this->validate($request, [
            'lastname' => 'required | min:2',
            'firstname' => 'required | min:2',
            'middlename' => 'required | min:2',
            'status' => 'required'
            ]);
        $last = $request['lastname'];
        $first = $request['firstname'];
        $middle = $request['middlename'];
        $status = $request['status'];


        $country = User::where('id',$id)->update([
            'lastname' => ucfirst($last),
            'firstname' => ucfirst($first),
            'middlename' => ucfirst($middle),
            'status' => $status,
            'responsible' => Auth::user()->firstname
            ]);

            $args = array('update' => '');
            return redirect()->back()->with($args);
    }

}
