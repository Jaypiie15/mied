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
        <i class="fa fa-pencil"></i> Edit Country
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit Country</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form method="POST" action="{{ route('add-country')}}" id="insert-coun" data-parsley-validate>
       
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addcoun-modal"><i class="fa fa-plus"></i> Add Country</button>
<div class="modal fade" id="addcoun-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add Country</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Country</label>
             <input type="text" class="form-control" name="country" required  data-parsley-length="[2, 100]">
          </div>
        @if($errors->has('country'))
          <span class="help-block">{{ $errors->first('country') }}</span>
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
<form action="{{ route('update-coun') }}" method="POST" id="update-coun" data-parsley-validate>
<div class="modal fade" id="modal-coun" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Country</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('country') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Edit Country</label>
            <input type="hidden" name="id" id="id">
             <input type="text" class="form-control" name="country" id="country" required data-parsley-length="[2, 100]">
          @if($errors->has('country'))
          <span class="help-block">{{ $errors->first('country') }}</span>
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

<form action="{{ route('delete-country') }}" method="POST" id="delete-coun" data-parsley-validate>
<div class="modal fade" id="delete-cou" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Country</h4>
      </div>
      <div class="modal-body">
              <input type="hidden" name="id" id="id">
             <input type="hidden" name="country" id="country">
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

        $('#insert-coun').on('submit',function(e){
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
              $("#addcoun-modal").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Country Added!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              $("#insert-coun").trigger('reset');
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'Country Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#insert-coun").trigger('reset');
              }
            }
          })
        })

    //read

      read();
      
      function read(){
          $.ajax({  
            type : 'get',
            url : "{{ route('coun-tbl')}}",
            dataType : 'html',
              success:function(data){
                  $('#datatable-responsive').html(data);
                }
              })
            }

    //show-edit

    $(document).on('click','.btn-editcoun',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-country') }}",
          data : {id:id},
          success:function(data)
          {
            var cutupdate = $('#update-coun');
            cutupdate.find('#id').val(data.id);
            cutupdate.find('#country').val(data.country);
            $('#modal-coun').modal('show');
          }
        })
    })

   //show -delete
        $(document).on('click','.btn-deletecoun',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-country') }}",
          data : {id:id},
          success:function(data)
          {
            var counupdate = $('#delete-coun');
            counupdate.find('#id').val(data.id);
            counupdate.find('#country').val(data.country);
            $('#delete-cou').modal('show');
          }
        })
    })

   //update
        $('#update-coun').on('submit',function(e){
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
              $("#modal-coun").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Country Updated!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'Country Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#update-coun").trigger('reset');
              }
            }
          })
        })

      //delete
        $('#delete-coun').on('submit',function(e){
          e.preventDefault();
          var route = $(this).attr('action');
          var data  = $(this).serialize();

          $.ajax({
            dataType : 'json',
            type : "POST",
            url: route,
            data: data,
            success:function(data){
              $("#delete-cou").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'Country Deleted!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
          })
        })
 
</script>
@endsection

 

