      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Question</th>
            <th>Answer</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($fmes as $fme)
            <td>{{$fme->name_number}}</td>
            <td>
            <button value="{{$fme->id}}" class="btn btn-primary btn-editfme"><i class="fa fa-pencil"></i> Edit</button>
            <button value="{{$fme->id}}" class="btn btn-danger btn-deletefme"><i class="fa fa-trash"></i> Delete</button> 
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>