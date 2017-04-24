@extends('auth.layouts.master')

@section('title')
	Meat Cuts Catalogue
@endsection

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Login Form</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Please sign in to start</p>
    <form method="POST" action="{{ route('login')}}" data-parsley-validate>
      <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
        <input type="text" class="form-control" placeholder="Username" name="username" required>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
          @if($errors->has('username'))
          <span class="help-block">{{ $errors->first('username') }}</span>
        @endif
      </div>
      <div class="form-group has-feedback {{ $errors->has('password') ? 'has-error' : '' }}">
        <input type="password" class="form-control" placeholder="Password" name="password" required>
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        @if($errors->has('password'))
          <span class="help-block">{{ $errors->first('password') }}</span>
        @endif
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-login">Sign In</button>
        </div>
        <!-- /.col -->
        {{csrf_field()}}
      </div>
    </form>



  </div>
  <!-- /.login-box-body -->
</div>
@endsection	