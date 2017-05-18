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
        <i class="fa fa-eye"></i> View Definition of Terms Logs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View Definition of Terms Logs</li>
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
            <th>Question</th>
            <th>Answer</th>
            <th>Date Created</th>
            <th>Date Updated</th>
            <th>Date Deleted</th>
            <th>Admin Responsible</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($dots_logs as $dots_log)
            <td>{{$dots_log->question}}</td>
            <td>{{$dots_log->answer}}</td>
            <td>{{$dots_log->show == 1 ? Carbon\Carbon::parse($dots_log->created_at)->diffForHumans() : ''}}</td>
            <td>{{$dots_log->show == 1 ? Carbon\Carbon::parse($dots_log->updated_at)->diffForHumans() : ''}}</td>
            <td>{{$dots_log->show == 0 ? Carbon\Carbon::parse($dots_log->updated_at)->diffForHumans() : ''}}</td>
            <td>Admin {{$dots_log->responsible}}</td>

          </tr>
          @endforeach
          
        </tbody>
      </table>

    </form>
@endsection

 

