@extends('auth.layouts.layout')

@section('title')
Imported Meat Catalogue
@endsection

  @section('content')


  <body onload="window.print();">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">


                    <div class="row">
                    <div class="list-group-gallery">
                    @if($meat_cuts->count())
                    @foreach($meat_cuts as $meat_cut)

                    <div class="col-sm-4 col-xs-6 col-md-3 col-lg-3">
                      
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
                      
                      
                      </div>
                      </div>
                    @endforeach
                    @endif
                    </div>
                    </div>

              @endsection




        
