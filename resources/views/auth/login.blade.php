@extends('auth.layouts.master')

@section('title')
	Imported Meat Catalogue
@endsection



@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="#"><b>Login Form</b></a>
  </div>


  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">Please sign in to start</p>
    <form method="POST" action="{{ route('login')}}" id="login" data-parsley-validate>
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
        
      </div>
    </form>



  </div>
  <!-- /.login-box-body -->
</div>

<script src="{{ asset('resources/src/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>


<script type="text/javascript">

      //add
        $(document).ready(function(){
            $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
              }
            });
        });

        $('#login').on('submit',function(e){
          e.preventDefault();
          var route = $(this).attr('action');
          var data  = $(this).serialize();

          $.ajax({
            dataType : 'json',
            type : "POST",
            url: route,
            data: data,
            success:function(data){
              switch($.trim(data.role)){

                case 'admin':
                window.location.href = "{{ route('dashboard') }}";
                break;
             
                case 'user':
                window.location.href = "{{ route('main') }}";
                break;

                case 'error':
                  new PNotify({
                  title: 'Oh No!',
                  text: 'Error Username or Password',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                  $("#login").trigger('reset');
                break;

                default:
                break;
              }
            }
          })
        })
</script>
@endsection	