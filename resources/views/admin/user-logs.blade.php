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
        <i class="fa fa-eye"></i> View Users Logs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View Users Logs</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">



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
            <th>Created</th>
            <th>Updated</th>
            <th>Responsible Admin</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($user_logs as $user_log)
            <td>{{$user_log->lastname}}</td>
            <td>{{$user_log->firstname}}</td>
            <td>{{$user_log->middlename}}</td>
            <td>{{$user_log->username}}</td>
            <td><label style="padding:10px;font-weight:bolder" class="{{$user_log->role == 0 ? 'label label-danger fa fa-user' : 'label label-warning fa fa-users'}}">  </label>
            <td><label style="padding:10px;font-weight:bolder" class="{{$user_log->status == 'activated' ? 'label label-success fa fa-check' : 'label label-danger fa fa-close'}}"> </label></td>
            <td>{{ Carbon\Carbon::parse($user_log->updated_at)->diffForHumans() }}</td>
            <td>{{ Carbon\Carbon::parse($user_log->updated_at)->diffForHumans() }}</td>
            <td>Admin {{$user_log->responsible}}</td>

          </tr>
          @endforeach
          
        </tbody>
      </table>

    </form>
@endsection

 

