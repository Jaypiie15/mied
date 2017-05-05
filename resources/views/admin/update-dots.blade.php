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
        <i class="fa fa-pencil"></i> Modify Definition of Terms
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Modify Definition of Terms</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <a href="{{ route('edit-dots')}}" class="btn btn-primary"><i class="fa fa-mail-reply"></i> Back</a>
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
      setTimeout("location.href = '{{route('edit-dots')}}'",2000);
    </script>
  @endif
@if(Session::has('error'))
    <script>swal("ERROR","Question and Answer Already Exists!","error")</script>
  @endif

    <form method="POST" action="{{ route('update-dot',['id' => $dots->id]) }}" class="form-horizontal form-label-left" id="form" data-parsley-validate>

    
    <div class="item form-group {{ $errors->has('question') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Question:<span class="required"> *</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 

    
        <input type="text" name="question" value="{{$dots->question}}" class="form-control col-md-7 col-xs-12" required  data-parsley-length="[2, 100]">
         @if($errors->has('question'))
          <span class="help-block">{{ $errors->first('question') }}</span>
        @endif

      </div>
      </div>

    <div class="item form-group {{ $errors->has('answer') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Answer:<span class="required"> *</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 

    
        <input type="text" name="answer" value="{{$dots->answer}}" class="form-control col-md-7 col-xs-12" required  data-parsley-length="[2, 100]">
         @if($errors->has('answer'))
          <span class="help-block">{{ $errors->first('answer') }}</span>
        @endif

      </div>
      </div>      



        <div class="col-md-6 col-md-offset-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-update">Update</button>
        </div>
        {{csrf_field()}}
        </form>
     @endsection 
