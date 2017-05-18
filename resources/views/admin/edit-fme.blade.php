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
        <i class="fa fa-pencil"></i> Edit FME Name & Number
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit FME Name & Number</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  @if(Session::has('add'))
    <script>swal("SUCCESS","FME Name & Number Added!","success")</script>
  @endif
    @if(Session::has('delete'))
    <script>swal("SUCCESS","FME Name & Number Deleted!","success")</script>
  @endif
    @if(Session::has('error'))
    <script>swal("ERROR","FME Name & Number Already Exists!","error")</script>
  @endif
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form method="POST" action="{{ route('add-fme') }}" data-parsley-validate>
       
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-plus"></i> Add FME Name & Number</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add FME Name & Number</h4>
      </div>
      <div class="modal-body">


          <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">FME Name & Number</label>
             <input type="text" class="form-control" name="name" required  data-parsley-length="[2, 100]">
          </div>
        @if($errors->has('name'))
          <span class="help-block">{{ $errors->first('name') }}</span>
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
            <th>Question</th>
            <th>Answer</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($fmes as $fme)
            <td>{{$fme->name_number}}</td>
            <td>
            <a href="{{ route('update-fmes', ['id'=> Crypt::encrypt($fme->id) ]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
            <button id="delete" class="btn btn-danger"><i class="fa fa-trash"></i> Delete</button>
            <form id="del-func" action="{{ route('delete-fme', ['id'=>$fme->id]) }}">
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>

    </form>
@endsection

 

