@extends('auth.layouts.layout')

@section('title')
Imported Meat Catalogue
@endsection

  @section('content')
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->

    <!-- /.row -->

    <!-- Table row -->
                    <div class="row">
                    <div class="list-group-gallery">

                    <div class="col-sm-4 col-xs-6 col-md-3 col-lg-3">
                      
                        <img class="img-responsive" alt="" src="/mied/{{$print->image}}">
                      <div class="text-left">
                        <small class="text-muted">Kind : {{$print->kind}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Meat Cut Type : {{$print->cut_type}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Hs Code : {{$print->hscode}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">FME Name Number : {{$print->name_number}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Remarks : {{$print->remarks}}</small>
                      </div>
                      <div class="text-left">
                        <small class="text-muted">Country of Origin : {{$print->country}}</small>
                      </div>
                      
                      </div>

                    </div>
                    </div>
    <!-- /.row -->


    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
@endsection
