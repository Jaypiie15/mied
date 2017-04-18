@extends('admin.layouts.master')

@section('title')
	Meat Cuts Catalogue
@endsection

	@section('content')

	@include('admin.include.header')

	  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-eye"></i> View Meat Cuts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">View Meat Cuts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">


<hr>


      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Commodity</th>
            <th>Meat Cut Type</th>
            <th>HS Code</th>
            <th>FME Name Number</th>
            <th>Remarks</th>
            <th>Country</th>
            <th>Action</th>
        </thead>
        <tbody>
        	
        @foreach($meats as $meat)
        <tr>
        <td>{{$meat->kind}}</td>
        <td>{{$meat->cut_type}}</td>
        <td>{{$meat->hscode}}</td>
        <td>{{$meat->name_number}}</td>
        <td>{{$meat->remarks}}</td>
        <td>{{$meat->country}}</td>
				<td>
				<a href="{{ route('view-meat',['hscode'=>Hash::make($meat->hscode)]) }}" class="btn btn-primary"><i class="fa fa-eye"></i> Click to View Images</a>
        @endforeach
				</td>
				</tr>
				
				
		          </tr>
        </tbody>
      </table>
     </form>
    @endsection