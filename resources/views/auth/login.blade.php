@extends('auth.layouts.master')

@section('title')
	Imported Meat Catalogue
@endsection



@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Login Form</b></a>
  </div>

        @if(Session::has('error'))
        <script type="text/javascript">
      swal({   
        title: "ERROR",  
        text: "Invalid Username or Password",
        timer: 4000, 
        type: 'error',  
        showConfirmButton: false 
        });
      setTimeout("location.href = '{{route('index')}}'",2000);
    </script>
  @endif
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Please sign in to start</p>
    <form method="POST" action="{{ route('login')}}" data-parsley-validate>
      <div class="form-group has-feedback {{ $errors->has('username') ? 'has-error' : '' }}">
        <input type="text" class="form-control" placeholder="Username" name="username" autocomplete="off" required>
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