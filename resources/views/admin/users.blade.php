@extends('admin.layouts.master')

@section('title')
Imported Meat Catalogue
@endsection

@section('content')

@include('admin.include.header')
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-pencil"></i> Edit Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">



        <div class="box">
        <div class="box-body">

<form action="{{ route('add-admin')}}" method="POST" id="insert-user" data-parsley-validate>
       
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adduser-modal"><i class="fa fa-plus"></i> Add Users</button>
<div class="modal fade" id="adduser-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Users</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('last') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Lastname:</label>
             <input type="text" class="form-control" name="last" required data-parsley-length="[2, 100]" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-pattern-message="Invalid chracters. Please input Alphabet only">
          @if($errors->has('last'))
          <span class="help-block">{{ $errors->first('last') }}</span>
        @endif
          </div>
          <div class="form-group {{ $errors->has('first') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Firstname:</label>
             <input type="text" class="form-control" name="first" required data-parsley-length="[2, 100]" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-pattern-message="Invalid chracters. Please input Alphabet only">
          @if($errors->has('first'))
          <span class="help-block">{{ $errors->first('first') }}</span>
        @endif
          </div>

          <div class="form-group {{ $errors->has('middle') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Middlename:</label>
             <input type="text" class="form-control" name="middle" required data-parsley-length="[2, 100]" data-parsley-pattern="^[a-zA-Z ]+$" data-parsley-pattern-message="Invalid chracters. Please input Alphabet only">
          @if($errors->has('middle'))
          <span class="help-block">{{ $errors->first('middle') }}</span>
        @endif
          </div>

          <div class="form-group {{ $errors->has('user') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Username:</label>
             <input type="text" class="form-control" name="user" required data-parsley-length="[2, 100]">
          @if($errors->has('user'))
          <span class="help-block">{{ $errors->first('user') }}</span>
        @endif
          </div>

          <div class="form-group {{ $errors->has('pass') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Password:</label>
             <input type="password" class="form-control" name="pass" id="pass" required data-parsley-length="[2, 100]">
          @if($errors->has('pass'))
          <span class="help-block">{{ $errors->first('pass') }}</span>
        @endif
          </div>

          <div class="form-group {{ $errors->has('cpass') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Repeat Password:</label>
             <input type="password class="form-control" name="cpass" required data-parsley-length="[2, 100]" data-parsley-equalto="#pass">
          @if($errors->has('cpass'))
          <span class="help-block">{{ $errors->first('cpass') }}</span>
        @endif
          </div>

          <div class="form-group {{ $errors->has('role') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Role:</label>
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
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        
         </form>
        
      </div>
    </div>
  </div>
</div>
<hr>


      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

      </table>

    </form>

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

        $('#insert-user').on('submit',function(e){
          e.preventDefault();
          var route = $(this).attr('action');
          var data  = $(this).serialize();

          $.ajax({
            dataType : 'json',
            type : "POST",
            url: route,
            data: data,
            success:function(data){
              if($.trim(data.save) == 'save'){
              $("#adduser-modal").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'User Added!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              $("#insert-user").trigger('reset');
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'User Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                
              }
            }
          })
        })

    //read

      read();
      
      function read(){
          $.ajax({  
            type : 'get',
            url : "{{ route('user-tbl')}}",
            dataType : 'html',
              success:function(data){
                  $('#datatable-responsive').html(data);
                }
              })
            }

</script>
@endsection

 

