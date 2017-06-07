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
        <i class="fa fa-pencil"></i> Edit FAQ's
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit FAQ's</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form method="POST" action="{{ route('add-faqs')}}" id="insert-faq" data-parsley-validate>
       
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addfaq-modal"><i class="fa fa-plus"></i> Add FAQ's</button>
<div class="modal fade" id="addfaq-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add FAQ's</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('que') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Question:</label>
             <input type="text" class="form-control" name="que" required  data-parsley-length="[2, 100]">
          </div>
        @if($errors->has('que'))
          <span class="help-block">{{ $errors->first('que') }}</span>
        @endif

          <div class="form-group {{ $errors->has('ans') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Answer:</label>
             <input type="text" class="form-control" name="ans" required  data-parsley-length="[2, 100]">
          </div>
        @if($errors->has('ans'))
          <span class="help-block">{{ $errors->first('ans') }}</span>
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
<form action="{{ route('update-faq') }}" method="POST" id="update-faq" data-parsley-validate>
<div class="modal fade" id="modal-faq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit FAQs</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('que') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Edit Question</label>
            <input type="hidden" name="id" id="id">
             <input type="text" class="form-control" name="que" id="que" required data-parsley-length="[2, 100]">
          @if($errors->has('que'))
          <span class="help-block">{{ $errors->first('que') }}</span>
        @endif
          </div>

          <div class="form-group {{ $errors->has('ans') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Edit Answer</label>
             <input type="text" class="form-control" name="ans" id="ans" required data-parsley-length="[2, 100]">
          @if($errors->has('ans'))
          <span class="help-block">{{ $errors->first('ans') }}</span>
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

<form action="{{ route('delete-faqs') }}" method="POST" id="delete-faqs" data-parsley-validate>
<div class="modal fade" id="delete-faq" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete FAQ</h4>
      </div>
      <div class="modal-body">
              <input type="hidden" name="id" id="id">
             <input type="hidden" name="que" id="que">
             <input type="hidden" name="ans" id="ans">
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

        $('#insert-faq').on('submit',function(e){
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
              $("#addfaq-modal").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'FAQ Added!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              $("#insert-faq").trigger('reset');
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'FAQ Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#insert-faq").trigger('reset');
              }
            }
          })
        })

    //read

      read();
      
      function read(){
          $.ajax({  
            type : 'get',
            url : "{{ route('faqs-tbl')}}",
            dataType : 'html',
              success:function(data){
                  $('#datatable-responsive').html(data);
                }
              })
            }

    //show-edit

    $(document).on('click','.btn-editfaq',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-faqs') }}",
          data : {id:id},
          success:function(data)
          {
            var faqupdate = $('#update-faq');
            faqupdate.find('#id').val(data.id);
            faqupdate.find('#que').val(data.question);
            faqupdate.find('#ans').val(data.answer);
            $('#modal-faq').modal('show');
          }
        })
    })

   //show -delete
        $(document).on('click','.btn-deletefaq',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-faqs') }}",
          data : {id:id},
          success:function(data)
          {
            var faqupdate = $('#delete-faqs');
            faqupdate.find('#id').val(data.id);
            faqupdate.find('#que').val(data.question);
            faqupdate.find('#ans').val(data.answer);
            $('#delete-faq').modal('show');
          }
        })
    })

   //update
        $('#update-faq').on('submit',function(e){
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
              $("#modal-faq").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'FAQ Updated!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'FAQ Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#update-faq").trigger('reset');
              }
            }
          })
        })

      //delete
        $('#delete-faqs').on('submit',function(e){
          e.preventDefault();
          var route = $(this).attr('action');
          var data  = $(this).serialize();

          $.ajax({
            dataType : 'json',
            type : "POST",
            url: route,
            data: data,
            success:function(data){
              $("#delete-faq").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'FAQ Deleted!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
          })
        })
 
</script>
@endsection

 

