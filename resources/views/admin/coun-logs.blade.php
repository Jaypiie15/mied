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
        <i class="fa fa-eye"></i> View Country Logs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View Country Logs</li>
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
            <th>Country</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Deleted</th>
            <th>Admin Responsible</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($coun_logs as $coun_log)
            <td>{{$coun_log->country}}</td>
            <td>{{$coun_log->show == 1 ? Carbon\Carbon::parse($coun_log->created_at)->diffForHumans() : ''}}</td>
            <td>{{$coun_log->show == 1 ? Carbon\Carbon::parse($coun_log->updated_at)->diffForHumans() : ''}}</td>
            <td>{{$coun_log->show == 0 ? Carbon\Carbon::parse($coun_log->updated_at)->diffForHumans() : ''}}</td>
            <td>Admin {{$coun_log->responsible}}</td>

          </tr>
          @endforeach
          
        </tbody>
      </table>

    </form>
@endsection

 

