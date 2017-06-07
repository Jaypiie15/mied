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
        <i class="fa fa-pencil"></i> Edit Definition of Terms
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Definition of Terms</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form method="POST" action="{{ route('add-dots')}}" id="insert-dot" data-parsley-validate>
       
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#adddot-modal"><i class="fa fa-plus"></i> Add Definition of Terms</button>
<div class="modal fade" id="adddot-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Definition of Terms</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Question:</label>
             <input type="text" class="form-control" name="question" required  data-parsley-length="[2, 100]">
          </div>
        @if($errors->has('question'))
          <span class="help-block">{{ $errors->first('question') }}</span>
        @endif

          <div class="form-group {{ $errors->has('answer') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Answer:</label>
             <input type="text" class="form-control" name="answer" required  data-parsley-length="[2, 100]">
          </div>
        @if($errors->has('answer'))
          <span class="help-block">{{ $errors->first('answer') }}</span>
        @endif

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" name="btn-add" class="btn btn-primary">Submit</button>

         </form>
        

        
      </div>
    </div>
  </div>
</div>


<!-- modal edit -->
<form action="{{ route('update-dot') }}" method="POST" id="update-dot" data-parsley-validate>
<div class="modal fade" id="modal-dot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Definition of Terms</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('question') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Edit Question</label>
            <input type="hidden" name="id" id="id">
             <input type="text" class="form-control" name="question" id="question" required data-parsley-length="[2, 100]">
          @if($errors->has('question'))
          <span class="help-block">{{ $errors->first('question') }}</span>
        @endif
          </div>

          <div class="form-group {{ $errors->has('answer') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Edit Answer</label>
             <input type="text" class="form-control" name="answer" id="answer" required data-parsley-length="[2, 100]">
          @if($errors->has('answer'))
          <span class="help-block">{{ $errors->first('answer') }}</span>
        @endif
          </div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Submit</button>
        
         </form>
        
      </div>
    </div>
  </div>
</div>

<form action="{{ route('delete-dots') }}" method="POST" id="delete-dots" data-parsley-validate>
<div class="modal fade" id="delete-dot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Definition of Terms</h4>
      </div>
      <div class="modal-body">
              <input type="hidden" name="id" id="id">
             <input type="hidden" name="question" id="question">
             <input type="hidden" name="answer" id="answer">
        Are you sure you want to delete this?
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i> Yes, Delete it</button>
        
         </form>
        
      </div>
    </div>
  </div>
</div>

<hr>


      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

      </table>

    </form>
<script src="{{ asset('resources/src/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>


<script type="text/javascript">

      //add
        $(document).ready(function(){
            $.ajaxSetup({
              headers:{
                'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
              }
            });
        });

        $('#insert-dot').on('submit',function(e){
          e.preventDefault();
          var route = $(this).attr('action');
          var data  = $(this).serialize();

          $.ajax({
            dataType : 'json',
            type : "POST",
            url: route,
            data: data,
            success:function(data){
              if($.trim(data.save) == 'save'){
              $("#adddot-modal").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Definition of Terms Added!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              $("#insert-dot").trigger('reset');
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'Definition of Terms Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#insert-dot").trigger('reset');
              }
            }
          })
        })

    //read

      read();
      
      function read(){
          $.ajax({  
            type : 'get',
            url : "{{ route('dots-tbl')}}",
            dataType : 'html',
              success:function(data){
                  $('#datatable-responsive').html(data);
                }
              })
            }

    //show-edit

    $(document).on('click','.btn-editdot',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-dots') }}",
          data : {id:id},
          success:function(data)
          {
            var faqupdate = $('#update-dot');
            faqupdate.find('#id').val(data.id);
            faqupdate.find('#question').val(data.question);
            faqupdate.find('#answer').val(data.answer);
            $('#modal-dot').modal('show');
          }
        })
    })

   //show -delete
        $(document).on('click','.btn-deletedot',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-dots') }}",
          data : {id:id},
          success:function(data)
          {
            var faqupdate = $('#delete-dots');
            faqupdate.find('#id').val(data.id);
            faqupdate.find('#question').val(data.question);
            faqupdate.find('#answer').val(data.answer);
            $('#delete-dot').modal('show');
          }
        })
    })

   //update
        $('#update-dot').on('submit',function(e){
          e.preventDefault();
          var route = $(this).attr('action');
          var data  = $(this).serialize();

          $.ajax({
            dataType : 'json',
            type : "POST",
            url: route,
            data: data,
            success:function(data){
              if($.trim(data.update) == 'update'){
              $("#modal-dot").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Definition of Terms Updated!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'Definition of Terms Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#update-dot").trigger('reset');
              }
            }
          })
        })

      //delete
        $('#delete-dots').on('submit',function(e){
          e.preventDefault();
          var route = $(this).attr('action');
          var data  = $(this).serialize();

          $.ajax({
            dataType : 'json',
            type : "POST",
            url: route,
            data: data,
            success:function(data){
              $("#delete-dot").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Definition of Terms Deleted!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
          })
        })
 
</script>
@endsection

 

