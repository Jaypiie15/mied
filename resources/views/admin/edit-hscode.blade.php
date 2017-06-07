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
        <i class="fa fa-pencil"></i> Edit HS Code
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit HS Code</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form method="POST" action="{{ route('add-code')}}" id="insert-code" data-parsley-validate>
       
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcode-modal"><i class="fa fa-plus"></i> Add HS Code</button>
<div class="modal fade" id="addcode-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add HS Code</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Input HS Code:</label>
             <input type="text" class="form-control" name="code" required  data-parsley-length="[2, 100]">
          </div>
        @if($errors->has('code'))
          <span class="help-block">{{ $errors->first('code') }}</span>
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
<form action="{{ route('update-code') }}" method="POST" id="update-hscode" data-parsley-validate>
<div class="modal fade" id="modal-code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit HS Code</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Edit Commodity</label>
            <input type="hidden" name="id" id="id">
             <input type="text" class="form-control" name="code" id="code" required data-parsley-length="[2, 100]">
          @if($errors->has('code'))
          <span class="help-block">{{ $errors->first('code') }}</span>
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

<form action="{{ route('delete-hscode') }}" method="POST" id="delete-hscode" data-parsley-validate>
<div class="modal fade" id="delete-code" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete HS Code</h4>
      </div>
      <div class="modal-body">
              <input type="hidden" name="id" id="id">
             <input type="hidden" name="code" id="code">
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

        $('#insert-code').on('submit',function(e){
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
              $("#addcode-modal").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'HS Code Added!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              $("#insert-code").trigger('reset');
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'HS Code Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#insert-code").trigger('reset');
              }
            }
          })
        })

    //read

      read();
      
      function read(){
          $.ajax({  
            type : 'get',
            url : "{{ route('code-tbl')}}",
            dataType : 'html',
              success:function(data){
                  $('#datatable-responsive').html(data);
                }
              })
            }

    //show-edit

    $(document).on('click','.btn-editcode',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-hscode') }}",
          data : {id:id},
          success:function(data)
          {
            var codeupdate = $('#update-hscode');
            codeupdate.find('#id').val(data.id);
            codeupdate.find('#code').val(data.hscode);
            $('#modal-code').modal('show');
          }
        })
    })

   //show -delete
        $(document).on('click','.btn-deletecode',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-hscode') }}",
          data : {id:id},
          success:function(data)
          {
            var codeupdate = $('#delete-hscode');
            codeupdate.find('#id').val(data.id);
            codeupdate.find('#com').val(data.hscode);
            $('#delete-code').modal('show');
          }
        })
    })

   //update
        $('#update-hscode').on('submit',function(e){
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
              $("#modal-code").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'HS Code Updated!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'HS Code Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#update-hscode").trigger('reset');
              }
            }
          })
        })

      //delete
        $('#delete-hscode').on('submit',function(e){
          e.preventDefault();
          var route = $(this).attr('action');
          var data  = $(this).serialize();

          $.ajax({
            dataType : 'json',
            type : "POST",
            url: route,
            data: data,
            success:function(data){
              $("#delete-code").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'HS Code Deleted!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
          })
        })
 
</script>
@endsection

 

