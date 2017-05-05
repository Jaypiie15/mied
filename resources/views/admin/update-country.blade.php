@extends('admin.layouts.master')

@section('title')
  Meat Cuts Catalogue
@endsection

  @section('content')

  @include('admin.include.header')
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-pencil"></i> Modify Country
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Modify Country</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <a href="{{ route('edit-country')}}" class="btn btn-primary"><i class="fa fa-mail-reply"></i> Back</a>
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
      setTimeout("location.href = '{{route('edit-country')}}'",2000);
    </script>
  @endif
@if(Session::has('error'))
    <script>swal("ERROR","Country Already Exists!","error")</script>
  @endif

    <form method="POST" action="{{ route('update-country',['id' => $couns->id]) }}" class="form-horizontal form-label-left" id="form" data-parsley-validate>

    
    <div class="item form-group {{ $errors->has('country') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">HS Code<span class="required"> *</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 

    
        <input type="text" name="country" value="{{$couns->country}}" class="form-control col-md-7 col-xs-12" required  data-parsley-length="[2, 100]">
         @if($errors->has('country'))
          <span class="help-block">{{ $errors->first('country') }}</span>
        @endif

      </div>
      </div>



        <div class="col-md-6 col-md-offset-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-update">Update</button>
        </div>
        {{csrf_field()}}
        </form>
     @endsection 
