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
        <i class="fa fa-eye"></i> View FAQ's Logs
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View FAQ's Logs</li>
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
            
            @foreach($faq_logs as $faq_log)
            <td>{{$faq_log->question}}</td>
            <td>{{$faq_log->answer}}</td>
            <td>{{$faq_log->show == 1 ? Carbon\Carbon::parse($faq_log->created_at)->diffForHumans() : ''}}</td>
            <td>{{$faq_log->show == 1 ? Carbon\Carbon::parse($faq_log->updated_at)->diffForHumans() : ''}}</td>
            <td>{{$faq_log->show == 0 ? Carbon\Carbon::parse($faq_log->updated_at)->diffForHumans() : ''}}</td>
            <td>Admin {{$faq_log->responsible}}</td>

          </tr>
          @endforeach
          
        </tbody>
      </table>

    </form>
@endsection

 

