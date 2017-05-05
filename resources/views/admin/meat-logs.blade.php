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
        <i class="fa fa-eye"></i> View Meat Cuts Logs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View Meat Cuts Logs</li>
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
            <th>Kind</th>
            <th>Meat Cut Type</th>
            <th>HS Code</th>
            <th>FME Name Number</th>
            <th>Remarks</th>
            <th>Country</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Admin Responsible</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($meat_logs as $meat_log)
            <td>{{$meat_log->kind}}</td>
            <td>{{$meat_log->cut_type}}</td>
            <td>{{$meat_log->hscode}}</td>
            <td>{{$meat_log->name_number}}</td>
            <td>{{$meat_log->remarks}}</td>
            <td>{{$meat_log->country}}</td>
            <td>{{$meat_log->show == 1 ? Carbon\Carbon::parse($meat_log->created_at)->diffForHumans() : ''}}</td>
            <td>{{$meat_log->show == 1 ? Carbon\Carbon::parse($meat_log->updated_at)->diffForHumans() : ''}}</td>
            <td>{{$meat_log->show == 0 ? Carbon\Carbon::parse($meat_log->updated_at)->diffForHumans() : ''}}</td>
            <td>Admin {{$meat_log->responsible}}</td>

          </tr>
          @endforeach
          
        </tbody>
      </table>

    </form>
@endsection

 

