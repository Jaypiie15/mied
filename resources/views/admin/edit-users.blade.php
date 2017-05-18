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
        <i class="fa fa-pencil"></i> Modify Users
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Modify Users</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <a href="{{ route('show-users')}}" class="btn btn-primary"><i class="fa fa-mail-reply"></i> Back</a>
<hr>
      @if(Session::has('update'))
        <script type="text/javascript">
      swal({   
        title: "SUCCESS",  
        text: "Updated Successfully",
        timer: 4000, 
        type: 'success',  
        showConfirmButton: false 
        });
      setTimeout("location.href = '{{route('show-users')}}'",2000);
    </script>
  @endif
    @if(Session::has('error'))
    <script>swal("ERROR","Username Already Taken!","error")</script>
  @endif
    <form method="POST" action="{{ route('update-user', ['id' => $user->id]) }}" class="form-horizontal form-label-left" id="form" data-parsley-validate>
    
    
    <div class="item form-group {{ $errors->has('lastname') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Lastname<span class="required"> *</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 

    
        <input type="text" name="lastname" value="{{$user->lastname}}" class="form-control col-md-7 col-xs-12" required  data-parsley-length="[2, 100]">
        @if($errors->has('lastname'))
          <span class="help-block">{{ $errors->first('lastname') }}</span>
        @endif
      </div>
      </div>

    <div class="item form-group {{ $errors->has('firstname') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Firstname<span class="required"> *</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 

    
        <input type="text" name="firstname" value="{{$user->firstname}}" class="form-control col-md-7 col-xs-12" required  data-parsley-length="[2, 100]">
        @if($errors->has('firstname'))
          <span class="help-block">{{ $errors->first('firstname') }}</span>
        @endif
      </div>
      </div>

    <div class="item form-group {{ $errors->has('middlename') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Middlename<span class="required"> *</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 

    
        <input type="text" name="middlename" value="{{$user->middlename}}" class="form-control col-md-7 col-xs-12" required  data-parsley-length="[2, 100]">
        @if($errors->has('middlename'))
          <span class="help-block">{{ $errors->first('middlename') }}</span>
        @endif
      </div>
      </div>


    <div class="item form-group {{ $errors->has('status') ? 'has-error' : '' }}">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Status<span class="required"> *</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">

                  <select name="status" class="form-control select2" required>
                            <option value="{{$user->status == 'activated' ? 'activated' : '0'}}">{{$user->status == 'activated' ? 'Activated' : 'Deactivated'}}</option>
                            <option value="{{$user->status == 'activated' ? '0' : 'activated'}}">{{$user->status == 'activated' ? 'Deactivate Account' : 'Activate Account'}}</option>

                  </select>
        @if($errors->has('status'))
          <span class="help-block">{{ $errors->first('status') }}</span>
        @endif

        </div>
    </div>



        <div class="col-md-6 col-md-offset-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-update">Update</button>
        </div>
        {{csrf_field()}}
      </form>
      
@endsection