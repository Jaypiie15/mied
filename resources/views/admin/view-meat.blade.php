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
    @if(Session::has('delete'))
    <script>swal("SUCCESS","Meat Cut Deleted!","success")</script>
  @endif

                    <div class="col-lg-12">
                    </div>
                    <a href="{{ route('show-meat')}}" class="btn btn-primary"><i class="fa fa-mail-reply"></i> Back</a>
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
                        <small class="text-muted">Remarks : {{$meat_cut->remarks}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Country of Origin : {{$meat_cut->country}}</small>
                      </div>
                      </a>
                      <div class="text-center">                      
                      <a href="{{ route('update-meatcut', ['id'=> Crypt::encrypt($meat_cut->id) ]) }}" class="btn btn-primary btn btn-xs fa fa-pencil"></a>
                      <a href="{{ route('delete-meatcut', ['id'=>$meat_cut->id]) }}" class="btn btn-danger btn btn-xs fa fa-trash"></a>
                      </div>
                      
                      </div>
                    @endforeach
                    @endif
                    </div>
                    </div>

              @endsection




        
