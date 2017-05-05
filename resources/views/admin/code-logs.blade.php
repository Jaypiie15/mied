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
        <i class="fa fa-eye"></i> View HS Code Logs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View HS Code Logs</li>
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
            <th>HS Code</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Admin Responsible</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($code_logs as $code_log)
            <td>{{$code_log->hscode}}</td>
            <td>{{$code_log->show == 1 ? Carbon\Carbon::parse($code_log->created_at)->diffForHumans() : ''}}</td>
            <td>{{$code_log->show == 1 ? Carbon\Carbon::parse($code_log->updated_at)->diffForHumans() : ''}}</td>
            <td>{{$code_log->show == 0 ? Carbon\Carbon::parse($code_log->updated_at)->diffForHumans() : ''}}</td>
            <td>Admin {{$code_log->responsible}}</td>

          </tr>
          @endforeach
          
        </tbody>
      </table>

    </form>
@endsection

 

