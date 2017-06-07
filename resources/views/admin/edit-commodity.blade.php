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
        <i class="fa fa-pencil"></i> Edit Commodity
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Commodity</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form action="{{ route('add-commodity')}}" method="POST" id="insert-com" data-parsley-validate>
       
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-modal"><i class="fa fa-plus"></i> Add Commodity</button>
<div class="modal fade" id="add-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Commodity</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('commodity') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Input Commodity</label>
             <input type="text" class="form-control" name="commodity" required data-parsley-length="[2, 100]">
          @if($errors->has('commodity'))
          <span class="help-block">{{ $errors->first('commodity') }}</span>
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
<!-- modal edit -->
<form action="{{ route('update-com') }}" method="POST" id="update-commodity" data-parsley-validate>
<div class="modal fade" id="update-com" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Commodity</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('commodity') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Edit Commodity</label>
            <input type="hidden" name="id" id="id">
             <input type="text" class="form-control" name="com" id="com" required data-parsley-length="[2, 100]">
          @if($errors->has('commodity'))
          <span class="help-block">{{ $errors->first('commodity') }}</span>
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

<form action="{{ route('delete-commodity') }}" method="POST" id="delete-commodity" data-parsley-validate>
<div class="modal fade" id="delete-com" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Commodity</h4>
      </div>
      <div class="modal-body">
              <input type="hidden" name="id" id="id">
             <input type="hidden" name="com" id="com">
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

        $('#insert-com').on('submit',function(e){
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
              $("#add-modal").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Commodity Added!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              $("#insert-com").trigger('reset');
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'Commodity Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#insert-com").trigger('reset');
              }
            }
          })
        })

    //read

      read();
      
      function read(){
          $.ajax({  
            type : 'get',
            url : "{{ route('com-tbl')}}",
            dataType : 'html',
              success:function(data){
                  $('#datatable-responsive').html(data);
                }
              })
            }

    //show-edit

    $(document).on('click','.btn-edit',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-commodity') }}",
          data : {id:id},
          success:function(data)
          {
            var comupdate = $('#update-commodity');
            comupdate.find('#id').val(data.id);
            comupdate.find('#com').val(data.kind);
            $('#update-com').modal('show');
          }
        })
    })

    //show -delete
        $(document).on('click','.btn-delete',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-commodity') }}",
          data : {id:id},
          success:function(data)
          {
            var comupdate = $('#delete-commodity');
            comupdate.find('#id').val(data.id);
            comupdate.find('#com').val(data.kind);
            $('#delete-com').modal('show');
          }
        })
    })

    //update
        $('#update-commodity').on('submit',function(e){
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
              $("#update-com").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Commodity Updated!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'Commodity Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#update-commodity").trigger('reset');
              }
            }
          })
        })

      //delete
        $('#delete-commodity').on('submit',function(e){
          e.preventDefault();
          var route = $(this).attr('action');
          var data  = $(this).serialize();

          $.ajax({
            dataType : 'json',
            type : "POST",
            url: route,
            data: data,
            success:function(data){
              $("#delete-com").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Commodity Deleted!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
          })
        })
</script>
@endsection

 

