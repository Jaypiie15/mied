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
        <i class="fa fa-pencil"></i> Edit FME Name & Number
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Dashboard</a></li>
        <li class="active">Edit FME Name & Number</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="box">
        <div class="box-body">
        <form method="POST" action="{{ route('add-fme') }}" id="insert-fme" data-parsley-validate>
       
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addfme-modal"><i class="fa fa-plus"></i> Add FME Name & Number</button>
<div class="modal fade" id="addfme-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-plus"></i> Add FME Name & Number</h4>
      </div>
      <div class="modal-body">


          <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">FME Name & Number</label>
             <input type="text" class="form-control" name="name" required  data-parsley-length="[2, 100]">
          </div>
        @if($errors->has('name'))
          <span class="help-block">{{ $errors->first('name') }}</span>
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
<form action="{{ route('update-fme') }}" method="POST" id="update-fme" data-parsley-validate>
<div class="modal fade" id="modal-fme" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-pencil"></i> Edit Country</h4>
      </div>
      <div class="modal-body">

          <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
            <label for="message-text" class="control-label">Edit FME Name & Number</label>
            <input type="hidden" name="id" id="id">
             <input type="text" class="form-control" name="name" id="name" required data-parsley-length="[2, 100]">
          @if($errors->has('name'))
          <span class="help-block">{{ $errors->first('name') }}</span>
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

<form action="{{ route('delete-fme') }}" method="POST" id="delete-fme" data-parsley-validate>
<div class="modal fade" id="delete-fmen" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel"><i class="fa fa-trash"></i> Delete Country</h4>
      </div>
      <div class="modal-body">
              <input type="hidden" name="id" id="id">
             <input type="hidden" name="name" id="name">
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

        $('#insert-fme').on('submit',function(e){
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
              $("#addfme-modal").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'FME Name & Number Added!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              $("#insert-fme").trigger('reset');
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'FME Name & Number Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#insert-fme").trigger('reset');
              }
            }
          })
        })

    //read

      read();
      
      function read(){
          $.ajax({  
            type : 'get',
            url : "{{ route('fme-tbl')}}",
            dataType : 'html',
              success:function(data){
                  $('#datatable-responsive').html(data);
                }
              })
            }

    //show-edit

    $(document).on('click','.btn-editfme',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-fmes') }}",
          data : {id:id},
          success:function(data)
          {
            var fmeupdate = $('#update-fme');
            fmeupdate.find('#id').val(data.id);
            fmeupdate.find('#name').val(data.name_number);
            $('#modal-fme').modal('show');
          }
        })
    })

   //show -delete
        $(document).on('click','.btn-deletefme',function(e){
        var id = $(this).val();
        $.ajax({
          type : 'get',
          url : "{{ route('update-fmes') }}",
          data : {id:id},
          success:function(data)
          {
            var counupdate = $('#delete-fme');
            counupdate.find('#id').val(data.id);
            counupdate.find('#country').val(data.name_number);
            $('#delete-fmen').modal('show');
          }
        })
    })

   //update
        $('#update-fme').on('submit',function(e){
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
              $("#modal-fme").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'FME Name & Number Updated!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
            else{
                  new PNotify({
                  title: 'Oh No!',
                  text: 'FME Name & Number Already Exists!',
                  type: 'error',
                  styling: 'bootstrap3'
                });
                $("#update-fme").trigger('reset');
              }
            }
          })
        })

      //delete
        $('#delete-fme').on('submit',function(e){
          e.preventDefault();
          var route = $(this).attr('action');
          var data  = $(this).serialize();

          $.ajax({
            dataType : 'json',
            type : "POST",
            url: route,
            data: data,
            success:function(data){
              $("#delete-fmen").modal('hide');

              new PNotify({
                  title: 'Success!',
                  text: 'FME Name & Number Deleted!',
                  type: 'success',
                  styling: 'bootstrap3'
                });
              read();
            }
          })
        })
 
</script>
@endsection

 

