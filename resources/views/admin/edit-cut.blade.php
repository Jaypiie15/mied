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
        <i class="fa fa-pencil"></i> Edit Meat Cut Type
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Meat Cut Type</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form method="POST" action="{{ route('add-cut')}}" id="insert-cut" data-parsley-validate>
       
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcut-modal"><i class="fa fa-plus"></i> Add Meat Cut Type</button>
<div class="modal fade" id="addcut-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Meat Cut Type</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('cut') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Meat Cut Type:</label>
             <input type="text" class="form-control" name="cut" required  data-parsley-length="[2, 100]">
          </div>
        @if($errors->has('cut'))
          <span class="help-block">{{ $errors->first('cut') }}</span>
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
<form action="{{ route('update_cut') }}" method="POST" id="update-cut" data-parsley-validate>
<div class="modal fade" id="modal-cut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Meat Cut type</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('cut') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Edit Commodity</label>
            <input type="hidden" name="id" id="id">
             <input type="text" class="form-control" name="cut" id="cut" required data-parsley-length="[2, 100]">
          @if($errors->has('cut'))
          <span class="help-block">{{ $errors->first('cut') }}</span>
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

<form action="{{ route('delete-cut_type') }}" method="POST" id="delete-type" data-parsley-validate>
<div class="modal fade" id="delete-cut" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Meat Cut type</h4>
      </div>
      <div class="modal-body">
              <input type="hidden" name="id" id="id">
             <input type="hidden" name="cut" id="cut">
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

        $('#insert-cut').on('submit',function(e){
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
              $("#addcut-modal").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Meat Cut Type Added!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              $("#insert-cut").trigger('reset');
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'Meat Cut Type Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#insert-cut").trigger('reset');
              }
            }
          })
        })

    //read

      read();
      
      function read(){
          $.ajax({  
            type : 'get',
            url : "{{ route('cut-tbl')}}",
            dataType : 'html',
              success:function(data){
                  $('#datatable-responsive').html(data);
                }
              })
            }

    //show-edit

    $(document).on('click','.btn-editcut',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-cut_type') }}",
          data : {id:id},
          success:function(data)
          {
            var cutupdate = $('#update-cut');
            cutupdate.find('#id').val(data.id);
            cutupdate.find('#cut').val(data.cut_type);
            $('#modal-cut').modal('show');
          }
        })
    })

   //show -delete
        $(document).on('click','.btn-deletecut',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-cut_type') }}",
          data : {id:id},
          success:function(data)
          {
            var codeupdate = $('#delete-type');
            codeupdate.find('#id').val(data.id);
            codeupdate.find('#cut').val(data.cut_type);
            $('#delete-cut').modal('show');
          }
        })
    })

   //update
        $('#update-cut').on('submit',function(e){
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
              $("#modal-cut").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Meat Cut type Updated!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'Meat Cut type Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#update-cut").trigger('reset');
              }
            }
          })
        })

      //delete
        $('#delete-type').on('submit',function(e){
          e.preventDefault();
          var route = $(this).attr('action');
          var data  = $(this).serialize();

          $.ajax({
            dataType : 'json',
            type : "POST",
            url: route,
            data: data,
            success:function(data){
              $("#delete-cut").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Meat Cut type Deleted!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
          })
        })
 
</script>
@endsection

 

