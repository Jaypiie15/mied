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
        <i class="fa fa-pencil"></i> Edit HS Code
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit HS Code</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  @if(Session::has('add'))
    <script>swal("SUCCESS","HS Code Added!","success")</script>
  @endif
    @if(Session::has('delete'))
    <script>swal("SUCCESS","HS Code Deleted!","success")</script>
  @endif
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form method="POST" action="{{ route('add-code')}}" data-parsley-validate>
       
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add HS Code</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add HS Code</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">HS Code:</label>
             <input type="text" class="form-control" name="code" required  data-parsley-length="[2, 100]">
          </div>
        @if($errors->has('code'))
          <span class="help-block">{{ $errors->first('code') }}</span>
        @endif
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="btn-add" class="btn btn-primary">Submit</button>
        {{csrf_field()}}
         </form>
        

        
      </div>
    </div>
  </div>
</div>

<hr>


      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Meat Cut Type</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($codes as $code)
            <td>{{$code->hscode}}</td>
            <td>
            <a href="{{ route('update-hscode', ['id'=> Crypt::encrypt($code->id) ]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
            <a href="{{ route('delete-hscode', ['id'=>$code->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>

    </form>
@endsection

 

