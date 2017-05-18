@extends('auth.layouts.layout')

@section('title')
Imported Meat Catalogue

@endsection

  @section('content')
  @include('auth.include.header')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-eye"></i> Show Meat Cuts
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Show Meat Cuts</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
            <a href="{{ route('main')}}" class="btn btn-primary"><i class="fa fa-mail-reply"></i> Back</a>

                    <hr>
                    
                    
                    <div class="row">
                    <div class="list-group-gallery">
                    @if($meat_cuts->count())
                    @foreach($meat_cuts as $meat_cut)

                    <div class="col-sm-4 col-xs-6 col-md-3 col-lg-3">
                      <a class="thumbnail fancybox" rel="lightbox" href="/mied/{{ $meat_cut->image }}">
                        <img class="img-responsive" alt="" src="/mied/{{$meat_cut->image}}" style="width:300px;height:150px;">
                      <div class="text-left">
                        <small class="text-muted">Kind : {{$meat_cut->kind}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Meat Cut Type : {{$meat_cut->cut_type}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Hs Code : {{$meat_cut->hscode}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">FME Name Number : {{$meat_cut->name_number}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Description : {{$meat_cut->remarks}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Country of Origin : {{$meat_cut->country}}</small>
                      </div>
                      </a>
                      <div class="text-center">                      
                      <a href="{{ route('print-meat', ['id'=> Crypt::encrypt($meat_cut->id)]) }}" target="blank" class="btn btn-primary btn btn-sm"><i class="fa fa-print"></i>Print
                      <a href="{{ route('print-all',['hscode'=>Crypt::encrypt($meat_cut->hscode)]) }}" target="blank" class="btn btn-warning btn btn-sm"><i class="fa fa-print"></i> Print All</a>
                      </a>
                      </div>
                      </div>
                    @endforeach
                    @endif
                    </div>
                    </div>

              @endsection




        
