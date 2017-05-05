@extends('admin.layouts.master')

@section('title')
  Meat Cuts Catalogue
@endsection

  @section('content')

  @include('admin.include.header')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-user-plus"></i> Add Meat Cuts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Add Meat Cuts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">

<hr>
  @if(Session::has('save'))
    <script>swal("SUCCESS","Meat Cut Added!","success")</script>
  @endif

    <form method="POST" action="{{ route('add-meatcut') }}" class="form-horizontal form-label-left" id="form" enctype="multipart/form-data" data-parsley-validate>


    <div class="item form-group {{ $errors->has('commodity') ? 'has-error' : '' }}">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Commodity<span class="required"> *</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">

                  <select name="commodity" class="form-control select2" required>
                            <option value="">-- Select Commodity --</option>
        @if($kinds)
        @foreach($kinds as $kind)
                            <option value="{{ $kind->kind }}">{{$kind->kind}}</option>
          @endforeach
          @endif
                  </select>
        @if($errors->has('commodity'))
          <span class="help-block">{{ $errors->first('commodity') }}</span>
        @endif

        </div>
    </div>

    <div class="item form-group {{ $errors->has('type') ? 'has-error' : '' }}">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Meat Cut Type <span class="required"> *</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">

                  <select name="type" class="form-control select2" required>
                            <option value="">-- Select Commodity --</option>
          @if($cut_types)
        @foreach($cut_types as $cut)
                            <option value="{{ $cut->cut_type }}">{{$cut->cut_type}}</option>
          @endforeach
          @endif
                  </select>
           @if($errors->has('type'))
          <span class="help-block">{{ $errors->first('type') }}</span>
        @endif
        </div>
    </div>


    <div class="item form-group {{ $errors->has('code') ? 'has-error' : '' }}">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">HS Code <span class="required"> *</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="code" class="form-control select2" required>
                    <option selected="selected" value="">-- HS Code --</option>
          @if($codes)
        @foreach($codes as $code)
                            <option value="{{ $code->hscode }}">{{$code->hscode}}</option>
          @endforeach
          @endif
                  </select>
            @if($errors->has('code'))
          <span class="help-block">{{ $errors->first('code') }}</span>
        @endif
        </div>
    </div>

    <div class="item form-group {{ $errors->has('number') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">FME Name & Number<span class="required"> *</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 

    
        <input type="text" name="number" class="form-control col-md-7 col-xs-12" required>
            @if($errors->has('number'))
          <span class="help-block">{{ $errors->first('number') }}</span>
        @endif
      </div>
      </div>

    <div class="item form-group {{ $errors->has('remarks') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Remarks<span class="required"> *</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12"> 

    
        <input type="text" name="remarks" class="form-control col-md-7 col-xs-12" required>
            @if($errors->has('remarks'))
          <span class="help-block">{{ $errors->first('remarks') }}</span>
        @endif
      </div>
      </div>

    <div class="item form-group {{ $errors->has('country') ? 'has-error' : '' }}">
           <label class="control-label col-md-3 col-sm-3 col-xs-12">Country of Origin <span class="required"> *</span></label>
        <div class="col-md-6 col-sm-6 col-xs-12">
                  <select name="country" class="form-control select2" required>
                    <option value="">-- Select Country of Origin --</option>
          @if($countrys)
        @foreach($countrys as $coun)
                            <option value="{{ $coun->country }}">{{$coun->country}}</option>
          @endforeach
          @endif
                  </select>
                   
            @if($errors->has('country'))
          <span class="help-block">{{ $errors->first('country') }}</span>
        @endif
        </div>
    </div>


      <div class="item form-group {{ $errors->has('images') ? 'has-error' : '' }}">
    <label class="control-label col-md-3 col-sm-3 col-xs-6">Images<span class="required"> *</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
 
        <input id="files" type="file"  class="form-control col-md-7 col-xs-12" name="images[]" multiple="" required>
         @if($errors->has('images'))
          <span class="help-block">{{ $errors->first('images') }}</span>
        @endif
      <div id="selectedFiles"></div>
      </div>
      </div>


        <div class="col-md-6 col-md-offset-3">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="btn-add">Add</button>
        </div>
      
        {{csrf_field()}}

    </form>
    @endsection
