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
        <i class="fa fa-pencil"></i> Edit Meat Cut Type
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Meat Cut Type</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  @if(Session::has('add'))
    <script>swal("SUCCESS","Meat Cut Type Added!","success")</script>
  @endif
    @if(Session::has('delete'))
    <script>swal("SUCCESS","Meat Cut Type Deleted!","success")</script>
  @endif
        @if(Session::has('error'))
    <script>swal("ERROR","Meat Cut Already Exists!","error")</script>
  @endif
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form method="POST" action="{{ route('add-cut')}}" data-parsley-validate>
       
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add Meat Cut Type</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Meat Cut Type</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('cut') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Meat Cut Type:</label>
             <input type="text" class="form-control" name="cut" required  data-parsley-length="[2, 100]">
          </div>
        @if($errors->has('cut'))
          <span class="help-block">{{ $errors->first('cut') }}</span>
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
            
            @foreach($cuts as $cut)
            <td>{{$cut->cut_type}}</td>
            <td>
            <a href="{{ route('update-cut_type', ['id'=> Crypt::encrypt($cut->id) ]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
            <a href="{{ route('delete-cut_type', ['id'=>$cut->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</a>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>

    </form>
@endsection

 

