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
        <i class="fa fa-eye"></i> View Meat Cut Type Logs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View Meat Cut Type Logs</li>
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
            <th>Meat Cut Type</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Admin Responsible</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($cut_logs as $cut_log)
            <td>{{$cut_log->cut_type}}</td>
            <td>{{$cut_log->show == 1 ? Carbon\Carbon::parse($cut_log->created_at)->diffForHumans() : ''}}</td>
            <td>{{$cut_log->show == 1 ? Carbon\Carbon::parse($cut_log->updated_at)->diffForHumans() : ''}}</td>
            <td>{{$cut_log->show == 0 ? Carbon\Carbon::parse($cut_log->updated_at)->diffForHumans() : ''}}</td>
            <td>Admin {{$cut_log->responsible}}</td>

          </tr>
          @endforeach
          
        </tbody>
      </table>

    </form>
@endsection

 

