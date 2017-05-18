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
        <i class="fa fa-pencil"></i> Modify FME Name & Number
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Modify FME Name & Number</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">

          <a href="{{ route('edit-fme')}}" class="btn btn-primary"><i class="fa fa-mail-reply"></i> Back</a>
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
      setTimeout("location.href = '{{route('edit-fme')}}'",2000);
    </script>
  @endif
      @if(Session::has('error'))
    <script>swal("ERROR","FME Name & Number Already Exists!","error")</script>
  @endif
    <form method="POST" action="{{ route('update-fme',['id'=> $fmes->id]) }}" class="form-horizontal form-label-left" id="form" data-parsley-validate>
    
    
    <div class="item form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">FME Name & Number<span class="required"> *</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 

    
        <input type="text" name="name" value="{{$fmes->name_number}}" class="form-control col-md-7 col-xs-12" required  data-parsley-length="[2, 100]">
        @if($errors->has('name'))
          <span class="help-block">{{ $errors->first('name') }}</span>
        @endif
      </div>
      </div>



        <div class="col-md-6 col-md-offset-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-update">Update</button>
        </div>
        {{csrf_field()}}
      </form>
      
@endsection