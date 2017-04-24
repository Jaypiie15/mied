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
        <i class="fa fa-pencil"></i> Edit Commodity
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Commodity</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
  @if(Session::has('add'))
    <script>swal("SUCCESS","Commodity Added!","success")</script>
  @endif
  @if(Session::has('delete'))
    <script>swal("SUCCESS","Commodity Deleted!","success")</script>
  @endif

        <div class="box">
        <div class="box-body">


<hr>


      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Lastname</th>
            <th>Firstname</th>
            <th>Middlename</th>
            <th>Username</th>
            <th>Role</th>
            <th>Status</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($users as $user)
            <td>{{$user->lastname}}</td>
            <td>{{$user->firstname}}</td>
            <td>{{$user->middlename}}</td>
            <td>{{$user->username}}</td>
            <td><label style="padding:10px;font-weight:bolder" class="{{$user->role == 0 ? 'label label-danger' : 'label label-warning'}}">Role</label>
            <td><label style="padding:10px;font-weight:bolder" class="{{$user->status == 'activated' ? 'label label-success' : 'label label-danger'}}">Status</label>
            <td>
            <a href="{{ route('edit-users', ['id' => $user->id]) }}" class="btn btn-primary"><i class="fa fa-pencil"></i> Edit</a>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>

    </form>
@endsection

 

