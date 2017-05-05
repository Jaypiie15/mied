@extends('admin.layouts.master')

@section('title')
	Meat Cuts Catalogue
@endsection

	@section('content')


  @include('admin.include.header')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user-plus"></i> Update Meat Cut
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Update Meat Cut</li>
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
      setTimeout("location.href = '{{route('show-meat')}}'",2000);
    </script>
  @endif

    <form method="POST" action="{{route('update-meat', ['id'=> $meatss->id]) }}" class="form-horizontal form-label-left" id="form" data-parsley-validate>

    <div class="item form-group">
      <label class="control-label col-md-3 col-sm-3 col-xs-12"><span class="required"></span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        
        <img class="img-responsive" alt="" src="/mied/{{$meatss->image}}" style="width:300px;height:150px;">
        
    </div>
    </div>      

    <div class="item form-group">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Commodity <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="text" class="form-control col-md-7 col-xs-12 "  name="kind" value="{{$meatss->kind}}">
        
    </div>
    </div>
    
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Meat Cut Type<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="text" class="form-control col-md-7 col-xs-12" name="cut" value="{{$meatss->cut_type}}">

      </div>
      </div>

    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">HS Code<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="text" class="form-control col-md-7 col-xs-12" name="code" value="{{$meatss->hscode}}">

      </div>
      </div>

    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">FME Name Number<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="text" class="form-control col-md-7 col-xs-12" name="name" value="{{$meatss->name_number}}">

      </div>
      </div>

   <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Remarks<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="text" class="form-control col-md-7 col-xs-12" name="rema" id="pass" value="{{$meatss->remarks}}">

      </div>
      </div>

    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Country<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 
        <input type="text" class="form-control col-md-7 col-xs-12" name="coun" value="{{$meatss->country}}">

      </div>
      </div>


        <div class="col-md-6 col-md-offset-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-register">Update</button>
        </div>
        {{csrf_field()}}
        </form>
        
@endsection