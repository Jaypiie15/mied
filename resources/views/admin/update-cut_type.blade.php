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
        <i class="fa fa-pencil"></i> Modify Meat Cut Type
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Modify Meat Cut Type</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">

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
      setTimeout("location.href = '{{route('edit-cut')}}'",2000);
    </script>
  @endif

    <form method="POST" action="{{ route('update-cut_type',['id' => $id->id]) }}" class="form-horizontal form-label-left" id="form">

    
    <div class="item form-group {{ $errors->has('cut') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Meat Cut Type<span class="required"> *</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 

    
        <input type="text" name="cut" value="{{$id->cut_type}}" class="form-control col-md-7 col-xs-12" >
         @if($errors->has('cut'))
          <span class="help-block">{{ $errors->first('cut') }}</span>
        @endif

      </div>
      </div>



        <div class="col-md-6 col-md-offset-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-update">Update</button>
        </div>
        {{csrf_field()}}
        </form>
     @endsection 
