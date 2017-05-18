@extends('auth.layouts.layout')

@section('title')
Imported Meat Catalogue
@endsection

	@section('content')

		@include('auth.include.header')
	  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-eye"></i> Show FAQ's
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Show FAQ's</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">


<hr>
                  <div class="accordion" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel">
                  @foreach($faqs as $faq)

                      <a class="panel-heading collapsed" href="#collapse{{$faq->id}}" aria-controls="collapse{{$faq->id}} " id="heading{{$faq->id}}"  role="tab" data-toggle="collapse" data-parent="#accordion" aria-expanded="false" >
                        <h4 class="panel-title fa fa-circle" style="word-wrap: break-word"> {{$faq->question}}</h4>
                      </a>

                      <div id="collapse{{$faq->id}}" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading{{$faq->id}}">
                        <div class="panel-body">
                          <p style="word-wrap: break-word;text-align:justify" > {{$faq->answer}}</p>
                        </div>
                      </div>
                    </div>
                  
               
                @endforeach
     </form>
    @endsection