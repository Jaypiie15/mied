      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>Commodity</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($coms as $com)
            <td>{{$com->kind}}</td>
            <td>
            <button value="{{$com->id}}" class="btn btn-primary btn-edit"><i class="fa fa-pencil"></i> Edit</button>
            <button value="{{$com->id}}" class="btn btn-danger btn-delete"><i class="fa fa-trash"></i> Delete</button>
            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>
