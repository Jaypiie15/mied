@extends('admin.layouts.master')

@section('title')
Imported Meat Catalogue
@endsection

	@section('content')


  @include('admin.include.header')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user-plus"></i> Add Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">

<hr>
  @if(Session::has('info'))
    <script>swal("SUCCESS","Successfully Added","success")</script>
  @endif
    @if(Session::has('error'))
    <script>swal("ERROR","Username Already Taken!","error")</script>
  @endif

    <form method="POST" action="{{ route('add-admin') }}" class="form-horizontal form-label-left" id="form" data-parsley-validate>

    <div class="item form-group {{ $errors->has('last') ? 'has-error' : '' }}">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Lastname <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="text" class="form-control col-md-7 col-xs-12 " placeholder="Lastname" name="last" required  data-parsley-length="[2, 20]"  data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-pattern-message="Invalid chracters. Please input Alphabet only">
        @if($errors->has('last'))
          <span class="help-block">{{ $errors->first('last') }}</span>
        @endif
    </div>
    </div>
    
    <div class="item form-group {{ $errors->has('first') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Firstname<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Firstname" name="first" required  data-parsley-length="[2, 20]"  data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-pattern-message="Invalid chracters. Please input Alphabet only">
        @if($errors->has('first'))
          <span class="help-block">{{ $errors->first('first') }}</span>
        @endif

      </div>
      </div>

    <div class="item form-group {{ $errors->has('middle') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Middlename<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Middlename" name="middle" required  data-parsley-length="[2, 20]"  data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-pattern-message="Invalid chracters. Please input Alphabet only">
        @if($errors->has('middle'))
          <span class="help-block">{{ $errors->first('middle') }}</span>
        @endif
      </div>
      </div>

    <div class="item form-group {{ $errors->has('user') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Username<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="text" class="form-control col-md-7 col-xs-12" placeholder="Username" name="user" required>
        @if($errors->has('user'))
          <span class="help-block">{{ $errors->first('user') }}</span>
        @endif
      </div>
      </div>

   <div class="item form-group {{ $errors->has('pass') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Password<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="password" class="form-control col-md-7 col-xs-12" placeholder="Password" name="pass" id="pass" required  data-parsley-length="[6, 20]">
        @if($errors->has('pass'))
          <span class="help-block">{{ $errors->first('pass') }}</span>
        @endif
      </div>
      </div>

    <div class="item form-group {{ $errors->has('cpass') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Repeat Password<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="password" class="form-control col-md-7 col-xs-12" placeholder="Repeat Password" name="cpass" required  data-parsley-length="[6, 20]" data-parsley-equalto="#pass">
        @if($errors->has('cpass'))
          <span class="help-block">{{ $errors->first('cpass') }}</span>
        @endif
      </div>
      </div>

    <div class="item form-group {{ $errors->has('role') ? 'has-error' : '' }}">
            <label class="control-label col-md-3 col-sm-3 col-xs-6">Role<span class="required">*</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="role" class="form-control" required>
                    <option value="">--Select role--</option>
                    <option value="0">Admin</option>
                    <option value="1">User</option>
                   </select>
        @if($errors->has('role'))
          <span class="help-block">{{ $errors->first('role') }}</span>
        @endif
        </div>
    </div> 

        <div class="col-md-6 col-md-offset-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-register">Register</button>
        </div>
        {{csrf_field()}}
        </form>
        
@endsection