      <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
          <tr>
            <th>HS Code</th>
            <th>Action</th>
        </thead>
        <tbody>
          <tr>
            
            @foreach($codes as $code)
            <td>{{$code->hscode}}</td>
            <td>
            <button value="{{$code->id}}" class="btn btn-primary btn-editcode"><i class="fa fa-pencil"></i> Edit</button>
            <button value="{{$code->id}}" class="btn btn-danger btn-deletecode"><i class="fa fa-trash"></i> Delete</button>

            </td>
          </tr>
          @endforeach
          
        </tbody>
      </table>